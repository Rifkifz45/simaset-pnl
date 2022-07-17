<?php
namespace App\Controllers\Approver;
use App\Models\Admin\MTransaksiPB;
use App\Models\Admin\MTransaksiMB;
use App\Models\Admin\MTransaksiMBasal;
use App\Models\Admin\MTransaksiPBitem;
use App\Models\Admin\MInventarisPeralatan;
use App\Models\Approver\DbrModel;
use App\Controllers\BaseController;

class TransaksiPB extends BaseController {
   public function __construct() {
      $this->MTransaksiPB         = new MTransaksiPB();
      $this->MTransaksiMB         = new MTransaksiMB();
      $this->MTransaksiMBasal     = new MTransaksiMBasal();
      $this->MTransaksiPBitem     = new MTransaksiPBitem();
      $this->MInventarisPeralatan = new MInventarisPeralatan();
   }

   public function index() {
      $penempatan = $this
         ->MTransaksiPB
         ->detailPenempatan();
      $detail = $this
         ->db
         ->table("transaksi_penempatan_item")
         ->join("inventaris_peralatan", "inventaris_peralatan.idinventaris_peralatan = transaksi_penempatan_item.idinventaris_peralatan", "left")
         ->join("tweb_pengguna", "tweb_pengguna.id_pengguna = transaksi_penempatan_item.id_pengguna", "left")
         ->get()
         ->getResult();
      return view("approver/transaksipenempatan/index", ["penempatan" => $penempatan, "detail" => $detail, ]);
   }

   public function viewpdf($id) {
      $penempatan = $this
         ->MTransaksiPB
         ->where("idtransaksi_penempatan", $id)->first();
      return view("approver/transaksipenempatan/viewpdf", ["penempatan" => $penempatan, ]);
   }

   public function cetak($id) {
      $detail = $this
         ->db
         ->table('transaksi_penempatan_item')
         ->join('inventaris_peralatan', 'inventaris_peralatan.idinventaris_peralatan = transaksi_penempatan_item.idinventaris_peralatan', 'left')
         ->join('tweb_pengguna', 'tweb_pengguna.id_pengguna = transaksi_penempatan_item.id_pengguna', 'left')
         ->join('tweb_hak', 'tweb_hak.id_hak = transaksi_penempatan_item.id_hak', 'left')
         ->where('idtransaksi_penempatan', $id)->get()
         ->getResult();

      $penempatan = $this
         ->MTransaksiPB
         ->join('tweb_lokasi', 'tweb_lokasi.id_lokasi = transaksi_penempatan.id_lokasi', 'left')
         ->join('tweb_gedung', 'tweb_gedung.id_gedung = tweb_lokasi.id_gedung', 'left')
         ->where('transaksi_penempatan.idtransaksi_penempatan', $id)->first();

      return view("approver/transaksipenempatan/cetak", ["penempatan" => $penempatan, "detail" => $detail, ]);
   }

