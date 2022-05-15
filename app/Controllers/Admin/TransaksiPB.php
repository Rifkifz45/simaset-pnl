<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\Admin\MTransaksiPB;
use App\Models\Admin\MTwebGedung;
use App\Models\Admin\MTwebHak;
use App\Models\Admin\MTwebPengguna;
use App\Models\Admin\MInventarisPeralatan;
use App\Models\Admin\MTransaksiPBtmp;
use App\Models\Admin\MTransaksiPBitem;

class TransaksiPB extends BaseController
{
    public function __construct($foo = null)
    {
        $this->MTransaksiPB         = new MTransaksiPB();
        $this->MTwebGedung          = new MTwebGedung();
        $this->MTwebHak             = new MTwebHak();
        $this->MTwebPengguna        = new MTwebPengguna();
        $this->MInventarisPeralatan = new MInventarisPeralatan();
        $this->MTransaksiPBtmp      = new MTransaksiPBtmp();
        $this->MTransaksiPBitem     = new MTransaksiPBitem();
    }

    public function index()
    {
        $penempatan = $this->MTransaksiPB->detailPenempatan();
        return view('admin/transaksipenempatan/index',[
            'penempatan'    =>  $penempatan
        ]);
    }

    public function getruangan(){
        $id_gedung = $this->request->getVar('gedung_id');
        $builder   = $this->db->table('tweb_lokasi')->getWhere(['id_gedung' => $id_gedung])->getResult();
        echo json_encode($builder);
    }

    public function cari(){
        return view('admin/transaksipenempatan/cari_barang');
    }

    public function new(){
        $gedung    = $this->MTwebGedung->findAll();
        $hak       = $this->MTwebHak->findAll();
        $pengguna  = $this->MTwebPengguna->findAll();
 
        return view('admin/transaksipenempatan/new',[
            'gedung'    =>  $gedung,
            'hak'       =>  $hak,
            'pengguna'  =>  $pengguna,
        ]);
    }

    public function form_tambah(){
        // PRIMARY ID DARI BARANG
        $id              = $this->request->getVar('id');
        $kode_barang     = $this->request->getVar('kode_barang');
        $nup             = $this->request->getVar('nup');
        //ID TRANSAKSI
        $idtransaksi_tmp = $this->request->getVar('kode');
        // ID PENGGUNA
        $idpengguna      = $this->request->getVar('id_pengguna');

        $data = $this->MInventarisPeralatan->where('id', $id)->first();

        // PERIKSA APAKAH BARANG SUDAH DITEMPATKAN
        if (($data['tercatat'] == "DBR") OR ($data['tercatat'] == "DBL") OR ($data['tercatat'] == "KIB")){
            $pesanError = "Kode Barang tidak dapat dipakai, karna <b> sudah Ditempatkan/ dipakai</b>!";
            return redirect()->to(site_url('admin/penempatan/new')); 
        }else{
            $check = $this->MTransaksiPBtmp->where('inventaris_peralatan_id', $id)->findAll();
            // CEK APAKAH KODE SUDAH DIINPUT PADA TMP
            if (count($check) >= 1) {
                $pesanError = "Kode Barang sudah di-Input, ganti dengan yang lain !";
                return redirect()->to(site_url('admin/penempatan/new')); 
            }else{
            // MASUKKAN DATABASE TMP
            $input = [
                'idtransaksi_penempatan'    => $idtransaksi_tmp,
                'inventaris_peralatan_id'   => $id,
                'id_pengguna'               => $idpengguna,
            ];
            $simpan = $this->MTransaksiPBtmp->insertTransaksiPBtmp($input);
            if ($simpan) {
            session()->setFlashdata('pesan', 'Temp data has been successfully created.');
                return redirect()->to(site_url('admin/penempatan/new')); 
            }else{
                echo "Gagal";
            }
            }
        }
    }

    public function create()
    {
         $valid = $this->validate([
            'dokumen' => [
                'label' => 'Dokumen Mutasi',
                'rules' => 'max_size[dokumen,2048]|ext_in[dokumen,pdf]',
                'errors' => [
                    'max_size' => 'Ukuran {field} Max 2048 KB',
                    'ext_in'   => 'Format {field} Wajib .PDF'   
                ]
            ],
        ]);

        $file  = $this->request->getFile('dokumen');

        if ($file->getError() == 4) {
            $file_name = 'default.pdf';
            $file_size = 3;
        }else{
            $file_name = $file->getRandomName();
            $file_size = $file->getSize('kb');
            $file->move('uploads/penempatan_barang', $file_name);
        }

        $simpan = $this->MTransaksiPB->insertPenempatan([
            'idtransaksi_penempatan' => $this->request->getVar('idtransaksi_penempatan'),
            'id_lokasi'         => $this->request->getVar('id_lokasi'),
            'id_hak'            => $this->request->getVar('id_hak'),
            'tgl_penempatan'    => $this->request->getVar('tgl_penempatan'),
            'keterangan'        => $this->request->getVar('keterangan'),
            'status_penempatan' => 'Pending',
            'jenis_transaksi'   => $this->request->getVar('jenis_transaksi'),
            'keterangan'        => $this->request->getVar('keterangan'),
            'dokumen'           => $file_name,
            'ukuran_dokumen'    => $file_size,
            "created_at"        => date("Y-m-d H:i:s"),
            "created_by"        => "Admin",
            "updated_at"        => NULL,
            "updated_by"        => NULL,
        ]);

        if ($simpan) {
            $kode = $this->request->getVar('idtransaksi_penempatan');
            $tmp = $this->MTransaksiPBtmp->where('idtransaksi_penempatan', $kode)->findAll();

            foreach ($tmp as $key => $value) {
                $kode_barang = $value['inventaris_peralatan_id'];
                $this->MTransaksiPBitem->insertTransaksiPBitem([
                    'idtransaksi_penempatan'     => $kode,
                    'inventaris_peralatan_id'    => $kode_barang,
                    'id_pengguna'                => $value['id_pengguna'],
                    'id_hak'                     => $this->request->getVar('id_hak'),
                    'status'                     => "1",
                ]);
            }

            $this->MTransaksiPBtmp->where('idtransaksi_penempatan', $kode)->delete();

            session()->setFlashdata('pesan', 'Placement data has been successfully created.');
            return $this->response->redirect(site_url('admin/penempatan'));
        }else{
            echo "Gagal";
        }
    }

