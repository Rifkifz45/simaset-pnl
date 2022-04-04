<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\Admin\FloorsModel;

class Floors Extends BaseController{
	public function __construct()
	{
		$this->FloorsModel = new FloorsModel();
	}

	public function index()
	{
	
	}

	public function create(){
		$buildings_id = $this->request->getVar('buildings_id');
		$data = [
			'floors_id'		=>	$buildings_id . $this->request->getVar('floors_id'),
			'buildings_id'	=>	$buildings_id,
			'floors_name'	=>	$this->request->getVar('floors_name')
		];

		$simpan = $this->FloorsModel->insertFloors($data);
		if ($simpan) {
			session()->setFlashdata('pesan', 'Floors data has been successfully <b>created</b>.');
			return redirect()->back();
		}
	}

	public function update(){
		$id = $this->request->getVar('floors_id');
		$data = [
			'floors_name'	=>	$this->request->getVar('floors_name')
		];
		$update = $this->FloorsModel->updateFloors($data, $id);

		if ($update) {
			session()->setFlashdata('pesan', 'Floors data has been successfully <b>created</b>.');
			return redirect()->back();
		}
	}

	public function detail($id){
		$gedung = $this->GedungModel->where('buildings_id', $id)->first();
		$detail = $this->FloorsModel->where('buildings_id', $id)->findAll();
		return view('admin/kodelokasi/detail-gedung', [
			'buildings'	=>	$gedung,
			'detail'	=>	$detail
		]);
	}

	public function delete($id){
		$delete = $this->FloorsModel->deleteFloors($id);
		if ($delete) {
			session()->setFlashdata('pesan', 'Floors data has been successfully <b>deleted</b>.');
			return redirect()->back();
		}
	}
}