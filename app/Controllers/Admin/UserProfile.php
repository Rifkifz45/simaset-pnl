<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\Admin\MUserLogin;

class UserProfile Extends BaseController{
	public function __construct()
	{
		$this->MUserLogin = new MUserLogin();
	}

	public function index()
	{
		$user = $this->session->get('id_user');
		$user = $this->MUserLogin->find($user);

		return view('admin/userprofile/index',[
			'user'	=>	$user
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
}