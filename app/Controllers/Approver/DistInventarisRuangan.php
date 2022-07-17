<?php
namespace App\Controllers\Approver;
use App\Controllers\BaseController;
use App\Models\Admin\MTwebGedung;
use App\Models\Admin\MTransaksiPB;
use App\Models\Admin\MTransaksiPBitem;

class DistInventarisRuangan Extends BaseController{
	public function __construct()
	{
		$this->MTwebGedung = new MTwebGedung();
		$this->MTransaksiPB = new MTransaksiPB();
		$this->MTransaksiPBitem = new MTransaksiPBitem();
	}

	public function index()
	{
		$dist_ruangan    = $this->MTransaksiPBitem->DBR();
		return view('approver/distinventarisruangan/index',[
			'dist_ruangan'		=> $dist_ruangan,
		]);
	}

	// REPORT DBR
	public function report_1(){
		$gedung    = $this->MTwebGedung->findAll();
		return view('approver/distinventarisruangan/report',[
			'gedung' => $gedung
		]);
	}
}