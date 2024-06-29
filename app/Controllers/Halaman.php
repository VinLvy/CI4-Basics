<?php

namespace App\Controllers;

use App\Models\ModelHalaman;

use CodeIgniter\Model;
use App\Models\ModelKustom;

class Halaman extends BaseController
{
    function getData()
    {
        $model = new \App\Models\ModelData();
        // $data['dataEmail'] = $model->findAll();
        $data['dataEmail'] = $model->paginate(1);
        $data['pager'] = $model->pager;
        return view('halamanGetData', $data);
    }

    function ambilData()
    {
        $kustom = new ModelKustom();
        echo "Ambil data dari db ci4";
        print_r($kustom->ambilData()); // ci4 default .env

        echo "Ambil data dari db ci4test";
        print_r($kustom->ambilData()); // ci4 tests .env
    }

    function transaksi()
    {
        $kustom = new ModelKustom();
        $kustom->prosesTransaksi();
        echo "transaksi sukses";
    }

    public function index()
    {
        $data['title'] = "DEAD OR ALIVE";
        $data['judul_halaman'] = "Monkey D Luvvy";
        $data['isi_halaman'] = "Marine";
        $data['Yonkou'] = ['D Luvvy', 'Buggy', 'D Teach', 'Shanks'];

        #echo view("header", $data);
        echo view('konten\halaman', $data);
        #echo view("footer");
    }
    public function info()
    {
        return "By <b>WORLD GOVT.</b>";
    }

    // CRUD
    public function halaman_create()
    {
        $halamanModel = new ModelHalaman();
        if ($this->request->getMethod() == 'POST') {
            $datahalaman = [
                'halaman_judul' => $_POST['halaman_judul'],
                'halaman_isi' => $_POST['halaman_isi']
            ];
            $halamanModel->save($datahalaman);
        }
        $data['title'] = "Memasukkan data baru ";
        echo view("konten/halaman_create", $data);
    }

    public function halaman_read()
    {
        $halamanModel = new ModelHalaman();
        $data['title'] = "Menampilkan data baru ";
        $data['halaman_isi'] = $halamanModel->findAll();
        echo view("konten/halaman_read", $data);
    }

    public function halaman_update($id)
    {
        $halamanModel = new ModelHalaman();
        $data['title'] = "Update data ";
        if ($this->request->getMethod() == 'POST') {
            $datahalaman = [
                'halaman_id' => $id,
                'halaman_judul' => $_POST['halaman_judul'],
                'halaman_isi' => $_POST['halaman_isi']
            ];
            $halamanModel->save($datahalaman);
        }
        $data['halaman_isi'] = $halamanModel->find($id);
        echo view("konten/halaman_update", $data);
    }

    public function halaman_delete($id)
    {
        $halamanModel = new ModelHalaman();
        $halamanModel->delete($id);
    }

    public function halaman_cek()
    {
        $halamankustom = new ModelKustom();
        $data = $halamankustom->getData();
        print_r($data);
    }

    public function halaman_detail($kategori, $auth) // /halaman/halaman_detail
    {
        echo "<h1>WANTED</h1>";
        echo "<h1>REWARD $kategori</h1>";
        echo "<h1>BY $auth</h1>";
    }

    public function halaman_detail_by_judul($judul) // string
    {
        echo "<h1>DIED OR $judul</h1>";
    }

    public function halaman_detail_by_id($id) // numerik
    {
        echo "<h1>BELLYS $id</h1>";
    }

    // method POST, GET
    public function halaman_form_get()
    {
        echo view("konten/halaman_form_get");
    }
    public function halaman_form_post()
    {
        echo "<h1>Selamat anda kena SCAM</h1>";
    }

