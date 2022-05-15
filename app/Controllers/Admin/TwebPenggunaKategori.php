<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\Admin\MTwebPenggunaKategori;

class TwebPenggunaKategori Extends BaseController{
	public function __construct()
	{
		$this->MTwebPenggunaKategori = new MTwebPenggunaKategori();
	}

	public function index()
	{
		$kategori    = $this->MTwebPenggunaKategori->getPenggunaKategori();
		return view('admin/twebpenggunakategori/index',[
			'kategori'		=> $kategori,
		]);
	}

	public function create()
	{
        $simpan = $this->MTwebPenggunaKategori->insertPenggunaKategori([
            'nama_kategori_pengguna' => $this->request->getVar('nama_kategori_pengguna'),
        ]);

        if ($simpan) {
        	session()->setFlashdata('pesan', 'User Category data has been successfully created.');
        	return $this->response->redirect(site_url('admin/pengguna-kategori'));
        }else{
        	echo "Gagal";
        }
	}

	public function update(){
		$id = $this->request->getVar('id_kategori_pengguna');

		$update = $this->MTwebPenggunaKategori->updatePenggunaKategori([
            'nama_kategori_pengguna'          => $this->request->getVar('nama_kategori_pengguna'),
        ], $id);

		if ($update) {
			session()->setFlashdata('pesan', 'User Category data has been successfully updated.');
			return redirect()->back();
		}
	}

	public function delete($id){
		$delete = $this->MTwebPenggunaKategori->deletePenggunaKategori($id);

		if ($delete) {
			session()->setFlashdata('pesan', 'User Category data has been successfully deleted.');
			return redirect()->back();
		}else{
			echo "Gagal Delete";
		}
	}
}