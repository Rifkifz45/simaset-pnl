<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\Admin\MUserLogin;

class UserLogin Extends BaseController{
	public function __construct()
	{
		$this->MUserLogin = new MUserLogin();
	}

	public function index()
	{
		$user = $this->MUserLogin->findAll();

		return view('admin/userlogin/index',[
			'user'	=>	$user
		]);
	}

	public function reset($id){
		$user = $this->session->get('id_user');
		$update = $this->MUserLogin->updateUserLogin([
			'password'    => md5(123),
			'updated_at'  => date("Y-m-d H:i:s"),
			'updated_by'  => $user
        ], $id);

        if ($update) {
        	session()->setFlashdata('pesan', 'Reset Berhasil Diupdate');
        	return $this->response->redirect(site_url('admin/user'));
        }else{
        	echo "Gagal";
        }
	}

	public function create(){
		$id = $this->request->getVar('id');
		$user = $this->session->get('id_user');
		$password = $this->request->getVar('password');
		if ($password == NULL) {
			$pw = md5(123);
		}else{
			$pw = md5($password);
		}

		$simpan = $this->MUserLogin->insertUserLogin([
			'id'          => $id,
			'nama_user'   => $this->request->getVar('nama_user'),
			'username'    => $this->request->getVar('username'),
			'password'    => $pw,
			'email'       => $this->request->getVar('email'),
			'phone'       => $this->request->getVar('phone'),
			'level'       => $this->request->getVar('level'),
			'status_akun' => "1",
			'created_at'  => date("Y-m-d H:i:s"),
			'created_by'  => $user,
			'updated_at'  => NULL,
			'updated_by'  => NULL
        ]);

        if ($simpan) {
        	session()->setFlashdata('pesan', 'Mastery data has been successfully created.');
        	return $this->response->redirect(site_url('admin/user'));
        }else{
        	echo "Gagal";
        }
	}
}