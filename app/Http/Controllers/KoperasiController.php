<?php

namespace App\Http\Controllers;

use App\Models\KoperasiModel;
use Dompdf\Dompdf;
use Illuminate\Http\Request;

class KoperasiController extends Controller
{
    private $KoperasiModel;

    public function __construct()
    {
        $this->KoperasiModel = new KoperasiModel();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'koperasi' => $this->KoperasiModel->allData()
        ];
        return view("koperasi.v_koperasi", $data);
    }

    public function detail($id_koperasi)
    {
        if (!$this->KoperasiModel->detailData($id_koperasi)) abort(404);

        $data = [
            'koperasi' => $this->KoperasiModel->detailData($id_koperasi)
        ];
        return view("koperasi.v_detailkoperasi", $data);
    }

    public function add()
    {
        return view("koperasi.v_addkoperasi");
    }

    public function insert(Request $request)
    {
        request()->validate([
            'no_faktur' => 'required|unique:tbl_koperasi,no_faktur|min:6|max:6',
            'pelanggan' => 'required',
            'tanggal' => 'required',
            'total' => 'required',
        ], [
            'no_faktur.required' => 'no_faktur WAJIB DIISI !!!',
            'no_faktur.unique' => 'no_faktur INI SUDAH ADA !!!', //akan muncul jika anda memasukkan data yang sudah ada di dalam database
            'no_faktur.min' => 'no_faktur MIN. 6 KARAKTER (ANGKA)', //akan muncul jika angka yang dibutuhkan kurang dari 4
            'no_faktur.max' => 'no_faktur MAX. 6 KARAKTER (ANGKA)', //akan muncul jika angka yang dibutuhkan lebih dari 5
            'pelanggan.required' => 'NAMA koperasi WAJIB DIISI !!!',
            'tanggal.required' => 'MATA PELAJARAN WAJIB DIISI !!!',
            'total.required' => 'FOTO koperasi WAJIB DIISI !!!',
        ]);
        // jika validasi tidak ada maka lakukan simpan data

        $data = [
            'no_faktur' => request()->no_faktur,
            'pelanggan' => request()->pelanggan,
            'tanggal' => request()->tanggal,
            'total' => request()->total,
        ];
        $this->KoperasiModel->addData($data);
        return redirect()->route('koperasi')->with('pesan', 'Data Berhasil Ditambahkan !!!');
    }

    public function edit($id_koperasi)
    {
        if (!$this->KoperasiModel->detailData($id_koperasi)) abort(404);

        $data = [
            'koperasi' => $this->KoperasiModel->detailData($id_koperasi)
        ];
        return view("koperasi.v_editkoperasi", $data);
    }

    public function update($id_koperasi)
    {
        request()->validate([
            'no_faktur' => 'required|min:6|max:6',
            'pelanggan' => 'required',
            'tanggal' => 'required',
            'total' => 'required',
        ], [
            'no_faktur.required' => 'no_faktur WAJIB DIISI !!!',
            'no_faktur.unique' => 'no_faktur INI SUDAH ADA !!!', //akan muncul jika anda memasukkan data yang sudah ada di dalam database
            'no_faktur.min' => 'no_faktur MIN. 6 KARAKTER (ANGKA)', //akan muncul jika angka yang dibutuhkan kurang dari 4
            'no_faktur.max' => 'no_faktur MAX. 6 KARAKTER (ANGKA)', //akan muncul jika angka yang dibutuhkan lebih dari 5
            'pelanggan.required' => 'NAMA koperasi WAJIB DIISI !!!',
            'tanggal.required' => 'MATA PELAJARAN WAJIB DIISI !!!',
            'total.required' => 'FOTO koperasi WAJIB DIISI !!!',
        ]);
        // jika validasi tidak ada maka lakukan simpan data

        $data = [
            'pelanggan' => request()->pelanggan,
            'tanggal' => request()->tanggal,
            'total' => request()->total,
        ];

        $this->KoperasiModel->editData($id_koperasi, $data);
        return redirect()->route('koperasi')->with('pesan', 'Data Berhasil Diubah !!!');
    }

    public function delete($id_koperasi)
    {
        if (!$this->KoperasiModel->detailData($id_koperasi)) abort(404);

        $this->KoperasiModel->deleteData($id_koperasi);
        return redirect()->route('koperasi')->with('pesan', 'Data Berhasil Dihapus !!!');
    }

    public function print()
    {
        $data = [
            'koperasi' => $this->KoperasiModel->allData()
        ];
        return view("koperasi.v_printkoperasi", $data);
    }

    public function printpdf()
    {
        $data = ['koperasi' => $this->KoperasiModel->allData()];

        $html = view('koperasi.v_printpdfkoperasi', $data);
        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        // (Optional) Setup the paper size and orientation $dompdf->setPaper ('A4', 'landscape');
        // Render the HTML as PDF
        $dompdf->render();
        // Output the generated PDF to Browser
        $dompdf->stream();
    }
}
