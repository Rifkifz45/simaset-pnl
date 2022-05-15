<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\Admin\MTransaksiPB;
use App\Models\Admin\MTransaksiPBitem;

class DistRuangan Extends BaseController{
	public function __construct()
	{
		$this->MTransaksiPB = new MTransaksiPB();
		$this->MTransaksiPBitem = new MTransaksiPBitem();
	}

	public function index()
	{
		$dist_ruangan    = $this->MTransaksiPBitem->DBR();
		return view('admin/distinventarisruangan/index',[
			'dist_ruangan'		=> $dist_ruangan,
		]);
	}
}