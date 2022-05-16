<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\Admin\MTwebLokasi;
use App\Models\Admin\MTwebLokasiKategori;
use App\Models\Admin\MTwebGedung;
use App\Models\Admin\MTwebPengguna;
use App\Models\Admin\MTransaksiPBitem;

class TwebLokasi Extends BaseController{
    public function __construct()
    {
        $this->MTwebLokasi         = new MTwebLokasi();
        $this->MTwebLokasiKategori = new MTwebLokasiKategori();
        $this->MTwebGedung         = new MTwebGedung();
        $this->MTwebPengguna       = new MTwebPengguna();
        $this->MTransaksiPBitem    = new MTransaksiPBitem();
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
        $builder = $this->db->table('transaksi_penempatan_item');
        $builder->join('inventaris_peralatan', 'inventaris_peralatan.id = transaksi_penempatan_item.inventaris_peralatan_id', 'LEFT');
          $builder->join('transaksi_penempatan', 'transaksi_penempatan.idtransaksi_penempatan = transaksi_penempatan_item.idtransaksi_penempatan', 'LEFT');
        $builder->selectCount('kode_barang','total_barang');
        $builder->select('kode_barang');
        $builder->groupBy('kode_barang');
        $builder->where('id_lokasi', $id);
        $group = $builder->get()->getResult();

        return view('admin/tweblokasi/detail-group',[
            'group'    => $group,
            'id'       => $id
        ]);
    }

    public function list($id){
        $list = $this->MTransaksiPBitem
        ->join('transaksi_penempatan', 'transaksi_penempatan.idtransaksi_penempatan = transaksi_penempatan_item.idtransaksi_penempatan', 'left')
        ->join('inventaris_peralatan', 'inventaris_peralatan.id = transaksi_penempatan_item.inventaris_peralatan_id', 'left')
        ->join('tweb_kondisi', 'tweb_kondisi.id_kondisi = inventaris_peralatan.id_kondisi', 'left')
        ->join('tweb_pengguna', 'tweb_pengguna.id_pengguna = transaksi_penempatan_item.id_pengguna', 'left')
        ->join('tweb_hak', 'tweb_hak.id_hak = transaksi_penempatan_item.id_hak', 'left')
        ->join('tweb_lokasi', 'tweb_lokasi.id_lokasi = transaksi_penempatan.id_lokasi')
        ->join('tweb_gedung', 'tweb_gedung.id_gedung = tweb_lokasi.id_gedung')
        ->where('transaksi_penempatan.id_lokasi', $id)->findAll();
        return view('admin/tweblokasi/detail-list',[
            'id'   => $id,
            'list' => $list
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