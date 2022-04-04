<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\Admin\MesinModel;
use App\Models\Admin\FieldsModel;

function guidv4($data = null)
{
    // Generate 16 bytes (128 bits) of random data or use the data passed into the function.
    $data = $data ?? random_bytes(16);
    assert(strlen($data) == 16);

    // Set version to 0100
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
    // Set bits 6-7 to 10
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

    // Output the 36 character UUID.
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}

class Mesin extends BaseController
{
    public function __construct()
    {
        $this->MesinModel = new MesinModel();
        $this->FieldsModel = new FieldsModel();
    }

    public function index()
    {
        $id = 3;
        $fields = $this->FieldsModel->where('category_id', $id)->findAll();
        return view("admin/peralatanmesin/index",[
            'fields'    =>  $fields,
        ]);
    }

    public function viewimport()
    {
        return view("admin/peralatanmesin/viewimport");
    }

    public function prosesimport()
    {
        $file = $this->request->getFile("file_excel");
        $ext = $file->getClientExtension();

        if ($ext == "xls") {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        } else {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }

        $spreadsheet = $render->load($file);
        $sheet = $spreadsheet->getActiveSheet()->toArray();

        $jumlaherror = 0;
        $jumlahsukses = 0;

        foreach ($sheet as $x => $excel) {

            if ($x == 0) {
                continue;
            }

            $kode_barang = $this->MesinModel->check($excel["3"], $excel["5"]);
            //Skip jika ada data yang sama

            if (isset($kode_barang["kode_barang"])) {
                if (
                    $excel["3"] == $kode_barang["kode_barang"] and
                    $excel["5"] == $kode_barang["nup"]
                ) {
                    $jumlaherror++;
                    continue;
                }
            }

            $tgl_rekam_pertama       = strtotime($excel["8"]);
            $tgl_perolehan           = strtotime($excel["9"]);
            $nilai_perolehan_pertama = str_replace(",", "", $excel["10"]);
            $nilai_mutasi            = str_replace(",", "", $excel["11"]);
            $nilai_perolehan         = str_replace(",", "", $excel["12"]);
            $nilai_penyusutan        = str_replace(",", "", $excel["13"]);
            $nilai_buku              = str_replace(",", "", $excel["14"]);
            $tgl_psp                 = strtotime($excel["20"]);

            $getID = $this->MesinModel->check_id(substr($excel["3"], 0, 3));

            $data = [
                "idmasterplm"             => guidv4(),
                "fields_id"               => $getID->fields_id,
                "kode_satker"             => $excel["1"],
                "nama_satker"             => $excel["2"],
                "kode_barang"             => $excel["3"],
                "nama_barang"             => $excel["4"],
                "nup"                     => $excel["5"],
                "kondisi"                 => $excel["6"],
                "merk_tipe"               => $excel["7"],
                "tgl_rekam_pertama"       => date("Y-m-d", $tgl_rekam_pertama),
                "tgl_perolehan"           => date("Y-m-d", $tgl_perolehan),
                "nilai_perolehan_pertama" => $nilai_perolehan_pertama,
                "nilai_mutasi"            => $nilai_mutasi,
                "nilai_perolehan"         => $nilai_perolehan,
                "nilai_penyusutan"        => $nilai_penyusutan,
                "nilai_buku"              => $nilai_buku,
                "kuantitas"               => $excel["15"],
                "jml_foto"                => $excel["16"],
                "status_penggunaan"       => $excel["17"],
                "status_pengelolaan"      => $excel["18"],
                "no_psp"                  => $excel["19"],
                "tgl_psp"                 => date("Y-m-d", $tgl_psp),
                "jml_kib"                 => $excel["21"],
                "status"                  => "Belum Terdistribusi",
            ];

            $this->db->table("tabel-master-plm")->insert($data);
            $jumlahsukses++;
        }

        session()->setFlashdata("pesan", "$jumlaherror Data Tidak Bisa Disimpan <br> $jumlahsukses Data Berhasil Disimpan"
        );
        return redirect()->to(site_url("admin/peralatan-mesin/view-import"));
    }

    public function viewdata($id){
        return view('admin/peralatanmesin/detail', [
            'id'    => $id
        ]);
    }
}