    public function add_dokumen(){
        $id = $this->request->getVar('idtransaksi_penempatan');
        $valid = $this->validate([
            'dokumen' => [
                'label' => 'Dokumen Penempatan',
                'rules' => 'uploaded[dokumen]|max_size[dokumen,2048]|ext_in[dokumen,pdf]',
                'errors' => [
                    'uploaded' => '{field} Wajib Diisi',
                    'max_size' => 'Ukuran {field} Max 2048 KB',
                    'ext_in'   => 'Format {field} Wajib .PDF'   
                ]
            ],
        ]);

        $dokumen = $this->request->getFile('dokumen');
        $nama_file = $dokumen->getRandomName();
        $ukuran_file = $dokumen->getSize('kb');

        if (!$valid) {
            return redirect()->back()->with('pesan', 'Upload Gagal. Pastikan data bertipe pdf dengan ukuran max 2MB');
        } else {
            $data = [
                'dokumen'           => $nama_file,
                'ukuran_dokumen'    => $ukuran_file
            ];

            $dokumen->move('uploads/penempatan_barang', $nama_file);

            $this->db->table('transaksi_penempatan')->where(['idtransaksi_penempatan' => $id])->update($data);

            return redirect()->back()->with('success', 'Data Berhasil Ditambahkan');
        }
    }

    public function ganti_dokumen(){
        $id = $this->request->getVar('idtransaksi_penempatan');
        $dokumen_before = $this->request->getVar('dokumen_before');
        $valid = $this->validate([
            'dokumen' => [
                'label' => 'Edit Dokumen Penempatan',
                'rules' => 'uploaded[dokumen]|max_size[dokumen,2048]|ext_in[dokumen,pdf]',
                'errors' => [
                    'uploaded' => '{field} Wajib Diisi',
                    'max_size' => 'Ukuran {field} Max 2048 KB',
                    'ext_in'   => 'Format {field} Wajib .PDF'   
                ]
            ],
        ]);

        $dokumen = $this->request->getFile('dokumen');
        $nama_file = $dokumen->getRandomName();
        $ukuran_file = $dokumen->getSize('kb');

        if (!$valid) {
            session()->setFlashdata('pesan', \Config\Services::validation()->getErrors());
            return redirect()->back()->with('pesan', 'Data Gagal Disimpan');
        } else {
                if ($dokumen_before != "default.pdf") {
                    unlink('uploads/penempatan_barang/' . $dokumen_before);
                }
            $data = [
                'dokumen'           => $nama_file,
                'ukuran_dokumen'    => $ukuran_file
            ];

            $dokumen->move('uploads/penempatan_barang', $nama_file);

            $this->db->table('transaksi_penempatan')->where(['idtransaksi_penempatan ' => $id])->update($data);

            return redirect()->back()->with('pesan', 'Data Berhasil Diupdate');
        }
    }

    public function delete_dokumen($id){
        $penempatan = $this->db->table('transaksi_penempatan')->getWhere(['idtransaksi_penempatan' => $id])->getRow();

        if ($penempatan->dokumen != "default.pdf" OR $penempatan->dokumen != "") {
                unlink('uploads/penempatan_barang/' . $penempatan->dokumen);
        }

        $data = [
            'dokumen'           => NULL,
            'ukuran_dokumen'    => NULL
        ];

        $this->db->table('transaksi_penempatan')->where(['idtransaksi_penempatan' => $id])->update($data);
        return redirect()->back()->with('pesan', 'Document Berhasi Dihapus');
    }

    public function viewpdf($id){
        $penempatan = $this->MTransaksiPB->where('idtransaksi_penempatan', $id)->first();
        return view('admin/transaksipenempatanitem/viewpdf',[
            'penempatan'    =>  $penempatan
        ]);
    }

    public function delete($id){
        $delete = $this->MTransaksiPB->deletePenempatan($id);

        if ($delete) {
            session()->setFlashdata('pesan', 'Item Data has been successfully deleted.');
            return redirect()->back();
        }else{
            echo "Gagal Delete";
        }
    }
}
