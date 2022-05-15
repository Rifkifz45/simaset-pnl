<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\Admin\MutasiModel;
use App\Models\Admin\MutasiDetailModel;

class Mutations Extends BaseController{
	public function __construct()
	{
		$this->MutasiModel = new MutasiModel();
		$this->MutasiDetailModel = new MutasiDetailModel();
		helper('form');
	}

	  public function index()
    {
    	$mutasi   = $this->MutasiModel->findAll();
    	$countAll = $this->MutasiModel->countAllResults();
        return view('admin/mutasi/index', [
        	'mutasi' 	=> $mutasi,
        	'countall'	=> $countAll
        ]);
    }

    public function new(){
        return view('admin/mutasi/new');
    }

    public function create(){
    	$data = [
			'mutations_name'         => $this->request->getVar('mutations_name'),
			'mutations_descriptions' => 123,
			'mutations_date'         => $this->request->getVar('mutations_date'),
			'mutations_locations'    => $this->request->getVar('mutations_locations'),
			'mutations_document'     => 'Test.pdf',
			'document_size'          => 12373,
			'user_post'              => 1
    	];
    	$simpan = $this->MutasiModel->insertMutations($data);
    	if($simpan){
    		session()->setFlashdata('success', 'Created Mutations successfully');
    		return redirect()->to(site_url('admin/mutasi')); 
    	}
    }

    public function detail($id){
    	$m_detail = $this->MutasiDetailModel->where('mutations_id', $id)->findAll();
    	$mutasi = $this->MutasiModel->where('mutations_id', $id)->first();
    	return view('admin/mutasi/detail', [
    		'm_detail' 	=>	$m_detail,
    		'mutasi'	=>	$mutasi
    	]);
    }
}