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

    public function barcode($id){
        $list = $this->MTransaksiPBitem
        ->join('transaksi_penempatan', 'transaksi_penempatan.idtransaksi_penempatan = transaksi_penempatan_item.idtransaksi_penempatan', 'left')
        ->join('inventaris_peralatan', 'inventaris_peralatan.idinventaris_peralatan = transaksi_penempatan_item.idinventaris_peralatan', 'left')
        ->join('tweb_kondisi', 'tweb_kondisi.id_kondisi = inventaris_peralatan.id_kondisi', 'left')
        ->join('tweb_pengguna', 'tweb_pengguna.id_pengguna = transaksi_penempatan_item.id_pengguna', 'left')
        ->join('tweb_hak', 'tweb_hak.id_hak = transaksi_penempatan_item.id_hak', 'left')
        ->join('tweb_lokasi', 'tweb_lokasi.id_lokasi = transaksi_penempatan.id_lokasi')
        ->join('tweb_gedung', 'tweb_gedung.id_gedung = tweb_lokasi.id_gedung')
        ->where('transaksi_penempatan.id_lokasi', $id)->findAll();

        return view('admin/tweblokasi/labellistkecil',[
            'list' => $list
        ]);
    }

    public function qrcode($id){
        $list = $this->MTransaksiPBitem
        ->join('transaksi_penempatan', 'transaksi_penempatan.idtransaksi_penempatan = transaksi_penempatan_item.idtransaksi_penempatan', 'left')
        ->join('inventaris_peralatan', 'inventaris_peralatan.idinventaris_peralatan = transaksi_penempatan_item.idinventaris_peralatan', 'left')
        ->join('tweb_kondisi', 'tweb_kondisi.id_kondisi = inventaris_peralatan.id_kondisi', 'left')
        ->join('tweb_pengguna', 'tweb_pengguna.id_pengguna = transaksi_penempatan_item.id_pengguna', 'left')
        ->join('tweb_hak', 'tweb_hak.id_hak = transaksi_penempatan_item.id_hak', 'left')
        ->join('tweb_lokasi', 'tweb_lokasi.id_lokasi = transaksi_penempatan.id_lokasi')
        ->join('tweb_gedung', 'tweb_gedung.id_gedung = tweb_lokasi.id_gedung')
        ->where('transaksi_penempatan.id_lokasi', $id)->findAll();

        return view('admin/tweblokasi/labellistbesar',[
            'list' => $list
        ]);
    }

    public function cetak_group($id){
        $builder = $this->db->table('transaksi_penempatan_item');
        $builder
        ->join('inventaris_peralatan', 'inventaris_peralatan.idinventaris_peralatan = transaksi_penempatan_item.idinventaris_peralatan', 'LEFT');
        $builder
        ->join('transaksi_penempatan', 'transaksi_penempatan.idtransaksi_penempatan = transaksi_penempatan_item.idtransaksi_penempatan', 'LEFT');
        $builder->selectCount('kode_barang','total_barang');
        $builder->select('kode_barang');
        $builder->groupBy('kode_barang');
        $builder->where('id_lokasi', $id);
        $builder->where('status_penempatan_item', "1");
        $group = $builder->get()->getResult();
        $lokasi = $this->MTwebLokasi->getLokasiDetail($id);

        return view('admin/tweblokasi/detail-group-cetak',[
            'group'  => $group,
            'id'     => $id,
            'lokasi' => $lokasi
        ]);
    }

    public function cetak_list($id){
        $list = $this->MTransaksiPBitem
        ->join('transaksi_penempatan', 'transaksi_penempatan.idtransaksi_penempatan = transaksi_penempatan_item.idtransaksi_penempatan', 'left')
        ->join('inventaris_peralatan', 'inventaris_peralatan.idinventaris_peralatan = transaksi_penempatan_item.idinventaris_peralatan', 'left')
        ->join('tweb_kondisi', 'tweb_kondisi.id_kondisi = inventaris_peralatan.id_kondisi', 'left')
        ->join('tweb_pengguna', 'tweb_pengguna.id_pengguna = transaksi_penempatan_item.id_pengguna', 'left')
        ->join('tweb_hak', 'tweb_hak.id_hak = transaksi_penempatan_item.id_hak', 'left')
        ->join('tweb_lokasi', 'tweb_lokasi.id_lokasi = transaksi_penempatan.id_lokasi')
        ->join('tweb_gedung', 'tweb_gedung.id_gedung = tweb_lokasi.id_gedung')
        ->where('status_penempatan_item', "1")
        ->where('transaksi_penempatan.id_lokasi', $id)->findAll();
        $lokasi = $this->MTwebLokasi->getLokasiDetail($id);

        return view('admin/tweblokasi/detail-list-cetak',[
            'id'     => $id,
            'list'   => $list,
            'lokasi' => $lokasi,
        ]);
    }

    public function index()
    {
        $gedung   = $this->MTwebGedung->getGedung();
        $pengguna = $this->MTwebPengguna->getPengguna();
        $kategori = $this->MTwebLokasiKategori->getLokasiKategori();
        $lokasi   = $this->MTwebLokasi->getLokasi();
        $detail   = $this->MTwebLokasi->orderBy('id_lokasi', 'ASC')->getLokasiDetail();
        return view('admin/tweblokasi/index',[
            'lokasi'   => count($lokasi),
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
        $builder->join('inventaris_peralatan', 'inventaris_peralatan.idinventaris_peralatan = transaksi_penempatan_item.idinventaris_peralatan', 'LEFT');
          $builder->join('transaksi_penempatan', 'transaksi_penempatan.idtransaksi_penempatan = transaksi_penempatan_item.idtransaksi_penempatan', 'LEFT');
        $builder->selectCount('kode_barang','total_barang');
        $builder->select('kode_barang');
        $builder->groupBy('kode_barang');
        $builder->where('id_lokasi', $id);
        $builder->where('status_penempatan_item', "1");
        $group = $builder->get()->getResult();
        $lokasi = $this->MTwebLokasi->getLokasiDetail($id);

        return view('admin/tweblokasi/detail-group',[
            'group'  => $group,
            'id'     => $id,
            'lokasi' => $lokasi
        ]);
    }

    public function printgroup($id){
        return view('admin/tweblokasi/printgroup',[
            'id' => $id
        ]);
    }

    public function printlist($id){
        return view('admin/tweblokasi/printlist',[
            'id' => $id
        ]);
    }

    public function list($id){
        $list = $this->MTransaksiPBitem
        ->join('transaksi_penempatan', 'transaksi_penempatan.idtransaksi_penempatan = transaksi_penempatan_item.idtransaksi_penempatan', 'left')
        ->join('inventaris_peralatan', 'inventaris_peralatan.idinventaris_peralatan = transaksi_penempatan_item.idinventaris_peralatan', 'left')
        ->join('tweb_kondisi', 'tweb_kondisi.id_kondisi = inventaris_peralatan.id_kondisi', 'left')
        ->join('tweb_pengguna', 'tweb_pengguna.id_pengguna = transaksi_penempatan_item.id_pengguna', 'left')
        ->join('tweb_hak', 'tweb_hak.id_hak = transaksi_penempatan_item.id_hak', 'left')
        ->join('tweb_lokasi', 'tweb_lokasi.id_lokasi = transaksi_penempatan.id_lokasi')
        ->join('tweb_gedung', 'tweb_gedung.id_gedung = tweb_lokasi.id_gedung')
        ->where('transaksi_penempatan.id_lokasi', $id)
        ->where('status_penempatan_item', "1")
        ->findAll();
        $lokasi = $this->MTwebLokasi->getLokasiDetail($id);
        return view('admin/tweblokasi/detail-list',[
            'id'     => $id,
            'list'   => $list,
            'lokasi' => $lokasi,
        ]);
    }

    public function create()
    {
        $valid = $this->validate([
            "foto_lokasi" => [
                "label" => "Foto Lokasi",
                "rules" =>
                    "max_size[foto_lokasi,1024]|is_image[foto_lokasi]|mime_in[foto_lokasi,image/jpg,image/jpeg,image/gif,image/png,image/webp]",
                "errors" => [
                    "max_size" => "Ukuran {field} Max 2048 KB",
                    "ext_in" => "Format {field} Wajib Image",
                ],
            ],
        ]);

        $foto_lokasi = $this->request->getFile("foto_lokasi");

        if ($foto_lokasi->getError() == 4) {
            $file_name = "default.jpg";
        } else {
            $file_name = $foto_lokasi->getRandomName();
            $foto_lokasi->move("uploads/lokasi", $file_name);
        }

        if (!$valid) {
            session()->setFlashdata(
                "pesan",
                \Config\Services::validation()->getErrors()
            );
            return redirect()
                ->back()
                ->with("pesan", "Data Gagal Disimpan");
        }else{
        $id_gedung = $this->request->getVar('id_gedung');
        $simpan = $this->MTwebLokasi->insertLokasi([
            'id_lokasi'               => $this->request->getVar('id_lokasi'),
            'id_gedung'               => $id_gedung,
            'lantai'                  => $this->request->getVar('lantai'),
            'id_kategori_lokasi'      => $this->request->getVar('id_kategori_lokasi'),
            'nama_lokasi'             => $this->request->getVar('nama_lokasi'),
            'luas_lokasi'             => $this->request->getVar('luas_lokasi'),
            'id_pengguna'             => $this->request->getVar('id_pengguna'),
            'foto_lokasi'             => $file_name,
        ]);


        if ($simpan) {
            session()->setFlashdata('pesan', 'Location data has been successfully created.');
            return $this->response->redirect(site_url('admin/lokasi'));
        }else{
            echo "Gagal";
        }
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
        $foto_sebelum = $this->request->getVar("fotoLama");

        $valid = $this->validate([
            "foto_lokasi" => [
                "label" => "Foto Lokasi",
                "rules" =>
                    "max_size[foto_lokasi,1024]|is_image[foto_lokasi]|mime_in[foto_lokasi,image/jpg,image/jpeg,image/gif,image/png,image/webp]",
                "errors" => [
                    "max_size" => "Ukuran {field} Max 2048 KB",
                    "ext_in"   => "Format {field} Wajib Image",
                ],
            ],
        ]);

        $id        = $this->request->getVar('id_lokasi');
        $id_lokasi = strval($id);
        $id_gedung = $this->request->getVar('id_gedung');
        $code      = $this->request->getVar('code');

        $id_lokasi_huruf  = substr($id, 0, 1);
        $id_lokasi_gedung = substr($id, 2, 2);
        $id_lokasi_lantai = substr($id, 5, 2);
        $id_lokasi_kode   = substr($id, 8, 3);

        $foto_lokasi = $this->request->getFile("foto_lokasi");
        
        if ($foto_lokasi->getError() == 4) {
            $nama_file = $foto_sebelum;
        }else{
            $nama_file = $foto_lokasi->getRandomName();
            $foto_lokasi->move('uploads/lokasi', $nama_file);
            if ($foto_sebelum != "default.jpg") {
                unlink("uploads/lokasi/" . $foto_sebelum);
            }
        }

        if (!$valid) {
            session()->setFlashdata(
                "pesan",
                \Config\Services::validation()->getErrors()
            );
            return redirect()
                ->back()
                ->with("pesan", "Data Gagal Disimpan");
        }else{
            $update = $this->MTwebLokasi->updateLokasi([
            'id_lokasi'            => $id_lokasi_huruf . "-" . $id_lokasi_gedung . "-" . $this->request->getVar('lantai') . "-" . $code,
            'nama_lokasi'          => $this->request->getVar('nama_lokasi'),
            'luas_lokasi'          => $this->request->getVar('luas_lokasi'),
            'id_gedung'            => $id_gedung,
            'id_kategori_lokasi'   => $this->request->getVar('id_kategori_lokasi'),
            'lantai'               => $this->request->getVar('lantai'),
            'id_pengguna'          => $this->request->getVar('id_pengguna'),
            'foto_lokasi'          => $nama_file
        ], $id);

        if ($update) {
            session()->setFlashdata('pesan', 'Location data has been successfully updated.');
            return redirect()->back();
        }
        }
    }

    public function delete($id){
        $foto = $this->MTwebLokasi->find($id);
        if ($foto['foto_lokasi'] != "default.jpg") {
            unlink("uploads/lokasi/" . $foto['foto_lokasi']);
        }

        $delete = $this->MTwebLokasi->deleteLokasi($id);

        if ($delete) {
            session()->setFlashdata('pesan', 'Location data has been successfully deleted.');
            return redirect()->back();
        }else{
            echo "Gagal Delete";
        }
    }
}