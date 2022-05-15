<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\Admin\MTwebLokasi;
use App\Models\Admin\MTwebLokasiKategori;
use App\Models\Admin\MTwebGedung;
use App\Models\Admin\MTwebPengguna;

class TwebLokasi Extends BaseController{
    public function __construct()
    {
        $this->MTwebLokasi         = new MTwebLokasi();
        $this->MTwebLokasiKategori = new MTwebLokasiKategori();
        $this->MTwebGedung         = new MTwebGedung();
        $this->MTwebPengguna       = new MTwebPengguna();
    }

    public function index()
    {
        $gedung   = $this->MTwebGedung->getGedung();
        $pengguna = $this->MTwebPengguna->getPengguna();
        $kategori = $this->MTwebLokasiKategori->getLokasiKategori();
        $lokasi   = $this->MTwebLokasi->getLokasi();
        $detail   = $this->MTwebLokasi->orderBy('id_lokasi', 'ASC')->getLokasiDetail();
        return view('admin/tweblokasi/index',[
            'lokasi'   => $lokasi,
            'detail'   => $detail,
            'kategori' => $kategori,
            'pengguna' => $pengguna,
            'gedung'   => $gedung
        ]);
    }

    public function add()
    {
        $pengguna   = $this->MTwebPengguna->getPengguna();
        $kategori   = $this->MTwebLokasiKategori->getLokasiKategori();
        $gedung     = $this->MTwebGedung->getGedung();
        return view('admin/tweblokasi/tambahlokasi',[
            'gedung'    => $gedung,
            'kategori'  => $kategori,
            'pengguna'  => $pengguna
        ]);
    }

    public function group($id){
        return view('admin/tweblokasi/detail-group',[
            'id'    => $id
        ]);
    }

    public function list($id){
        return view('admin/tweblokasi/detail-list',[
            'id'    => $id
        ]);
    }

    public function create()
    {
        $id_gedung = $this->request->getVar('id_gedung');
        $lantai    = "L0" . $this->request->getVar('lantai');
        $lokasi    = $this->request->getVar('id_lokasi');
        $simpan = $this->MTwebLokasi->insertLokasi([
            'id_lokasi'               => $id_gedung . "-" . $lantai . "-" . $lokasi,
            'id_gedung'               => $id_gedung,
            'lantai'                  => $this->request->getVar('lantai'),
            'id_kategori_lokasi'      => $this->request->getVar('id_kategori_lokasi'),
            'nama_lokasi'             => $this->request->getVar('nama_lokasi'),
            'id_pengguna'             => $this->request->getVar('id_pengguna'),
            'keterangan'              => $this->request->getVar('keterangan'),
            'foto'                    => $this->request->getVar('foto'),
        ]);


        if ($simpan) {
            session()->setFlashdata('pesan', 'Location data has been successfully created.');
            return $this->response->redirect(site_url('admin/lokasi/add'));
        }else{
            echo "Gagal";
        }
    }

     public function lainnya()
    {
        $simpan = $this->MTwebLokasi->insertLokasi([
            'lantai'                  => 0,
            'id_kategori_lokasi'      => $this->request->getVar('id_kategori_lokasi'),
            'id_lokasi'               => $this->request->getVar('id_lokasi'),
            'nama_lokasi'             => $this->request->getVar('nama_lokasi')
        ]);


        if ($simpan) {
            session()->setFlashdata('pesan', 'Location data has been successfully created.');
            return redirect()->back();
        }else{
            echo "Gagal";
        }
    }

    public function update(){
        $id = $this->request->getVar('id_lokasi');
        $id_gedung = $this->request->getVar('id_gedung');
        $id_lantai = "L0" . $this->request->getVar('lantai');
        $code = $this->request->getVar('code');

        $update = $this->MTwebLokasi->updateLokasi([
            'id_lokasi'            => $id_gedung . "-" . $id_lantai . "-" . $code,
            'nama_lokasi'          => $this->request->getVar('nama_lokasi'),
            'id_gedung'            => $id_gedung,
            'id_kategori_lokasi'   => $this->request->getVar('id_kategori_lokasi'),
            'lantai'               => $this->request->getVar('lantai'),
            'id_pengguna'          => $this->request->getVar('id_pengguna'),
            'foto'                 => $this->request->getVar('foto')
        ], $id);

        if ($update) {
            session()->setFlashdata('pesan', 'Location data has been successfully updated.');
            return redirect()->back();
        }
    }

    public function delete($id){
        $delete = $this->MTwebLokasi->deleteLokasi($id);

        if ($delete) {
            session()->setFlashdata('pesan', 'Location data has been successfully deleted.');
            return redirect()->back();
        }else{
            echo "Gagal Delete";
        }
    }
}