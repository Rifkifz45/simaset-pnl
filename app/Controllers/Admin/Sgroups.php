<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\Admin\SgroupsModel;
use App\Models\Admin\GroupsModel;

class Sgroups Extends BaseController{
	public function __construct()
	{
		$this->SgroupsModel = new SgroupsModel();
		$this->GroupsModel = new GroupsModel();
	}

	public function index($id)
	{
		$groups 	= $this->GroupsModel->where('groups_id', $id)->first();
		$sgroups 	= $this->SgroupsModel->where('groups_id', $id)->findAll();
		return view('admin/kodebarang/sgroups', [
			'sgroups'	=>	$sgroups,
			'groups'	=>	$groups
		]);
	}

	public function createsub(){
		$groups_id = $this->request->getVar('groups_id');

		$data = [
			'sgroups_id'	=>	$groups_id . $this->request->getVar('sgroups_id'),
			'groups_id'		=> 	$groups_id,
			'sgroups_name'	=>	$this->request->getVar('sgroups_name')
		];
		$simpan = $this->SgroupsModel->insertSgroups($data);
		if ($simpan) {
			session()->setFlashdata('pesan', 'Sub Groups data has ben successfully <b>created</b>.');
			return redirect()->back();
		}
	}

	public function updatesub(){
		$id = $this->request->getVar('sgroups_id');
		$data = [
			'sgroups_name'	=>	$this->request->getVar('sgroups_name')
		];
		$update = $this->SgroupsModel->updateSgroups($data, $id);

		if ($update) {
			session()->setFlashdata('pesan', 'Sub Groups data has been successfully <b>updated</b>.');
			return redirect()->back();
		}
	}
}