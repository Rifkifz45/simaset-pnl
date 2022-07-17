<?php

namespace App\Controllers\Approver;
use App\Controllers\BaseController;
use App\Models\Admin\MTwebGedung;
use App\Models\Admin\MTwebCategory;
use App\Models\Admin\MUserLogin;

class Approver extends BaseController
{
    public function __construct()
    {
       $this->MTwebGedung   = new MTwebGedung();
       $this->MTwebCategory = new MTwebCategory();
       $this->MUserLogin    = new MUserLogin();
    }

    public function index()
    {
        $gedung   = $this->MTwebGedung->findAll();
        return view('approver/index',[
            'gedung'   => $gedung
        ]);
    }

    public function profile(){
        $user = $this->session->get('id_user');
        $user = $this->MUserLogin->find($user);

        return view('approver/userprofile/index',[
            'user'  =>  $user
        ]);
    }

    public function user(){
        $user = $this->MUserLogin->findAll();

        return view('approver/userlogin/index',[
            'user'  =>  $user
        ]);
    }

    public function update(){
        $valid = $this->validate([
            "foto_user" => [
                "label" => "Foto Lokasi",
                "rules" =>
                    "max_size[foto_user,1024]|is_image[foto_user]|mime_in[foto_user,image/jpg,image/jpeg,image/gif,image/png,image/webp]",
                "errors" => [
                    "max_size" => "Ukuran {field} Max 2048 KB",
                    "ext_in"   => "Format {field} Wajib Image",
                ],
            ],
        ]);

        $id           = $this->request->getVar('id');
        $foto_sebelum = $this->request->getVar('foto_sebelum');
        $foto_user    = $this->request->getFile("foto_user");

        if ($this->request->getVar('newpw1') != $this->request->getVar('newpw2')) {
            return redirect()->back()->with("error", "Password doesn't match!!");
        }

        if ($foto_user->getError() == 4) {
            $file_name = $foto_sebelum;
        } else {
            $file_name = $foto_user->getRandomName();
            $foto_user->move("uploads/user", $file_name);
        }

        if (!$valid) {
            session()->setFlashdata(
                "pesan",
                \Config\Services::validation()->getErrors()
            );
            return redirect()
                ->back()
                ->with("pesan", "Data Gagal Disimpan");
        }else{
            $update = $this->MUserLogin->updateUserLogin([
            'nama_user' => $this->request->getVar('nama_user'),
            'username'  => $this->request->getVar('username'),
            'password'  => md5($this->request->getVar('newpw1')),
            'email'     => $this->request->getVar('email'),
            'phone'     => $this->request->getVar('phone'),
            'foto_user' => $file_name,
        ], $id);

        if ($update) {
            if ($foto_sebelum != "default.jpg" AND $foto_user->getError() != 4) {
                unlink("uploads/user/" . $foto_sebelum);
            }
            session()->setFlashdata('pesan', 'Profile Berhasil diupdate');
            return redirect()->back();
        }
        }
    }

    public function inventaris_peralatan(){
        $builder = $this->db->table('inventaris_peralatan')
            ->select('idinventaris_peralatan,kode_barang,nup,nama_barang,merk,tgl_perolehan,id_perolehan,tercatat,uraian_kondisi,nilai_perolehan')
            ->join('tweb_kondisi', 'tweb_kondisi.id_kondisi = inventaris_peralatan.id_kondisi')
            ->orderBy('kode_barang', 'asc')
            ->orderBy('nup', 'asc');

        return view('approver/inventarisperalatan/index',[
            'jlh'        => $builder->countAllResults()
        ]);
    }

    public function statistik(){
    $builder  = $this->db->table('inventaris_peralatan');
    $baik     = $this->db->table('inventaris_peralatan')->where('id_kondisi', 'K1');
    $r_ringan = $this->db->table('inventaris_peralatan')->where('id_kondisi', 'K2');
    $r_berat  = $this->db->table('inventaris_peralatan')->where('id_kondisi', 'K3');

    $kategori = $this->MTwebCategory->orderBy('golongan', 'asc')->filterKategori();
    $gedung   = $this->MTwebGedung->findAll();
    return view('approver/statistik',[
        'baik'     => $baik->countAllResults(),
        'r_ringan' => $r_ringan->countAllResults(),
        'r_berat'  => $r_berat->countAllResults(),
        'kategori' => $kategori,
        'gedung'   => $gedung
    ]);

    }

    public function viewinventaris(){
        $kategori    = $this->MTwebCategory->orderBy('golongan', 'asc')->filterKategori();
        return view('approver/viewinventaris',[
            'kategori'      => $kategori,
        ]);
    }

}
