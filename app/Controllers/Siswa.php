<?php

namespace App\Controllers;

use App\Controllers\Admin\Siswa as AdminSiswa;

class Siswa extends BaseController
{
    public function index()
    {
        $Adminsiswa = new AdminSiswa();
        $Adminsiswa->index();
        return view('siswa');
    }
    function siswa_detail($kelas, $idsiswa)
    {
        echo "Detail kelas $kelas dengan id $idsiswa";
        #return view("siswa");
        $this->validasi();
    }
    protected function validasi()
    {
        echo "fungsi protected";
    }

    function siswa_sesi()
    {
        // $_SESSION = \Config\Services::session();
        $session = session();
        // if ($session->get('username')) {
        //     echo "session username ada dengan isi " . $session->get('username') . "";
        // } else {
        //     echo "username tidak ditemukan";
        // }
        // echo "list username ada : ";
        // print_r($session->get('list_username'));

        echo "info";
        echo $session->getFlashdata("info");
    }
}
