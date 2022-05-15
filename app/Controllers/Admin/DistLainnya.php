<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\Admin\MTransaksiPB;
use App\Models\Admin\MTransaksiPBitem;

class DistLainnya Extends BaseController{
	public function __construct()
	{
		$this->MTransaksiPB = new MTransaksiPB();
		$this->MTransaksiPBitem = new MTransaksiPBitem();
	}

	public function index()
	{
		$dist_lainnya    = $this->MTransaksiPBitem->DBL();
		return view('admin/distinventarislainnya/index',[
			'dist_lainnya' => $dist_lainnya,
		]);
	}
}