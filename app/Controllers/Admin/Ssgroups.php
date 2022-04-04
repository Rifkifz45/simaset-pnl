<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;

// Menggunakan Model
use App\Models\Admin\GroupsModel;
use App\Models\Admin\SgroupsModel;
use App\Models\Admin\SsgroupsModel;

class Ssgroups Extends BaseController{
	public function __construct()
	{
		$this->GroupsModel = new GroupsModel();
		$this->SgroupsModel = new SgroupsModel();
		$this->SsgroupsModel = new SsgroupsModel();
	}

	public function index($id)
	{
		$sgroups 	= $this->SgroupsModel->where('sgroups_id', $id)->first();
		$ssgroups 	= $this->SsgroupsModel->where('sgroups_id', $id)->findAll();
		return view('admin/kodebarang/ssgroups', [
			'sgroups'	=>	$sgroups,
			'ssgroups'	=>	$ssgroups
		]);
	}

	public function createsubsub(){
		$sgroups_id = $this->request->getVar('sgroups_id');
		$data = [
			'ssgroups_id'	=>	$sgroups_id . $this->request->getVar('ssgroups_id'),
			'sgroups_id'		=>	$sgroups_id,
			'ssgroups_name'	=>	$this->request->getVar('ssgroups_name')
		];
		$simpan = $this->SsgroupsModel->insertSsgroups($data);
		if ($simpan) {
			session()->setFlashdata('pesan', 'Sub-sub Groups data has been successfully <b>created</b>.');
			return redirect()->back();
		}
	}

	public function updatesubsub(){
	$id	= $this->request->getVar('ssgroups_id');
	$data = [
		'ssgroups_name'	=>	$this->request->getVar('ssgroups_name'),
	];

	$update = $this->SsgroupsModel->updateSsgroups($data, $id);
	if ($update) {
		session()->setFlashdata('pesan', 'Sub-Sub Groups data has been successfully <b>updated</b>.');
		return redirect()->back();
	}
	}
}