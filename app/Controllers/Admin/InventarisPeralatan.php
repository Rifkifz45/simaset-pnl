<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\Admin\MInventarisPeralatan;

class InventarisPeralatan Extends BaseController{
	public function __construct()
	{
		$this->MInventarisPeralatan = new MInventarisPeralatan();
	}

	public function index()
	{
        $detail       = $this->MInventarisPeralatan->orderBy('kode_barang','ASC')->orderBy('nup')->detailInventarisPeralatan();
		$peralatan    = $this->MInventarisPeralatan->getInventarisPeralatan();
		return view('admin/inventarisperalatan/index',[
			'peralatan'  => $peralatan,
            'detail'     => $detail
		]);
	}

	public function create()
	{
        $simpan = $this->MInventarisPeralatan->insertInventarisPeralatan([
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

		$update = $this->MInventarisPeralatan->updateInventarisPeralatan([
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
		$delete = $this->MInventarisPeralatan->deleteInventarisPeralatan($id);

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

            $kode_barang = $this->MInventarisPeralatan->check($excel["3"], $excel["5"]);
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

            $nilai_perolehan_pertama = str_replace(",", "", $excel["10"]);
            $nilai_mutasi            = str_replace(",", "", $excel["11"]);
            $nilai_perolehan         = str_replace(",", "", $excel["12"]);
            $nilai_penyusutan        = str_replace(",", "", $excel["13"]);
            $nilai_buku              = str_replace(",", "", $excel["14"]);
            $tgl_psp                 = strtotime($excel["20"]);

            // ID BIDANG
            $golongan   = substr($excel["3"], 0, 1);
            $bidang     = substr($excel["3"], 1, 2);
            $tweb_asset = $this->MInventarisPeralatan->check_id($golongan, $bidang);

            // ID KONDISI
            $kondisi    = $excel["6"];
            $kondisi    = $this->MInventarisPeralatan->check_kondisi($kondisi);

            $data = [
                "idtweb_asset"            => NULL,
                'id_kondisi'              => $kondisi['id_kondisi'],
                'id_perolehan'            => NULL,
                "kode_satker"             => $excel["1"],
                "nama_satker"             => $excel["2"],
                "kode_barang"             => $excel["3"],
                "nama_barang"             => $excel["4"],
                "nup"                     => $excel["5"],
                "merk"                    => $excel["7"],
                "tgl_rekam_pertama"       => date("Y-m-d", strtotime($excel["8"])),
                "tgl_perolehan"           => date("Y-m-d", strtotime($excel["9"])),
                "nilai_perolehan_pertama" => $nilai_perolehan_pertama,
                "nilai_mutasi"            => $nilai_mutasi,
                "nilai_perolehan"         => $nilai_perolehan,
                "nilai_penyusutan"        => $nilai_penyusutan,
                "nilai_buku"              => $nilai_buku,
                "kuantitas"               => $excel["15"],
                "jumlah_foto"             => $excel["16"],
                "status_penggunaan"       => $excel["17"],
                "status_pengelolaan"      => $excel["18"],
                "no_psp"                  => $excel["19"],
                "tgl_psp"                 => date("Y-m-d", $tgl_psp),
                "jumlah_kib"              => $excel["21"],
                "created_at"              => date("Y-m-d H:i:s"),
                "created_by"              => "Admin",
                "updated_at"              => NULL,
                "updated_by"              => NULL,
                "tercatat"                => NULL,
            ];

            $this->db->table("inventaris_peralatan")->insert($data);
            $jumlahsukses++;
        }

        session()->setFlashdata("pesan", "$jumlaherror Data Tidak Bisa Disimpan <br> $jumlahsukses Data Berhasil Disimpan"
        );
        return redirect()->to(site_url("admin/inventaris_peralatan"));       
        }else{
            echo "Gagal Input";
        }
    }
}