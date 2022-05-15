<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\Admin\MTransaksiPBtmp;

class TransaksiPBtmp Extends BaseController{
	public function __construct()
	{
		$this->MTransaksiPBtmp = new MTransaksiPBtmp();
	}

	public function index()
	{
		$kategori    = $this->MTransaksiPBtmp->getTransaksiPBtmp();
		return view('admin/twebkategori/index',[
			'kategori'		=> $kategori,
		]);
	}

	public function create()
	{
        $simpan = $this->MTransaksiPBtmp->insertTransaksiPBtmp([
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
		$id = $this->request->getVar('idtransaksi_penempatan_tmp');
		
		$update = $this->MTransaksiPBtmp->updateTransaksiPBtmp([
            'id_pengguna'          => $this->request->getVar('id_pengguna_modal'),
        ], $id);

		if ($update) {
			session()->setFlashdata('pesan', 'Temp Data User data has been successfully updated.');
			 return redirect()->to(site_url('admin/penempatan/new')); 
		}
	}

	public function delete($id){
		$delete = $this->MTransaksiPBtmp->deleteTransaksiPBtmp($id);

		if ($delete) {
			session()->setFlashdata('pesan', 'Temp data has been successfully deleted.');
			return redirect()->back();
		}else{
			echo "Gagal Delete";
		}
	}
}