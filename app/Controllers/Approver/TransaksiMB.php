<?php
namespace App\Controllers\Approver;
use App\Controllers\BaseController;
use App\Models\Admin\MTransaksiPB;
use App\Models\Admin\MTransaksiPBitem;
use App\Models\Admin\MTransaksiMB;
use App\Models\Admin\MTransaksiMBasal;
use App\Models\Admin\MTransaksiMBtmp;
use App\Models\Admin\MTwebGedung;
use App\Models\Admin\MTwebHak;
use App\Models\Admin\MTwebPengguna;

class TransaksiMB extends BaseController
{
    public function __construct()
    {
        $this->MTransaksiPB     = new MTransaksiPB();
        $this->MTransaksiPBitem = new MTransaksiPBitem();
        $this->MTransaksiMB     = new MTransaksiMB();
        $this->MTransaksiMBasal = new MTransaksiMBasal();
        $this->MTransaksiMBtmp  = new MTransaksiMBtmp();
        $this->MTwebGedung      = new MTwebGedung();
        $this->MTwebHak         = new MTwebHak();
        $this->MTwebPengguna    = new MTwebPengguna();
    }

    public function index()
    {
        $mutasi = $this->MTransaksiMB->detailTransaksiMB();
        return view("approver/transaksimutasi/index", [
            "mutasi" => $mutasi,
            "jumlah" => count($mutasi),
        ]);
    }

    public function update(){
        
    }
}