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
}