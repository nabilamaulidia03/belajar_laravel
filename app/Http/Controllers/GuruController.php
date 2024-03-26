<?php

namespace App\Http\Controllers;

use App\Models\GuruModel;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    private $GuruModel;

    public function __construct()
    {
        $this->GuruModel = new GuruModel();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'guru' => $this->GuruModel->allData()
        ];
        return view("guru.v_guru", $data);
    }

    public function detail($id_guru)
    {
        if (!$this->GuruModel->detailData($id_guru)) abort(404);

        $data = [
            'guru' => $this->GuruModel->detailData($id_guru)
        ];
        return view("guru.v_detailguru", $data);
    }

    public function add()
    {
        return view("guru.v_addguru");
    }

    public function insert(Request $request)
    {
        request()->validate([
            'nip' => 'required|unique:tbl_guru,nip|min:4|max:18',
            'nama_guru' => 'required',
            'mapel' => 'required',
            'foto_guru' => 'required|mimes:png,jpg,jpeg,bmp|max:10240',
        ], [
            'nip.required' => 'NIP WAJIB DIISI !!!',
            'nip.unique' => 'NIP INI SUDAH ADA !!!', //akan muncul jika anda memasukkan data yang sudah ada di dalam database
            'nip.min' => 'NIP MIN. 4 KARAKTER (ANGKA)', //akan muncul jika angka yang dibutuhkan kurang dari 4
            'nip.max' => 'NIP MAX. 18 KARAKTER (ANGKA)', //akan muncul jika angka yang dibutuhkan lebih dari 5
            'nama_guru.required' => 'NAMA GURU WAJIB DIISI !!!',
            'mapel.required' => 'MATA PELAJARAN WAJIB DIISI !!!',
            'foto_guru.required' => 'FOTO GURU WAJIB DIISI !!!',
        ]);
        // jika validasi tidak ada maka lakukan simpan data

        // upload foto
        $file = request()->foto_guru;
        $fileName = request()->nip . '.' . $file->extension();
        $file->move(public_path('img'), $fileName);

        $data = [
            'nip' => Request()->nip,
            'nama_guru' => Request()->nama_guru,
            'mapel' => Request()->mapel,
            'foto_guru' => $fileName,
        ];
        $this->GuruModel->addData($data);
        return redirect()->route('guru')->with('pesan', 'Data Berhasil Ditambahkan !!!');
    }

    public function edit($id_guru)
    {
        if (!$this->GuruModel->detailData($id_guru)) abort(404);

        $data = [
            'guru' => $this->GuruModel->detailData($id_guru)
        ];
        return view("guru.v_editguru", $data);
    }

    public function update($id_guru)
    {
        request()->validate([
            'nip' => 'required|min:4|max:18',
            'nama_guru' => 'required',
            'mapel' => 'required',
            'foto_guru' => 'mimes:png,jpg,jpeg,bmp|max:10240',
        ], [
            'nip.required' => 'NIP WAJIB DIISI !!!',
            'nip.unique' => 'NIP INI SUDAH ADA !!!', //akan muncul jika anda memasukkan data yang sudah ada di dalam database
            'nip.min' => 'NIP MIN. 4 KARAKTER (ANGKA)', //akan muncul jika angka yang dibutuhkan kurang dari 4
            'nip.max' => 'NIP MAX. 18 KARAKTER (ANGKA)', //akan muncul jika angka yang dibutuhkan lebih dari 5
            'nama_guru.required' => 'NAMA GURU WAJIB DIISI !!!',
            'mapel.required' => 'MATA PELAJARAN WAJIB DIISI !!!',
        ]);
        // jika validasi tidak ada maka lakukan simpan data

        // upload foto
        if (isset(request()->foto_guru)) {
            $file = request()->foto_guru;
            $fileName = request()->nip . '.' . $file->extension();
            $file->move(public_path('img'), $fileName);

            $data = [
                'nama_guru' => Request()->nama_guru,
                'mapel' => Request()->mapel,
                'foto_guru' => $fileName,
            ];
        } else {
            $data = [
                'nama_guru' => Request()->nama_guru,
                'mapel' => Request()->mapel,
            ];
        }

        $this->GuruModel->editData($id_guru, $data);
        return redirect()->route('guru')->with('pesan', 'Data Berhasil Diubah !!!');
    }

    public function delete($id_guru)
    {
        if (!$this->GuruModel->detailData($id_guru)) abort(404);

        $data = $this->GuruModel->detailData($id_guru);
        unlink(public_path('img/' . $data[0]->foto_guru));

        $this->GuruModel->deleteData($id_guru);
        return redirect()->route('guru')->with('pesan', 'Data Berhasil Dihapus !!!');
    }
}
