<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\Admin\UserModel;

class User Extends BaseController{
	public function __construct()
	{
		$this->UserModel = new UserModel();
	}

	public function index()
	{
		$pager = \Config\Services::pager();
		$currentPage = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
		$keyword = $this->request->getVar('keyword');

		if ($keyword) {
			$user = $this->UserModel->search($keyword);
		}else{
			$user = $this->UserModel;
		}

		return view('admin/user/index', [
			// 'users'		=> $this->UserModel->findAll()
			'users'			=> $user->paginate(10),
			'pager' 		=> $this->UserModel->pager,
			'currentPage'	=> $currentPage,
			'jumlahdata'	=> $this->UserModel->countAll()
		]);
	}
}