   public  function pending($id){
    $check = $this->MTransaksiPB->find($id);

      if ($check['jenis_penempatan'] == "Baru") {
      // Ubah Status Penempatan Jadi Pending
      $data = [
      "response" => $this->request->getVar("response"),
      "status_penempatan" => "Pending"
      ];

      // Update Proses Penempatan
      $update = $this->MTransaksiPB->updatePenempatan($data, $id);

      // JIKA BERHASIL UBAH, LAKUKAN PROSES BERIKUT
      if ($update) {
         $detail = $this->db->table("transaksi_penempatan_item")
         ->join("transaksi_penempatan", "transaksi_penempatan.idtransaksi_penempatan = transaksi_penempatan_item.idtransaksi_penempatan")
         ->join("inventaris_peralatan", "inventaris_peralatan.idinventaris_peralatan = transaksi_penempatan_item.idinventaris_peralatan")
         ->getWhere(["transaksi_penempatan_item.idtransaksi_penempatan" => $id, ])
         ->getResult();

      foreach ($detail as $key => $value) {
         // UPDATE DATA INVENTARIS PERALATAN KE NULL <BELUM DITEMPATKAN>
         $tercatat = ["tercatat" => null ];

         // CEK SEMUA DATA yang ada pada Transaksi Penempatan yang dipilih pada table inventaris peralatan
         $this->db->table("inventaris_peralatan")
         ->where("idinventaris_peralatan", $value->idinventaris_peralatan)
         ->update($tercatat);

         // SET STATUS PENEMPATAN MENJADI TIDAK DITEMPATKAN <0>
         $status = ["status_penempatan_item" => "0", ];

         //UPDATE TABLE TRANSAKSI PENEMPATAN ITEM
         $this->db->table("transaksi_penempatan_item")
         ->where("idtransaksi_penempatan_item", $value->idtransaksi_penempatan_item)
         ->update($status);
      }

      session()->setFlashdata("pesan", "Data Barang Di Pending. Anda dapat melihat progress pada halaman Transaksi Penempatan.");
      return redirect()->back();
   }else{
      echo "Gagal Melakukan Update";
   }



   }else if ($check['jenis_penempatan'] == "Mutasi") {
      // UPDATE STATUS PENEMPATAN JADI PENDING
      $data = [
         "response" => "No Message" ,
         "status_penempatan" => "Pending"
      ];

      // PROSES UPDATE PENEMPATAN SESUAI ID
      $update = $this->MTransaksiPB->updatePenempatan($data, $id);

      if ($update) {
      $detail = $this->db->table("transaksi_penempatan_item")
      ->join("transaksi_penempatan", "transaksi_penempatan.idtransaksi_penempatan = transaksi_penempatan_item.idtransaksi_penempatan")
      ->join("inventaris_peralatan", "inventaris_peralatan.idinventaris_peralatan = transaksi_penempatan_item.idinventaris_peralatan")
      ->getWhere(["transaksi_penempatan_item.idtransaksi_penempatan" => $id, ])
      ->getResult();

      foreach ($detail as $key => $value) {
      // UPDATE STATUS PENEMPATAN JADI 0
      $status = ["status_penempatan_item" => "0", ];

      $this->db->table("transaksi_penempatan_item")
      ->where("idtransaksi_penempatan_item", $value->idtransaksi_penempatan_item)
      ->update($status);
   }

   session()->setFlashdata("pesan", "Data Mutasi Di Pending. Admin dapat melanjutkan proses penginputan!!.");
   return redirect()->back();}

   else{
      echo "Gagal Update";
   }
      }else{
        echo "NGGAK ADA";
      }
   }

   public function accepted($id) {
      $check = $this->MTransaksiPB->find($id);

      // PENEMPATAN BARU ACCEPTED
      if ($check['jenis_penempatan'] == "Baru") {
      $data = ["response" => "No Message", "status_penempatan" => "Accepted", ];
      $update = $this->MTransaksiPB->updatePenempatan($data, $id);

      if ($update) {
      $detail = $this->db->table("transaksi_penempatan_item")
      ->join("transaksi_penempatan", "transaksi_penempatan.idtransaksi_penempatan = transaksi_penempatan_item.idtransaksi_penempatan")
      ->join("inventaris_peralatan", "inventaris_peralatan.idinventaris_peralatan = transaksi_penempatan_item.idinventaris_peralatan")
      ->getWhere(["transaksi_penempatan_item.idtransaksi_penempatan" => $id, ])->getResult();

      foreach ($detail as $key => $value) {

      $tercatat = ["tercatat" => $value->jenis_transaksi, ];

      $this->db->table("inventaris_peralatan")
      ->where("idinventaris_peralatan", $value->idinventaris_peralatan)
      ->update($tercatat);

      $status = ["status_penempatan_item" => "1", ];
      $this->db->table("transaksi_penempatan_item")
      ->where("idtransaksi_penempatan_item", $value->idtransaksi_penempatan_item)
      ->update($status); }

      session()->setFlashdata("pesan", "Data Barang Sudah Berhasil Disetujui. Cek Perkembangan pada Menu DBR / DBL.");
      return redirect()->back();
         }
      }

      // PENEMPATAN MUTASI ACCEPTED
      else if ($check['jenis_penempatan'] == "Mutasi") {
      $update = $this->MTransaksiPB->updatePenempatan(
         [
            "response" => "No Message",
            "status_penempatan" => "Accepted"
         ], $id);

      // JIKA BERHASIL UPDATE
      if ($update) {
      $detail = $this->db->table("transaksi_penempatan_item")
      ->join("transaksi_penempatan", "transaksi_penempatan.idtransaksi_penempatan = transaksi_penempatan_item.idtransaksi_penempatan")
      ->join("inventaris_peralatan", "inventaris_peralatan.idinventaris_peralatan = transaksi_penempatan_item.idinventaris_peralatan")
      ->getWhere(["transaksi_penempatan_item.idtransaksi_penempatan" => $id, ])->getResult();

      foreach ($detail as $key => $value) {
         $tercatat = ["tercatat" => $value->jenis_transaksi, ];

         $itemlama = $this->db->table("transaksi_penempatan_item")
         ->where("idinventaris_peralatan", $value->idinventaris_peralatan)
         ->where("status_penempatan_item", "1")
         ->get()
         ->getRowArray();

         $this->db->table("inventaris_peralatan")
         ->where("idinventaris_peralatan", $value->idinventaris_peralatan)
         ->update($tercatat);

         $statuslama = ["status_penempatan_item" => "0", ];
         $this->db->table("transaksi_penempatan_item")
         ->where("idtransaksi_penempatan_item", $itemlama['idtransaksi_penempatan_item'])
         ->update($statuslama);

         $statusbaru = ["status_penempatan_item" => "1", ];

                  $itembaru = $this
                     ->db
                     ->table("transaksi_penempatan_item")
                     ->where("idtransaksi_penempatan_item", $value->idtransaksi_penempatan_item)
                     ->update($statusbaru);
               }

               session()->setFlashdata("pesan", "Data Barang Sudah Berhasil Disetujui. Cek Perkembangan pada Menu DBR / DBL.");
               return redirect()
                  ->back();
            }
         
      }
      else {
         dd("GAGAL");
      }
   }

