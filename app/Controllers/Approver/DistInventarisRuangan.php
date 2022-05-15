<?php
namespace App\Controllers\Approver;
use App\Controllers\BaseController;
use App\Models\Approver\MDistInventarisRuangan;

class DistInventarisRuangan Extends BaseController{
	public function __construct()
	{
		$this->MDistInventarisRuangan = new MDistInventarisRuangan();
	}

	public function index()
	{
		$dbr    = $this->MDistInventarisRuangan->DetailDistInventarisRuangan();
		return view('approver/distinventarisruangan/index',[
			'dbr'		=> $dbr,
		]);
	}

	public function update(){
		$id = $this->request->getVar('XXXs');

		$update = $this->MDistInventarisRuangan->updateKategori([
            'golongan'          => $this->request->getVar('golongan'),
            'bidang'            => $this->request->getVar('bidang'),
            'kelompok'          => $this->request->getVar('kelompok'),
            'sub_kelompok'      => $this->request->getVar('sub_kelompok'),
            'sub_sub_kelompok'  => $this->request->getVar('sub_sub_kelompok'),
            'uraian'            => $this->request->getVar('uraian'),
            'keterangan'        => $this->request->getVar('keterangan'),
        ], $id);

		if ($update) {
			session()->setFlashdata('pesan', 'Category data has been successfully updated.');
			return redirect()->back();
		}
	}

	public function delete($id){
		$delete = $this->MDistInventarisRuangan->deleteKategori($id);

		if ($delete) {
			session()->setFlashdata('pesan', 'Category data has been successfully deleted.');
			return redirect()->back();
		}else{
			echo "Gagal Delete";
		}
	}
}