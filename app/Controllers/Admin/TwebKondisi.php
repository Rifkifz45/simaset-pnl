<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\Admin\MTwebKondisi;

class TwebKondisi Extends BaseController{
	public function __construct()
	{
		$this->MTwebKondisi = new MTwebKondisi();
	}

	public function index()
	{
		$kondisi    = $this->MTwebKondisi->getKondisi();
		return view('admin/twebkondisi/index',[
			'kondisi'		=> $kondisi,
		]);
	}

	public function create()
	{
        $simpan = $this->MTwebKondisi->insertKondisi([
            'id_kondisi'          => $this->request->getVar('id_kondisi'),
            'uraian_kondisi'      => $this->request->getVar('uraian_kondisi'),
        ]);


        if ($simpan) {
        	session()->setFlashdata('pesan', 'Condition data has been successfully created.');
        	return $this->response->redirect(site_url('admin/kondisi'));
        }else{
        	echo "Gagal";
        }
	}

	public function update(){
		$id = $this->request->getVar('id_kondisi');

		$update = $this->MTwebKondisi->updateKondisi([
            'uraian_kondisi'    => $this->request->getVar('uraian_kondisi'),
        ], $id);

		if ($update) {
			session()->setFlashdata('pesan', 'Condition data has been successfully updated.');
			return redirect()->back();
		}
	}

	public function delete($id){
		$delete = $this->MTwebKondisi->deleteKondisi($id);

		if ($delete) {
			session()->setFlashdata('pesan', 'Condition data has been successfully deleted.');
			return redirect()->back();
		}else{
			echo "Gagal Delete";
		}
	}
}