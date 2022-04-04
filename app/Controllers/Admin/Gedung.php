<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\Admin\GedungModel;
use App\Models\Admin\FloorsModel;

class Gedung Extends BaseController{
	public function __construct()
	{
		$this->GedungModel = new GedungModel();
		$this->FloorsModel = new FloorsModel();
	}

	public function index()
	{
		$building = $this->GedungModel->getBuildings();
		return view('admin/kodelokasi/index',[
			'buildings'		=>	$building
		]
	);
	}

	public function create(){
		$id = $this->request->getVar('gid');
		if (empty($this->request->getVar('chooselantai'))) {
			$data = [
			'buildings_id'		=>	$id . $this->request->getVar('buildings_id'),
			'buildings_name'	=>	$this->request->getVar('buildings_name')
		];

		$simpan = $this->GedungModel->insertBuildings($data);
		if ($simpan) {
			session()->setFlashdata('pesan', 'Buildings data has been successfully <b>created</b>.');
			return redirect()->back();
			}
		} else{
			$id = $this->request->getVar('gid');
			$jumlah = $this->request->getVar('chooselantai');
			$buildings_id = $id . $this->request->getVar('buildings_id');

			$data = [
				'buildings_id'		=>	$buildings_id,
				'buildings_name'	=>	$this->request->getVar('buildings_name')
			];
			$this->GedungModel->insertBuildings($data);

			for ($i=1; $i <= $jumlah; $i++) { 
				$data = [
					'floors_id'			=>	$buildings_id . "L" . $i,
					'buildings_id'		=>	$buildings_id,
					'floors_name'		=>	"Lantai " . $i
				];
				$simpan = $this->FloorsModel->insertFloors($data);
			}
			
			if ($simpan) {
				session()->setFlashdata('pesan', 'Buildings and Floors data has been successfully <b>created</b>.');
				return redirect()->back();
			}
		}
		
	}

	public function update(){
		$id = $this->request->getVar('buildings_id');
		$data = [
			'buildings_name'	=>	$this->request->getVar('buildings_name')
		];
		$update = $this->GedungModel->updateBuildings($data, $id);

		if ($update) {
			session()->setFlashdata('pesan', 'Buildings data has been successfully <b>created</b>.');
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
		$delete = $this->GedungModel->deleteBuildings($id);
		if ($delete) {
			session()->setFlashdata('pesan', 'Buildings data has been successfully <b>deleted</b>.');
			return redirect()->back();
		}
	}
}