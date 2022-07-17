<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\Admin\MTransaksiPB;
use App\Models\Admin\MTwebCategory;
use App\Models\Admin\MTransaksiPBitem;
use App\Models\Admin\MTransaksiMB;
use App\Models\Admin\MTransaksiMBasal;
use App\Models\Admin\MTransaksiMBtmp;
use App\Models\Admin\MTwebLokasi;
use App\Models\Admin\MTwebGedung;
use App\Models\Admin\MTwebHak;
use App\Models\Admin\MTwebPengguna;

class TransaksiMB extends BaseController
{
    public function __construct()
    {
        $this->MTransaksiPB     = new MTransaksiPB();
        $this->MTwebCategory    = new MTwebCategory();
        $this->MTransaksiPBitem = new MTransaksiPBitem();
        $this->MTransaksiMB     = new MTransaksiMB();
        $this->MTransaksiMBasal = new MTransaksiMBasal();
        $this->MTransaksiMBtmp  = new MTransaksiMBtmp();
        $this->MTwebGedung      = new MTwebGedung();
        $this->MTwebLokasi      = new MTwebLokasi();
        $this->MTwebHak         = new MTwebHak();
        $this->MTwebPengguna    = new MTwebPengguna();
    }

    public function index()
    {
        $mutasi = $this->MTransaksiMB->detailTransaksiMB();
        return view("admin/transaksimutasi/index", [
            "mutasi" => $mutasi,
            "jumlah" => count($mutasi),
        ]);
    }

    public function new()
    {
        $gedung = $this->MTwebGedung->findAll();
        $hak = $this->MTwebHak->findAll();
        $pengguna = $this->MTwebPengguna->findAll();

        return view("admin/transaksimutasi/new", [
            "gedung" => $gedung,
            "hak" => $hak,
            "pengguna" => $pengguna,
        ]);
    }

    public function cari()
    {
        $bidang    = $this->MTwebCategory->where('golongan', '3')->orderBy('golongan', 'asc')->getBidang();
        $lokasi = $this->MTwebLokasi->join('tweb_gedung', 'tweb_gedung.id_gedung = tweb_lokasi.id_gedung')->findAll();
        return view("admin/transaksimutasi/pencarian_barang",[
            'bidang' => $bidang,
            'lokasi' => $lokasi,
        ]);
    }

