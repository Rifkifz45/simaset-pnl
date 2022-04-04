<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\Admin\FloorsModel;
use App\Models\Admin\GedungModel;
use App\Models\Admin\RoomsModel;

class Rooms Extends BaseController{
	public function __construct()
	{
		$this->FloorsModel = new FloorsModel();
		$this->GedungModel = new GedungModel();
		$this->RoomsModel = new RoomsModel();
	}

	public function index()
	{
	
	}

	public function create(){
		$floors_id = $this->request->getVar('floors_id');
		$data = [
			'rooms_id'		=>	$floors_id . $this->request->getVar('rooms_id'),
			'floors_id'		=>	$floors_id,
			'rooms_name'	=>	$this->request->getVar('rooms_name'),
			'rooms_area'	=>	$this->request->getVar('rooms_area'),
		];

		$simpan = $this->RoomsModel->insertRooms($data);
		if ($simpan) {
			session()->setFlashdata('pesan', 'Rooms data has been successfully <b>created</b>.');
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
		$floors = $this->GedungModel->join('table-floors', 'table-floors.buildings_id = table-buildings.buildings_id')->where('table-floors.floors_id', $id)->first();
		$rooms = $this->RoomsModel->where('floors_id', $id)->findAll();
		return view('admin/kodelokasi/add-rooms',[
			'floors'	=>	$floors,
			'rooms'		=>	$rooms
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