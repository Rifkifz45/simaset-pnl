<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\Admin\MTwebGedung;
use App\Models\Admin\MTwebLokasi;
use App\Models\Admin\MTwebLokasiKategori;
use App\Models\Admin\MTwebPengguna;

class TwebGedung Extends BaseController{
	public function __construct()
	{
		$this->MTwebGedung   = new MTwebGedung();
		$this->MTwebLokasi   = new MTwebLokasi();
		$this->MTwebLokasiKategori   = new MTwebLokasiKategori();
		$this->MTwebPengguna = new MTwebPengguna();
	}

	public function index()
	{
		$pengguna        = $this->MTwebPengguna->getPengguna();
		$gedung          = $this->MTwebGedung->detailGedung();
		$lokasi          = $this->MTwebLokasi->getLokasi();
		$lokasi_kategori = $this->MTwebLokasiKategori->getLokasiKategori();
		return view('admin/twebgedung/index',[
			'gedung'          => $gedung,
			'pengguna'        => $pengguna,
			'lokasi'          => $lokasi,
			'lokasi_kategori' => $lokasi_kategori
		]);
	}

	public function add()
	{
		return view('admin/twebgedung/tambahgedung');
	}

	public function create()
	{
        $simpan = $this->MTwebGedung->insertGedung([
            'id_gedung'       => $this->request->getVar('id_gedung'),
            'nama_gedung'     => $this->request->getVar('nama_gedung'),
            'qty_lantai'      => $this->request->getVar('qty_lantai'),
            'id_pengguna'     => $this->request->getVar('id_pengguna'),
            'keterangan'      => $this->request->getVar('keterangan'),
            'foto'            => $this->request->getVar('foto')
        ]);


        if ($simpan) {
        	session()->setFlashdata('pesan', 'Building data has been successfully created.');
        	return redirect()->back();
        }else{
        	echo "Gagal";
        }
	}

	public function edit($id)
	{
		$gedung = $this->MTwebGedung->getGedung($id);
		return view('admin/twebgedung/editgedung', [
			'gedung' => $gedung
		]);
	}

	public function update(){
		$id = $this->request->getVar('id_gedung');
		$update = $this->MTwebGedung->updateGedung([
            'nama_gedung'     => $this->request->getVar('nama_gedung'),
            'qty_lantai'      => $this->request->getVar('qty_lantai'),
            'id_pengguna'     => $this->request->getVar('id_pengguna'),
            'keterangan'      => $this->request->getVar('keterangan'),
            'foto'            => $this->request->getVar('foto')
        ], $id);

		if ($update) {
			session()->setFlashdata('pesan', 'Category data has been successfully updated.');
			return redirect()->to(site_url('admin/gedung'));
		}
	}

	public function delete($id){
		$delete = $this->MTwebGedung->deleteGedung($id);

		if ($delete) {
			session()->setFlashdata('pesan', 'Category data has been successfully deleted.');
			return redirect()->back();
		}else{
			echo "Gagal Delete";
		}
	}
}