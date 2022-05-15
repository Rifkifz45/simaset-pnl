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
		$pager = \Config\Services::pager();
		$currentPage = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
		$keyword = $this->request->getVar('keyword');

		if ($keyword) {
			$user = $this->MUserLogin->search($keyword);
		}else{
			$user = $this->MUserLogin;
		}

		return view('admin/user/index', [
			// 'users'		=> $this->UserModel->findAll()
			'users'			=> $user->paginate(10),
			'pager' 		=> $this->MUserLogin->pager,
			'currentPage'	=> $currentPage,
			'jumlahdata'	=> $this->MUserLogin->countAll()
		]);
	}
}