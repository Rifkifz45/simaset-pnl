<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\Admin\MInventarisTanah;

class InventarisTanah Extends BaseController{
	public function __construct()
	{
		$this->MInventarisTanah = new MInventarisTanah();
	}

	public function index()
	{
        $detail   = $this->MInventarisTanah->detailInventarisTanah();
		$tanah    = $this->MInventarisTanah->getInventarisTanah();
		return view('admin/inventaristanah/index',[
			'tanah'		=> $tanah,
            'detail'    => $detail
		]);
	}

	public function create()
	{
        $simpan = $this->MInventarisTanah->insertInventarisTanah([
            'golongan'          => $this->request->getVar('golongan'),
            'bidang'            => $this->request->getVar('bidang'),
            'kelompok'          => $this->request->getVar('kelompok'),
            'sub_kelompok'      => $this->request->getVar('sub_kelompok'),
            'sub_sub_kelompok'  => $this->request->getVar('sub_sub_kelompok'),
            'uraian'            => $this->request->getVar('uraian'),
            'keterangan'        => $this->request->getVar('keterangan'),
        ]);


        if ($simpan) {
        	session()->setFlashdata('pesan', 'Category data has been successfully created.');
        	return $this->response->redirect(site_url('admin/kategori'));
        }else{
        	echo "Gagal";
        }
	}

	public function update(){
		$id = $this->request->getVar('XXXs');

		$update = $this->MInventarisTanah->updateInventarisTanah([
            'golongan'          => $this->request->getVar('golongan'),
            'bidang'            => $this->request->getVar('bidang'),
            'kelompok'          => $this->request->getVar('kelompok'),
            'sub_kelompok'      => $this->request->getVar('sub_kelompok'),
            'sub_sub_kelompok'  => $this->request->getVar('sub_sub_kelompok'),
            'uraian'            => $this->request->getVar('uraian'),
            'keterangan'        => $this->request->getVar('keterangan'),
        ], $id);

		if ($update) {
			session()->setFlashdata('pesan', 'Category data has been successfully updated.');
			return redirect()->back();
		}
	}

	public function delete($id){
		$delete = $this->MInventarisTanah->deleteInventarisTanah($id);

		if ($delete) {
			session()->setFlashdata('pesan', 'Category data has been successfully deleted.');
			return redirect()->back();
		}else{
			echo "Gagal Delete";
		}
	}

	  public function import()
	  {
        $opsi = $this->request->getVar('opsi');

        if ($opsi == "1") {
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

            $kode_barang = $this->MInventarisTanah->check($excel["3"], $excel["5"]);
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

            $nilai_perolehan_pertama = str_replace(",", "", $excel["13"]);
            $nilai_mutasi            = str_replace(",", "", $excel["14"]);
            $nilai_perolehan         = str_replace(",", "", $excel["15"]);
            $nilai_penyusutan        = str_replace(",", "", $excel["16"]);
            $nilai_buku              = str_replace(",", "", $excel["17"]);
            $tgl_psp                 = strtotime($excel["27"]);

            // ID BIDANG
            $golongan   = substr($excel["3"], 0, 1);
            $bidang     = substr($excel["3"], 1, 2);
            $tweb_asset = $this->MInventarisTanah->check_id($golongan, $bidang);

            // ID KONDISI
            $kondisi    = $excel["6"];
            $kondisi    = $this->MInventarisTanah->check_kondisi($kondisi);

            $data = [
                "idtweb_asset"          => $tweb_asset['idtweb_asset'],
                'id_kondisi'              => $kondisi['id_kondisi'],
                "kode_satker"             => $excel["1"],
                "nama_satker"             => $excel["2"],
                "kode_barang"             => $excel["3"],
                "nama_barang"             => $excel["4"],
                "nup"                     => $excel["5"],
                "jenis_dokumen"           => $excel["7"],
                "kepemilikan"             => $excel["8"],
                "jenis_sertifikat"        => $excel["9"],
                "merk"                    => $excel["10"],
                "tgl_rekam_pertama"       => date("Y-m-d", strtotime($excel["11"])),
                "tgl_perolehan"           => date("Y-m-d", strtotime($excel["12"])),
                "nilai_perolehan_pertama" => $nilai_perolehan_pertama,
                "nilai_mutasi"            => $nilai_mutasi,
                "nilai_perolehan"         => $nilai_perolehan,
                "nilai_penyusutan"        => $nilai_penyusutan,
                "nilai_buku"              => $nilai_buku,
                "kuantitas"               => str_replace(",", "", $excel["18"]),
                "luas_tanah_seluruhnya"   => str_replace(",", "", $excel["19"]),
                "luas_tanah_untuk_bangunan"                 => str_replace(",", "", $excel["20"]),
                "luas_tanah_untuk_sarana_lingkungan"        => str_replace(",", "", $excel["21"]),
                "luas_lahan_kosong"       => $excel["22"],
                "jumlah_foto"             => $excel["23"],
                "status_penggunaan"       => $excel["24"],
                "status_pengelolaan"      => $excel["25"],
                "no_psp"                  => $excel["26"],
                "tgl_psp"                 => date("Y-m-d", $tgl_psp),
                "alamat"                  => $excel["28"],
                "rt_rw"                   => $excel["29"],
                "desa"                    => $excel["30"],
                "kecamatan"               => $excel["31"],
                "kabkot"                  => $excel["32"],
                "kode_kabkot"             => $excel["33"],
                "provinsi"                => $excel["34"],
                "kode_provinsi"           => $excel["35"],
                "kode_pos"                => $excel["36"],
                "alamat_lainnya"          => $excel["37"],
                "jumlah_kib"              => $excel["38"],
                "sbsk"                    => $excel["39"],
                "optimalisasi"            => $excel["40"],
                "created_at"              => date("Y-m-d H:i:s"),
                "created_by"              => "Admin",
                "updated_at"              => NULL,
                "updated_by"              => NULL,
                "tercatat"                => NULL,
            ];

            $this->db->table("inventaris_tanah")->insert($data);
            $jumlahsukses++;
        }

        session()->setFlashdata("pesan", "$jumlaherror Data Tidak Bisa Disimpan <br> $jumlahsukses Data Berhasil Disimpan"
        );
        return redirect()->to(site_url("admin/inventaris_tanah"));       
        }else{
            echo "Gagal Input";
        }
    }
}