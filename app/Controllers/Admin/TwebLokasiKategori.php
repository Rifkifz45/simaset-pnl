<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\Admin\MTwebGedung;
use App\Models\Admin\MTwebLokasi;
use App\Models\Admin\MTwebLokasiKategori;

class TwebLokasiKategori Extends BaseController{
	public function __construct()
	{
		$this->MTwebGedung = new MTwebGedung();
		$this->MTwebLokasi = new MTwebLokasi();
		$this->MTwebLokasiKategori = new MTwebLokasiKategori();
	}

	public function index()
	{
		$gedung    = $this->MTwebGedung->getGedung();
		$lokasi    = $this->MTwebLokasi->getLokasi();
		$kategori    = $this->MTwebLokasiKategori->getLokasiKategori();
		return view('admin/tweblokasikategori/index',[
			'gedung'		=> $gedung,
			'lokasi'		=> $lokasi,
			'kategori'		=> $kategori,
		]);
	}

	public function create()
	{
        $simpan = $this->MTwebLokasiKategori->insertLokasiKategori([
        	'id_kategori_lokasi'  => $this->request->getVar('id_kategori_lokasi'),
            'nama_kategori_lokasi'  => $this->request->getVar('nama_kategori_lokasi')
        ]);

        if ($simpan) {
        	session()->setFlashdata('pesan', 'Location Category data has been successfully created.');
        	return redirect()->back();
        }else{
        	echo "Gagal";
        }
	}

	public function update(){
		$id = $this->request->getVar('id_kategori_lokasi');

		$update = $this->MTwebLokasiKategori->updateLokasiKategori([
            'nama_kategori_lokasi'  => $this->request->getVar('nama_kategori_lokasi')
        ], $id);

		if ($update) {
			session()->setFlashdata('pesan', 'Location Category data has been successfully updated.');
			return redirect()->back();
		}
	}

	public function delete($id){
		$delete = $this->MTwebLokasiKategori->deleteLokasiKategori($id);

		if ($delete) {
			session()->setFlashdata('pesan', 'Location Category data has been successfully deleted.');
			return redirect()->back();
		}else{
			echo "Gagal Delete";
		}
	}
}