   public function rejected($id) {
      $check = $this
         ->MTransaksiPB
         ->find($id);

      if ($check['jenis_penempatan'] == "Baru") {
         $data = ["response" => "No Message", "status_penempatan" => "Rejected", ];

         $update = $this
            ->MTransaksiPB
            ->updatePenempatan($data, $id);

         if ($update) {
            $detail = $this
               ->db
               ->table("transaksi_penempatan_item")
               ->join("transaksi_penempatan", "transaksi_penempatan.idtransaksi_penempatan = transaksi_penempatan_item.idtransaksi_penempatan")
               ->join("inventaris_peralatan", "inventaris_peralatan.idinventaris_peralatan = transaksi_penempatan_item.idinventaris_peralatan")
               ->where("transaksi_penempatan_item.idtransaksi_penempatan", $id)->get()
               ->getResult();

            foreach ($detail as $key => $value) {
               $tercatat = ["tercatat" => null, ];

               $this
                  ->db
                  ->table("inventaris_peralatan")
                  ->where("idinventaris_peralatan", $value->idinventaris_peralatan)
                  ->update($tercatat);
               $this
                  ->db
                  ->table("transaksi_penempatan_item")
                  ->where("idtransaksi_penempatan", $value->idtransaksi_penempatan)
                  ->delete();
            }

            session()
               ->setFlashdata("pesan", "Penempatan Barang Ditolak</b>.");
            return redirect()
               ->back();
         }
      }
      else if ($check['jenis_penempatan'] == "Mutasi") {
         $check=$this->MTransaksiMB->where('idtransaksi_penempatan', $id)->first();
         $mutasi = $this->MTransaksiMB->find($check['idtransaksi_mutasi']);
         $idtransaksi_mutasi = $mutasi['idtransaksi_mutasi'];
         $idtransaki_penempatan = $mutasi['idtransaksi_penempatan'];

         $data = ["response" => "No Message", "status_penempatan" => "Rejected", ];

         $update = $this->MTransaksiPB->updatePenempatan($data, $id);

         // Menghapus Data penempatan item yang dibuat
         $this->MTransaksiPBitem->where('idtransaksi_penempatan', $idtransaki_penempatan)->delete();

         // Cari Data pada MB Asal
         $mb_asal = $this->MTransaksiMBasal->where('idtransaksi_mutasi', $idtransaksi_mutasi)->findAll();

         // DELETE TABLE TRANSAKSI MUTASI ASAL
         $this->MTransaksiMBasal->where("idtransaksi_mutasi", $idtransaksi_mutasi)->delete();

        foreach ($mb_asal as $key => $value) {
         // UPDATE TRANSAKSI PENEMPATAN LAMA KE SEMULA
         $check = $this->MTransaksiPBitem
         ->where('idinventaris_peralatan', $value['idinventaris_peralatan'])
         ->where('idtransaksi_penempatan', $value['idtransaksi_penempatan'])
         ->first();

         $this->MTransaksiPBitem->updateTransaksiPBitem(
            [
               'status_penempatan_item'  => '1',
            ], $check['idtransaksi_penempatan_item']);
        }

        // DELETE TABLE TRANSAKSI MUTASI ASAL
        $end = $this->MTransaksiMBasal->where("idtransaksi_mutasi", $id)->delete();

        if ($end) {
            session()->setFlashdata('pesan', 'Data Mutasi has been successfully deleted.');
            return redirect()->back();
        }else{
            echo "Gagal Delete";
        }
      }
      else {
         dd("Lainnya");
      }
   }

