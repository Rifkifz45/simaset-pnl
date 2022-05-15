<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\Admin\MTwebSatuan;

class TwebSatuan Extends BaseController{
	public function __construct()
	{
		$this->MTwebSatuan = new MTwebSatuan();
	}

	public function index()
	{
		$satuan    = $this->MTwebSatuan->getSatuan();
		return view('admin/twebsatuan/index',[
			'satuan'		=> $satuan,
		]);
	}

	public function create()
	{
        $simpan = $this->MTwebSatuan->insertSatuan([
            'id_satuan'          => $this->request->getVar('id_satuan'),
            'uraian_satuan'      => $this->request->getVar('uraian_satuan'),
        ]);

        if ($simpan) {
        	session()->setFlashdata('pesan', 'Unit data has been successfully created.');
        	return $this->response->redirect(site_url('admin/satuan'));
        }else{
        	echo "Gagal";
        }
	}

	public function update(){
		$id = $this->request->getVar('id_satuan');

		$update = $this->MTwebSatuan->updateSatuan([
            'uraian_satuan'      => $this->request->getVar('uraian_satuan'),
        ], $id);

		if ($update) {
			session()->setFlashdata('pesan', 'Unit data has been successfully updated.');
			return redirect()->back();
		}
	}

	public function delete($id){
		$delete = $this->MTwebSatuan->deleteSatuan($id);

		if ($delete) {
			session()->setFlashdata('pesan', 'Unit data has been successfully deleted.');
			return redirect()->back();
		}else{
			echo "Gagal Delete";
		}
	}
}