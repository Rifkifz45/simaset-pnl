<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\Admin\MTwebCategory;
use Config\Services;
use \Hermawan\DataTables\DataTable;

class TwebCategory Extends BaseController{
	public function __construct()
	{
		$this->MTwebCategory = new MTwebCategory();
	}

	public function DI_tweb_asset(){
		$request = Services::request();
        if ($request->isAJAX()) {            
            $db = db_connect();
            $builder = $db->table('tweb_asset')
            	->select('idtweb_asset,golongan,bidang,kelompok,sub_kelompok,sub_sub_kelompok,uraian')
            	->orderBy('golongan','ASC')
            	->orderBy('bidang','ASC')
            	->orderBy('kelompok','ASC')
            	->orderBy('sub_kelompok','ASC')
            	->orderBy('sub_sub_kelompok','ASC');

            return DataTable::of($builder)
            ->addNumbering('no')
            ->add('action', function($row){
		        return '<a data-toggle="modal" data-target="#edit'.$row->idtweb_asset.'" data-toggle="tooltip" data-placement="top" rel="tooltip" type="button" title="Edit" class="btn btn-xs btn-info"><i class="ace-icon glyphicon glyphicon-edit"></i> </a>
		        <a data-toggle="modal" data-target="#delete'.$row->idtweb_asset.'" data-toggle="tooltip" data-placement="top" rel="tooltip" type="button" title="Delete" class="btn btn-xs btn-danger"><i class="ace-icon glyphicon glyphicon-trash"></i> </a>';
		    })
            ->toJson(true);
        }
	}

	public function index()
	{
		$kategori   = $this->MTwebCategory
		->orderBy('golongan', 'asc')
		->orderBy('bidang', 'asc')
		->orderBy('kelompok', 'asc')
		->orderBy('sub_kelompok', 'asc')
		->orderBy('sub_sub_kelompok', 'asc')
		->getKategori();
		return view('admin/twebkategori/index',[
			'kategori'		=> $kategori,
		]);
	}

	public function viewinventaris(){
		$kategori    = $this->MTwebCategory->orderBy('golongan', 'asc')->filterKategori();
		return view('admin/twebkategori/view-inventaris',[
			'kategori'		=> $kategori,
		]);
	}

	public function create()
	{
        $simpan = $this->MTwebCategory->insertKategori([
            'golongan'          => $this->request->getVar('golongan'),
            'bidang'            => $this->request->getVar('bidang'),
            'kelompok'          => $this->request->getVar('kelompok'),
            'sub_kelompok'      => $this->request->getVar('sub_kelompok'),
            'sub_sub_kelompok'  => $this->request->getVar('sub_sub_kelompok'),
            'uraian'            => $this->request->getVar('uraian'),
            'keterangan'        => $this->request->getVar('keterangan'),
        ]);


        if ($simpan) {
        	session()->setFlashdata('pesan', 'Category data has been successfully created.');
        	return $this->response->redirect(site_url('admin/kategori'));
        }else{
        	echo "Gagal";
        }
	}

	public function update(){
		$id = $this->request->getVar('idtweb_asset');

		$update = $this->MTwebCategory->updateKategori([
            'golongan'          => $this->request->getVar('golongan'),
            'bidang'            => $this->request->getVar('bidang'),
            'kelompok'          => $this->request->getVar('kelompok'),
            'sub_kelompok'      => $this->request->getVar('sub_kelompok'),
            'sub_sub_kelompok'  => $this->request->getVar('sub_sub_kelompok'),
            'uraian'            => $this->request->getVar('uraian'),
            'keterangan'        => $this->request->getVar('keterangan'),
        ], $id);

		if ($update) {
			session()->setFlashdata('pesan', 'Category data has been successfully updated.');
			return redirect()->back();
		}
	}

	public function delete($id){
		$delete = $this->MTwebCategory->deleteKategori($id);

		if ($delete) {
			session()->setFlashdata('pesan', 'Category data has been successfully deleted.');
			return redirect()->back();
		}else{
			echo "Gagal Delete";
		}
	}
}