    public function create()
    {
        $user = $this->session->get("id_user");

        $valid = $this->validate([
            "dokumen" => [
                "label" => "Dokumen Mutasi",
                "rules" => "max_size[dokumen,2048]|ext_in[dokumen,pdf]",
                "errors" => [
                    "max_size" => "Ukuran {field} Max 2048 KB",
                    "ext_in" => "Format {field} Wajib .PDF",
                ],
            ],
        ]);

        $file = $this->request->getFile("dokumen");

        if ($file->getError() == 4) {
            $file_name = null;
            $file_size = null;
        } else {
            $file_name = $file->getRandomName();
            $file_size = $file->getSize("kb");
            $file->move("uploads/penempatan_barang", $file_name);
        }

        if (!$valid) {
            session()->setFlashdata(
                "pesan",
                \Config\Services::validation()->getErrors()
            );
            return redirect()
                ->back()
                ->with("pesan", "Data Gagal Disimpan");
        } else {
            $simpan = $this->MTransaksiPB->insertPenempatan([
                "idtransaksi_penempatan" => $this->request->getVar(
                    "idtransaksi_penempatan"
                ),
                "id_lokasi" => $this->request->getVar("id_lokasi"),
                "id_hak" => $this->request->getVar("id_hak"),
                "tgl_penempatan" => $this->request->getVar("tgl_mutasi"),
                "keterangan" => $this->request->getVar("keterangan"),
                "status_penempatan" => "Pending",
                "jenis_transaksi" => $this->request->getVar("jenis_transaksi"),
                'jenis_penempatan' => "Mutasi",
                "keterangan" => $this->request->getVar("keterangan"),
                "dokumen" => $file_name,
                "ukuran_dokumen" => $file_size,
                "created_at" => date("Y-m-d H:i:s"),
                "created_by" => $user,
                "updated_at" => null,
                "updated_by" => null,
            ]);

            if ($simpan) {
                $mutasi = $this->MTransaksiMB->insertTransaksiMB([
                    "idtransaksi_mutasi" => $this->request->getVar(
                        "idtransaksi_mutasi"
                    ),
                    "idtransaksi_penempatan" => $this->request->getVar(
                        "idtransaksi_penempatan"
                    ),
                    "tgl_mutasi" => $this->request->getVar("tgl_mutasi"),
                    "alasan_mutasi" => $this->request->getVar("alasan_mutasi"),
                    "created_by" => $user,
                ]);

                if ($mutasi) {
                    $kode  = $this->request->getVar("idtransaksi_penempatan");
                    $kode2 = $this->request->getVar("idtransaksi_mutasi");
                    $tmp   = $this->MTransaksiMBtmp
                        ->where("idtransaksi_mutasi", $kode2)
                        ->findAll();

                    foreach ($tmp as $key => $val) {
                        $kode_barang = $val["idinventaris_peralatan"];
                        $this->MTransaksiPBitem->insertTransaksiPBitem([
                            "idtransaksi_penempatan" => $kode,
                            "idinventaris_peralatan" => $kode_barang,
                            "id_pengguna" => $val["id_pengguna"],
                            "id_hak" => $this->request->getVar("id_hak"),
                            "status_penempatan_item" => "0",
                        ]);

                        $this->MTransaksiMBasal->insertTransaksiMBasal([
                            'idtransaksi_mutasi' => $kode2,
                            'idtransaksi_penempatan' => $val['idtransaksi_penempatan'],
                            'idinventaris_peralatan' => $kode_barang,
                        ]);
                    }

                    $this->MTransaksiMBtmp
                        ->where("idtransaksi_mutasi", $kode2)
                        ->delete();

                    session()->setFlashdata(
                        "pesan",
                        "Proses penempatan barang berhasil. Data akan terlihat pada DBR / DBL setelah disetujui oleh approver"
                    );
                    return $this->response->redirect(
                        site_url("admin/mutasi")
                    );
                } else {
                    echo "Gagal";
                }
            }
        }
    }

    public function delete($id){
        $mutasi = $this->MTransaksiMB->find($id);
        $idtransaksi_mutasi = $mutasi['idtransaksi_mutasi'];
        $idtransaki_penempatan = $mutasi['idtransaksi_penempatan'];

        // Menghapus Data penempatan item yang dibuat
        $this->MTransaksiPBitem->where('idtransaksi_penempatan', $idtransaki_penempatan)->delete();

        // Cari Data pada MB Asal
        $mb_asal = $this->MTransaksiMBasal->where('idtransaksi_mutasi', $idtransaksi_mutasi)->findAll();

        foreach ($mb_asal as $key => $value) {
            // UPDATE TRANSAKSI PENEMPATAN LAMA KE SEMULA
            $check = $this->MTransaksiPBitem
                ->where('idinventaris_peralatan', $value['idinventaris_peralatan'])
                ->where('idtransaksi_penempatan', $value['idtransaksi_penempatan'])
                ->first();

            $this->MTransaksiPBitem->updateTransaksiPBitem([
                'status_penempatan_item'  => '1',
            ], $check['idtransaksi_penempatan_item']);
        }

        // DELETE TABLE TRANSAKSI MUTASI ASAL
        $this->MTransaksiMBasal->where("idtransaksi_mutasi", $id)->delete();

        // DELETE TABLE TRANSAKSI MUTASI
        $this->MTransaksiMB->where('idtransaksi_mutasi', $id)->delete();

        // DELETE Penempatan yang Dimutasi 
        $end = $this->MTransaksiPB->where('idtransaksi_penempatan', $idtransaki_penempatan)->delete();

        if ($end) {
            session()->setFlashdata('pesan', 'Data Mutasi has been successfully deleted.');
            return redirect()->back();
        }else{
            echo "Gagal Delete";
        }
    }
}