    public function halaman_form_validasi()
    {
        $data[] = "";
        if ($this->request->getMethod() == 'POST') {
            // var_dump($this->request->getVar());
            $nama = $this->request->getVar('nama');
            $email = $this->request->getVar('email');
            $password = $this->request->getVar('password');
            $konfirmasi_password = $this->request->getVar('konfirmasi_password');

            $validation = \Config\Services::validation();

            $aturan = [
                // "nama" => [
                //     "label" => "Nama",
                //     "rules" => "required|min_length[3]",
                //     "errors" => [
                //         'required' => "{field} harus diisi",
                //         'min_length' => "{field} terlalu singkat"
                //     ]
                // ],
                // "email" => [
                //     "label" => "Email",
                //     "rules" => "required|valid_email",
                //     "errors" => [
                //         'required' => "{field} harus diisi",
                //         'valid_email' => "{field} tidak valid"
                //     ]
                // ],
                // "password" => [
                //     "label" => "Password",
                //     "rules" => "required",
                //     "errors" => [
                //         'required' => "{field} harus diisi",

                //     ]
                // ],
                // "konfirmasi_password" => [
                //     "label" => "Konfirmasi password",
                //     "rules" => "required|matches[password]",
                //     "errors" => [
                //         'required' => "{field} harus diisi",
                //         'matches' => "{field} tidak sesuai"
                //     ]
                // ]
                'gambar' => [
                    'label' => 'Gambar',
                    'rules' => 'uploaded[gambar]|max_size[gambar,20000]|is_image[gambar]',
                    'errors' => [
                        'uploaded' => 'Masukkan {field}',
                        'max_size' => 'File terlalu besar',
                        'is_image' => 'gambar only',
                        // 'max_dims' => 'dimensi terlalu besar'
                    ]
                ]
            ];
            $validation->setRules($aturan);
            if ($validation->withRequest($this->request)->run()) {
                // echo "<h1>FUNCTION NORMAL</h1>";
                // session()->setFlashdata("sukses", "data tersimpan");
                // return redirect()->back();

                // $gambar = $this->request->getFile('gambar');
                // echo "nama file gambar: " . $gambar->getName();
                // if ($gambar->isValid() && !$gambar->hasMoved()) {
                //     $gambar->move("./upload/gambar", $gambar->getRandomName());  // , "arknights." . $gambar->getExtension()
                //     echo "<br/> nama file gambar baru : " . $gambar->getName();
                // }

                $file = $this->request->getFiles();
                foreach ($file['gambar'] as $gambar) {
                    if ($gambar->isValid() && !$gambar->hasMoved()) {
                        $gambar->move("./upload/multiple_gambar", $gambar->getRandomName());
                        echo "<br/> nama file gambar baru : " . $gambar->getName();
                    }
                }
                session()->setFlashdata("sukses", "upload berhasil");
                return redirect()->back();
            } else { //false
                $error = $validation->getErrors();
                // $data['error'] = $error;
                // print_r($error);
                // echo "<h1>SOMETHING WRONG</h1>";
                session()->setFlashdata('error', $error);
                return redirect()->back()->withInput();
            }
        }
        echo view("konten/halaman_form_validasi", $data);
    }
    function halaman_sesi()
    {
        $session = \Config\Services::session();
        $session->set("username", "wleowleo");
        $list_username = ['daoa', 'wleo', 'doni'];
        $session->set("list_username", $list_username);
        // $_SESSION['username'] = "wleowleo"
        echo "session dibentuk";

        // $session->remove("username");
        // $session->destroy();

        $session->setFlashdata("info", "welcome nigga");
    }

    function halaman_sapi()
    {
        $gambar_sapi = \Config\Services::image();
        $gambar_sapi->withFile("./gambar/arknights.jpg");
        $gambar_sapi->fit("500", "500", "center");
        $gambar_sapi->save("./gambar/kecil.jpg");

        $gambar_sapi->withFile("./gambar/kecil.jpg");
        $gambar_sapi->text("DOCTOR", [
            'color' => '#FFF',
            'opacity' => 0.5,
            'hAlign' => 'center',
            'vAlign' => 'middle',
            'fontsize' => 20
        ]);

        // $gambar_sapi->reorient();
        // $gambar_sapi->rotate("180");
        // $gambar_sapi->crop(500,500,0,0);
        // $gambar_sapi->flip("horizontal");
        $gambar_sapi->save("./gambar/kecil_text.jpg");
        echo "success";
    }

    function halaman_email()
    {
        $email = \Config\Services::email();
        $alamat_email = "davinpfbrn@gmail.com";
        $email->setTo($alamat_email);
        $alamat_pengirim = "davinpfbrn@gmail.com";
        $email->setFrom($alamat_pengirim);
        $subject = "Test email";
        $email->setSubject($subject);
        $isi_pesan = "GG EZ";
        $email->setMessage($isi_pesan);
        if ($email->send()) {
            echo "email terkirim";
        } else {
            echo "oops something wrong";
            $data_error = $email->printDebugger();
            print_r($data_error);
        }
    }
}
