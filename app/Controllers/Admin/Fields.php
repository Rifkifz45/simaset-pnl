<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;

use App\Models\Admin\FieldsModel;
use App\Models\Admin\CategoryModel;
use App\Models\Admin\GroupsModel;

class Fields Extends BaseController{
	public function __construct()
	{
		$this->FieldsModel   = new FieldsModel();
		$this->CategoryModel = new CategoryModel();
		$this->GroupsModel   = new GroupsModel();
	}

	public function fieldstanah(){
		$category 	= $this->CategoryModel->where('category_id', 2)->first();
		$fields 	= $this->FieldsModel->where('category_id', 2)->findAll();
		$count 		= $this->GroupsModel->countAllResults();
		return view('admin/kodebarang/fields',[
			'category'		=>	$category,
			'fields'		=> $fields,
		]);
	}

	public function fieldsmesin(){
		$category 	= $this->CategoryModel->where('category_id', 3)->first();
		$fields 	= $this->FieldsModel->where('category_id', 3)->findAll();
		$count 		= $this->GroupsModel->countAllResults();
		return view('admin/kodebarang/fields',[
			'category'		=>	$category,
			'fields'		=> $fields,
		]);
	}

	public function fieldsgedung(){
		$category 	= $this->CategoryModel->where('category_id', 4)->first();
		$fields 	= $this->FieldsModel->where('category_id', 4)->findAll();
		$count 		= $this->GroupsModel->countAllResults();
		return view('admin/kodebarang/fields',[
			'category'		=>	$category,
			'fields'		=> $fields,
		]);
	}

	public function fieldsirigasi(){
		$category 	= $this->CategoryModel->where('category_id', 5)->first();
		$fields 	= $this->FieldsModel->where('category_id', 5)->findAll();
		$count 		= $this->GroupsModel->countAllResults();
		return view('admin/kodebarang/fields',[
			'category'		=>	$category,
			'fields'		=> $fields,
		]);
	}

	public function fieldslainnya(){
		$category 	= $this->CategoryModel->where('category_id', 6)->first();
		$fields 	= $this->FieldsModel->where('category_id', 6)->findAll();
		$count 		= $this->GroupsModel->countAllResults();
		return view('admin/kodebarang/fields',[
			'category'		=>	$category,
			'fields'		=> $fields,
		]);
	}

	public function fieldskonstruksi(){
		$category 	= $this->CategoryModel->where('category_id', 7)->first();
		$fields 	= $this->FieldsModel->where('category_id', 7)->findAll();
		$count 		= $this->GroupsModel->countAllResults();
		return view('admin/kodebarang/fields',[
			'category'		=>	$category,
			'fields'		=> $fields,
		]);
	}

	public function fieldsintangible(){
		$category 	= $this->CategoryModel->where('category_id', 8)->first();
		$fields 	= $this->FieldsModel->where('category_id', 8)->findAll();
		$count 		= $this->GroupsModel->countAllResults();
		return view('admin/kodebarang/fields',[
			'category'		=>	$category,
			'fields'		=> $fields,
		]);
	}

	public function create(){
		$category_id = $this->request->getVar('category_id');
		$data = [
			'fields_id'		=> $category_id . $this->request->getVar('fields_id'),
			'category_id'	=> $category_id,
			'fields_name'	=> $this->request->getVar('fields_name'),
		];

		$simpan = $this->FieldsModel->insertFields($data);
		if ($simpan) {
			session()->setFlashdata('pesan', 'Fields data has been successfully <b>created</b>.');
			return redirect()->back();
		}
	}

	public function update(){
		$id = $this->request->getVar('fields_id');
		$data = [
			'fields_name'	=>	$this->request->getVar('fields_name'),
		];

		$update = $this->FieldsModel->updateFields($data, $id);
		if ($update) {
			session()->setFlashdata('pesan', 'Fields data has been successfully <b>updated</b>.');
			return redirect()->back();
		}
	}
}