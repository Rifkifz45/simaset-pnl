<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\Admin\MTwebPengguna;
use App\Models\Admin\MTwebPenggunaKategori;

class TwebPengguna Extends BaseController{
	public function __construct()
	{
		$this->MTwebPengguna = new MTwebPengguna();
		$this->MTwebPenggunaKategori = new MTwebPenggunaKategori();
	}

	public function index()
	{
		$detail      = $this->MTwebPengguna->getDetail();
		$pengguna    = $this->MTwebPengguna->getPengguna();
		$kategori 	 = $this->MTwebPenggunaKategori->getPenggunaKategori();
		return view('admin/twebpengguna/index',[
			'pengguna'		=> $pengguna,
			'detail'		=> $detail,
			'kategori'		=> $kategori
		]);
	}

	public function create()
	{
        $simpan = $this->MTwebPengguna->insertPengguna([
            'nama_pengguna'          => $this->request->getVar('nama_pengguna'),
            'nip'                    => $this->request->getVar('nip'),
            'id_kategori_pengguna'   => $this->request->getVar('id_kategori_pengguna'),
            'foto'                   => $this->request->getVar('foto')
        ]);


        if ($simpan) {
        	session()->setFlashdata('pesan', 'User data has been successfully created.');
        	return $this->response->redirect(site_url('admin/pengguna'));
        }else{
        	echo "Gagal";
        }
	}

	public function update(){
		$id = $this->request->getVar('id_pengguna');

		$update = $this->MTwebPengguna->updatePengguna([
            'nama_pengguna'          => $this->request->getVar('nama_pengguna'),
            'nip'                    => $this->request->getVar('nip'),
            'id_kategori_pengguna'   => $this->request->getVar('id_kategori_pengguna'),
            'foto'                   => $this->request->getVar('foto')
        ], $id);

		if ($update) {
			session()->setFlashdata('pesan', 'User data has been successfully updated.');
			return redirect()->back();
		}
	}

	public function delete($id){
		$delete = $this->MTwebPengguna->deletePengguna($id);

		if ($delete) {
			session()->setFlashdata('pesan', 'User data has been successfully deleted.');
			return redirect()->back();
		}else{
			echo "Gagal Delete";
		}
	}
}