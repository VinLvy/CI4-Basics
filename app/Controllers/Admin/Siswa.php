<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Siswa extends BaseController
{
    public function index()
    {
        echo "siswa admin";
    }
    function siswa_detail($kelas, $idsiswa)
    {
        echo "Detail kelas $kelas dengan id $idsiswa";
        #return view("siswa");
        // $this->validasi();
    }
    // protected function validasi()
    // {
    //     echo "fungsi protected";
    // }
}
