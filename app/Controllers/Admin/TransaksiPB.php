<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\Admin\MTransaksiPB;
use App\Models\Admin\MTwebCategory;
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
        $this->MTwebCategory        = new MTwebCategory();
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
        return view("admin/transaksipenempatan/index", [
            "penempatan" => $penempatan,
            "jumlah" => count($penempatan),
        ]);
    }

    public function getruangan()
    {
        $id_gedung = $this->request->getVar("gedung_id");
        $builder = $this->db
            ->table("tweb_lokasi")
            ->getWhere(["id_gedung" => $id_gedung])
            ->getResult();
        echo json_encode($builder);
    }

    public function cari()
    {
        $bidang    = $this->MTwebCategory->where('golongan', '3')->orderBy('golongan', 'asc')->getBidang();
        return view("admin/transaksipenempatan/cari_barang",[
            'bidang' => $bidang
        ]);
    }

    public function new()
    {
        $gedung = $this->MTwebGedung->findAll();
        $hak = $this->MTwebHak->findAll();
        $pengguna = $this->MTwebPengguna->findAll();

        return view("admin/transaksipenempatan/new", [
            "gedung" => $gedung,
            "hak" => $hak,
            "pengguna" => $pengguna,
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
            return redirect()
                ->back()
                ->with("error", "Upload Gagal, Pastikan gambar bertipe PDF dengan ukuran dibawah 2MB");
        } else {
            $simpan = $this->MTransaksiPB->insertPenempatan([
                "idtransaksi_penempatan" => $this->request->getVar(
                    "idtransaksi_penempatan"
                ),
                "id_lokasi" => $this->request->getVar("id_lokasi"),
                "id_hak" => $this->request->getVar("id_hak"),
                "tgl_penempatan" => $this->request->getVar("tgl_penempatan"),
                "keterangan" => $this->request->getVar("keterangan"),
                "status_penempatan" => "Pending",
                "jenis_transaksi" => $this->request->getVar("jenis_transaksi"),
                "jenis_penempatan" => "Baru",
                "keterangan" => $this->request->getVar("keterangan"),
                "dokumen" => $file_name,
                "ukuran_dokumen" => $file_size,
                "created_at" => date("Y-m-d H:i:s"),
                "created_by" => $user,
                "updated_at" => null,
                "updated_by" => null,
            ]);

            if ($simpan) {
                $kode = $this->request->getVar("idtransaksi_penempatan");
                $tmp = $this->MTransaksiPBtmp
                    ->where("idtransaksi_penempatan", $kode)
                    ->findAll();

                foreach ($tmp as $key => $val) {
                    $kode_barang = $val["inventaris_peralatan_id"];
                    $this->MTransaksiPBitem->insertTransaksiPBitem([
                        "idtransaksi_penempatan" => $kode,
                        "idinventaris_peralatan" => $kode_barang,
                        "id_pengguna" => $val["id_pengguna"],
                        "id_hak" => $this->request->getVar("id_hak"),
                        "status_penempatan_item" => "0",
                    ]);
                }

                $this->MTransaksiPBtmp
                    ->where("idtransaksi_penempatan", $kode)
                    ->delete();

                session()->setFlashdata(
                    "pesan",
                    "Proses penempatan barang berhasil. Data akan terlihat pada DBR / DBL setelah disetujui oleh approver"
                );
                return $this->response->redirect(site_url("admin/penempatan"));
            } else {
                echo "Gagal";
            }
        }
    }

    public function add_dokumen()
    {
        $id = $this->request->getVar("idtransaksi_penempatan");
        $valid = $this->validate([
            "dokumen" => [
                "label" => "Dokumen Penempatan",
                "rules" =>
                    "uploaded[dokumen]|max_size[dokumen,2048]|ext_in[dokumen,pdf]",
                "errors" => [
                    "uploaded" => "{field} Wajib Diisi",
                    "max_size" => "Ukuran {field} Max 2048 KB",
                    "ext_in" => "Format {field} Wajib .PDF",
                ],
            ],
        ]);

        $dokumen = $this->request->getFile("dokumen");
        $nama_file = $dokumen->getRandomName();
        $ukuran_file = $dokumen->getSize("kb");

        if (!$valid) {
            return redirect()
                ->back()
                ->with(
                    "pesan",
                    "Upload Gagal. Pastikan data bertipe pdf dengan ukuran max 2MB"
                );
        } else {
            $data = [
                "dokumen" => $nama_file,
                "ukuran_dokumen" => $ukuran_file,
            ];

            $dokumen->move("uploads/penempatan_barang", $nama_file);

            $this->db
                ->table("transaksi_penempatan")
                ->where(["idtransaksi_penempatan" => $id])
                ->update($data);

            return redirect()->to(
                site_url("admin/penempatan/detail/" . $idtransaki_penempatan)
            );
        }
    }

    public function ganti_dokumen()
    {
        $id = $this->request->getVar("idtransaksi_penempatan");
        $dokumen_before = $this->request->getVar("dokumen_before");
        $valid = $this->validate([
            "dokumen" => [
                "label" => "Edit Dokumen Penempatan",
                "rules" =>
                    "uploaded[dokumen]|max_size[dokumen,2048]|ext_in[dokumen,pdf]",
                "errors" => [
                    "uploaded" => "{field} Wajib Diisi",
                    "max_size" => "Ukuran {field} Max 2048 KB",
                    "ext_in" => "Format {field} Wajib .PDF",
                ],
            ],
        ]);

        $dokumen = $this->request->getFile("dokumen");
        $nama_file = $dokumen->getRandomName();
        $ukuran_file = $dokumen->getSize("kb");

        if (!$valid) {
            session()->setFlashdata(
                "pesan",
                \Config\Services::validation()->getErrors()
            );
            return redirect()
                ->back()
                ->with("pesan", "Data Gagal Disimpan");
        } else {
            if ($dokumen_before != "default.pdf") {
                unlink("uploads/penempatan_barang/" . $dokumen_before);
            }
            $data = [
                "dokumen" => $nama_file,
                "ukuran_dokumen" => $ukuran_file,
            ];

            $dokumen->move("uploads/penempatan_barang", $nama_file);

            $this->db
                ->table("transaksi_penempatan")
                ->where(["idtransaksi_penempatan " => $id])
                ->update($data);

            return redirect()->to(
                site_url("admin/penempatan/detail/" . $idtransaki_penempatan)
            );
        }
    }

    public function delete_dokumen($id)
    {
        $penempatan = $this->db
            ->table("transaksi_penempatan")
            ->getWhere(["idtransaksi_penempatan" => $id])
            ->getRow();

        if (
            $penempatan->dokumen != "default.pdf" or
            $penempatan->dokumen != ""
        ) {
            unlink("uploads/penempatan_barang/" . $penempatan->dokumen);
        }

        $data = [
            "dokumen" => null,
            "ukuran_dokumen" => null,
        ];

        $this->db
            ->table("transaksi_penempatan")
            ->where(["idtransaksi_penempatan" => $id])
            ->update($data);
        return redirect()
            ->back()
            ->with("pesan", "Document Berhasi Dihapus");
    }

    public function viewpdf($id)
    {
        $penempatan = $this->MTransaksiPB
            ->where("idtransaksi_penempatan", $id)
            ->first();
        return view("admin/transaksipenempatanitem/viewpdf", [
            "penempatan" => $penempatan,
        ]);
    }

    public function delete($id)
    {
        $check = $this->MTransaksiPB->find($id);

        if ($check['jenis_penempatan'] == "Baru") {
            $pb_item = $this->MTransaksiPBitem->where('idtransaksi_penempatan', $id)->findAll();

            foreach ($pb_item as $key => $value) {
                $tercatat = ["tercatat" => null ];

                $this->db->table("inventaris_peralatan")
                ->where("idinventaris_peralatan", $value['idinventaris_peralatan'])
                ->update($tercatat);
            }

            $this->MTransaksiPBitem->where('idtransaksi_penempatan', $id)->delete();
            $this->MTransaksiPB->deletePenempatan($id);
            session()->setFlashdata('pesan', 'Data Penempatan Berhasil Dihapus');
            return redirect()->back();
        } else if($check['jenis_penempatan'] == "Mutasi") {
            echo "<script>alert('Data Mutasi hanya dapat dihapus pada halaman mutasi');document.location='".site_url('admin/penempatan')."'</script>";
        }else{
            dd("HALO");
        }
    }
}