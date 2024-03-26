<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KoperasiModel extends Model
{
    use HasFactory;

    public function allData()
    {
        return DB::table('tbl_koperasi')->get();
    }

    public function detailData($id_koperasi)
    {
        return DB::table('tbl_koperasi')->where('id_koperasi', $id_koperasi)->get();
    }

    public function addData($data)
    {
        return DB::table('tbl_koperasi')->insert($data);
    }

    public function editData($id_koperasi, $data)
    {
        return DB::table('tbl_koperasi')->where('id_koperasi', $id_koperasi)->update($data);
    }

    public function deleteData($id_koperasi)
    {
        return DB::table('tbl_koperasi')->where('id_koperasi', $id_koperasi)->delete();
    }
}
