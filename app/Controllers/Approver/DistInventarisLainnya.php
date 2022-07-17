<?php
namespace App\Controllers\Approver;
use App\Controllers\BaseController;
use App\Models\Admin\MTransaksiPB;
use App\Models\Admin\MTwebGedung;
use App\Models\Admin\MTransaksiPBitem;

class DistInventarisLainnya Extends BaseController{
	public function __construct()
	{
		$this->MTwebGedung = new MTwebGedung();
		$this->MTransaksiPB = new MTransaksiPB();
		$this->MTransaksiPBitem = new MTransaksiPBitem();
	}

	public function index()
	{
		$dist_lainnya    = $this->MTransaksiPBitem->DBL();
		return view('approver/distinventarislainnya/index',[
			'dist_lainnya' => $dist_lainnya,
		]);
	}

	// REPORT DBL
	public function report_2(){
		$gedung    = $this->MTwebGedung->findAll();
		return view('approver/distinventarislainnya/report',[
			'gedung' => $gedung
		]);
	}
}