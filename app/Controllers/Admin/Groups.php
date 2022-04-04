<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\Admin\GroupsModel;
use App\Models\Admin\FieldsModel;

class Groups Extends BaseController{
	public function __construct()
	{
		$this->GroupsModel = new GroupsModel();
		$this->FieldsModel = new FieldsModel();
	}

	public function index($id)
	{
		$groups   = $this->GroupsModel->where('fields_id', $id)->findAll();
		$fields   = $this->FieldsModel->where('fields_id', $id)->first();
		return view('admin/kodebarang/groups', [
			'groups'	=>	$groups,
			'fields'	=>	$fields
		]);
	}

	public function create(){
		$fields_id = $this->request->getVar('fields_id');
		$data = [
			'groups_id'		=> $fields_id . $this->request->getVar('groups_id'),
			'fields_id'		=> $fields_id,
			'groups_name'	=> $this->request->getVar('groups_name')
		];

		$simpan = $this->GroupsModel->insertGroups($data);
		if ($simpan) {
			session()->setFlashdata('pesan', 'Groups data has been successfully <b>created</b>.');
			return redirect()->back();
		}
	}

	public function update(){
		$id = $this->request->getVar('groups_id');
		$data = [
			'groups_name'	=>	$this->request->getVar('groups_name'),
		];

		$update = $this->GroupsModel->updateGroups($data, $id);
		if ($update) {
			session()->setFlashdata('pesan', 'Fields data has been successfully <b>updated</b>.');
			return redirect()->back();
		}
	}
}