   public function closed($id) {
      $data = ["status_penempatan" => "Closed", ];

      $update = $this
         ->MTransaksiPB
         ->updatePenempatan($data, $id);

      if ($update) {
         session()->setFlashdata("pesan", "Dokumen yang dipilih berhasil di<b>closed.</b>.");
         return redirect()
            ->back();
      }
      else {
         echo "Gagal";
      }
   }

   public function review($id) {
      $penempatan = $this
         ->MTransaksiPB
         ->find($id);
      $jenis = $penempatan["jenis_penempatan"];
      $opsi = $this
         ->request
         ->getVar("review");

      if ($jenis == "Baru") {
         if ($opsi == "Pending") {
            $data = ["response" => $this
               ->request
               ->getVar("response") , "status_penempatan" => "Pending", ];

            $update = $this
               ->MTransaksiPB
               ->updatePenempatan($data, $id);

            if ($update) {
               $detail = $this
                  ->db
                  ->table("transaksi_penempatan_item")
                  ->join("transaksi_penempatan", "transaksi_penempatan.idtransaksi_penempatan = transaksi_penempatan_item.idtransaksi_penempatan")
                  ->join("inventaris_peralatan", "inventaris_peralatan.idinventaris_peralatan = transaksi_penempatan_item.idinventaris_peralatan")
                  ->getWhere(["transaksi_penempatan_item.idtransaksi_penempatan" => $id, ])->getResult();

               foreach ($detail as $key => $value) {
                  $tercatat = ["tercatat" => null, ];

                  $this
                     ->db
                     ->table("inventaris_peralatan")
                     ->where("idinventaris_peralatan", $value->idinventaris_peralatan)
                     ->update($tercatat);

                  $status = ["status_penempatan_item" => "0", ];

                  $this
                     ->db
                     ->table("transaksi_penempatan_item")
                     ->where("idtransaksi_penempatan_item", $value->idtransaksi_penempatan_item)
                     ->update($status);
               }

               session()->setFlashdata("pesan", "Data Barang Di Pending. Anda dapat melihat progress pada halaman Transaksi Penempatan.");
               return redirect()
                  ->back();
            }
         }
         elseif ($opsi == "Accepted") {
            $data = ["response" => $this
               ->request
               ->getVar("response") , "status_penempatan" => "Accepted", ];

            $update = $this
               ->MTransaksiPB
               ->updatePenempatan($data, $id);

            if ($update) {
               $detail = $this
                  ->db
                  ->table("transaksi_penempatan_item")
                  ->join("transaksi_penempatan", "transaksi_penempatan.idtransaksi_penempatan = transaksi_penempatan_item.idtransaksi_penempatan")
                  ->join("inventaris_peralatan", "inventaris_peralatan.idinventaris_peralatan = transaksi_penempatan_item.idinventaris_peralatan")
                  ->getWhere(["transaksi_penempatan_item.idtransaksi_penempatan" => $id, ])->getResult();

               foreach ($detail as $key => $value) {
                  $tercatat = ["tercatat" => $value->jenis_transaksi, ];

                  $this
                     ->db
                     ->table("inventaris_peralatan")
                     ->where("idinventaris_peralatan", $value->idinventaris_peralatan)
                     ->update($tercatat);

                  $status = ["status_penempatan_item" => "1", ];

                  $this
                     ->db
                     ->table("transaksi_penempatan_item")
                     ->where("idtransaksi_penempatan_item", $value->idtransaksi_penempatan_item)
                     ->update($status);
               }

               session()->setFlashdata("pesan", "Data Barang Sudah Berhasil Disetujui. Cek Perkembangan pada Menu DBR / DBL.");
               return redirect()
                  ->back();
            }
         }
         elseif ($opsi == "Rejected") {
            $data = ["response" => $this
               ->request
               ->getVar("response") , "status_penempatan" => "Rejected", ];

            $update = $this
               ->MTransaksiPB
               ->updatePenempatan($data, $id);

            if ($update) {
               $detail = $this
                  ->db
                  ->table("transaksi_penempatan_item")
                  ->join("transaksi_penempatan", "transaksi_penempatan.idtransaksi_penempatan = transaksi_penempatan_item.idtransaksi_penempatan")
                  ->join("inventaris_peralatan", "inventaris_peralatan.idinventaris_peralatan = transaksi_penempatan_item.idinventaris_peralatan")
                  ->where("transaksi_penempatan_item.idtransaksi_penempatan", $id)->get()
                  ->getResult();

               foreach ($detail as $key => $value) {
                  $tercatat = ["tercatat" => null, ];

                  $this
                     ->db
                     ->table("inventaris_peralatan")
                     ->where("idinventaris_peralatan", $value->idinventaris_peralatan)
                     ->update($tercatat);
                  $this
                     ->db
                     ->table("transaksi_penempatan_item")
                     ->where("idtransaksi_penempatan", $value->idtransaksi_penempatan)
                     ->delete();
               }

               session()
                  ->setFlashdata("pesan", "Penempatan Barang Ditolak</b>.");
               return redirect()
                  ->back();
            }
         }
         else {
            echo '<script language="javascript">';
            echo 'alert("Proses Gagal. Periksa kembali inputan anda"); history.go(-1)';
            echo "</script>";
         }

         // JENIS PENEMPATAN MUTASI
         
      }
      elseif ($jenis == "Mutasi") {
         if ($opsi == "Pending") {
            $data = ["response" => $this
               ->request
               ->getVar("response") , "status_penempatan" => "Pending", ];

            $update = $this
               ->MTransaksiPB
               ->updatePenempatan($data, $id);

            if ($update) {
               $detail = $this
                  ->db
                  ->table("transaksi_penempatan_item")
                  ->join("transaksi_penempatan", "transaksi_penempatan.idtransaksi_penempatan = transaksi_penempatan_item.idtransaksi_penempatan")
                  ->join("inventaris_peralatan", "inventaris_peralatan.idinventaris_peralatan = transaksi_penempatan_item.idinventaris_peralatan")
                  ->getWhere(["transaksi_penempatan_item.idtransaksi_penempatan" => $id, ])->getResult();

               foreach ($detail as $key => $value) {
                  $status = ["status_penempatan_item" => "0", ];

                  $this
                     ->db
                     ->table("transaksi_penempatan_item")
                     ->where("idtransaksi_penempatan_item", $value->idtransaksi_penempatan_item)
                     ->update($status);
               }

               session()->setFlashdata("pesan", "Data Mutasi Di Pending. Admin dapat melanjutkan proses penginputan!!.");
               return redirect()
                  ->back();
            }
         }
         elseif ($opsi == "Accepted") {
            $update = $this
               ->MTransaksiPB
               ->updatePenempatan(["response" => $this
               ->request
               ->getVar("response") , "status_penempatan" => "Accepted"], $id);

            if ($update) {
               $detail = $this
                  ->db
                  ->table("transaksi_penempatan_item")
                  ->join("transaksi_penempatan", "transaksi_penempatan.idtransaksi_penempatan = transaksi_penempatan_item.idtransaksi_penempatan")
                  ->join("inventaris_peralatan", "inventaris_peralatan.idinventaris_peralatan = transaksi_penempatan_item.idinventaris_peralatan")
                  ->getWhere(["transaksi_penempatan_item.idtransaksi_penempatan" => $id, ])->getResult();

               foreach ($detail as $key => $value) {
                  $tercatat = ["tercatat" => $value->jenis_transaksi, ];

                  $itemlama = $this
                     ->db
                     ->table("transaksi_penempatan_item")
                     ->where("idinventaris_peralatan", $value->idinventaris_peralatan)
                     ->where("status_penempatan_item", "1")
                     ->get()
                     ->getRowArray();

                  $this
                     ->db
                     ->table("inventaris_peralatan")
                     ->where("idinventaris_peralatan", $value->idinventaris_peralatan)
                     ->update($tercatat);

                  $statuslama = ["status_penempatan_item" => "0", ];

                  $this
                     ->db
                     ->table("transaksi_penempatan_item")
                     ->where("idtransaksi_penempatan_item", $itemlama['idtransaksi_penempatan_item'])->update($statuslama);

                  $statusbaru = ["status_penempatan_item" => "1", ];

                  $itembaru = $this
                     ->db
                     ->table("transaksi_penempatan_item")
                     ->where("idtransaksi_penempatan_item", $value->idtransaksi_penempatan_item)
                     ->update($statusbaru);
               }

               session()->setFlashdata("pesan", "Data Barang Sudah Berhasil Disetujui. Cek Perkembangan pada Menu DBR / DBL.");
               return redirect()
                  ->back();
            }
         }
         elseif ($opsi == "Rejected") {
            $check=$this->MTransaksiMB->where('idtransaksi_penempatan', $id)->first();
            dd($check);
         }
         else {
            echo '<script language="javascript">';
            echo 'alert("Proses Gagal. Periksa kembali inputan anda"); history.go(-1)';
            echo "</script>";
         }
      }
      else {
         echo "Gagal";
      }
   }
}