<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\Admin\CategoryModel;
use App\Models\Admin\FieldsModel;
use App\Models\Admin\MesinModel;

class Category Extends BaseController{
	public function __construct()
	{
		$this->CategoryModel = new CategoryModel();
		$this->FieldsModel = new FieldsModel();
	}

	public function index()
	{
		$count = count_field();

		$category    = $this->CategoryModel->findAll();
		return view('admin/kodebarang/index',[
			'category'		=> $category,
			'count'			=> $count,
		]);
	}

	public function viewcategory()
	{
		$count = count_field();
		
		$category = $this->CategoryModel->findAll();
		return view('admin/category/index',[
			'category'		=> $category,
			'count'			=> $count
		]);
	}
}

function count_field(){
	$FieldsModel = new FieldsModel();
	$tanah       = $FieldsModel->where('category_id', 2)->countAllResults();
	$mesin       = $FieldsModel->where('category_id', 3)->countAllResults();
	$gedung      = $FieldsModel->where('category_id', 4)->countAllResults();
	$irigasi     = $FieldsModel->where('category_id', 5)->countAllResults();
	$lainnya     = $FieldsModel->where('category_id', 6)->countAllResults();
	$konstruksi  = $FieldsModel->where('category_id', 7)->countAllResults();
	$takberwujud = $FieldsModel->where('category_id', 8)->countAllResults();
	
	$count = [$tanah, $mesin, $gedung, $irigasi, $lainnya, $konstruksi, $takberwujud];
	return $count;
}