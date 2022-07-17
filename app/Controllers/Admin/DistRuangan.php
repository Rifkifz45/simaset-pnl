<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\Admin\MTransaksiPB;
use App\Models\Admin\MTransaksiPBitem;
use App\Models\Admin\MInventarisPeralatan;
use App\Models\Admin\MTwebGedung;
use App\Models\Admin\MTwebLokasi;
use Mpdf\Mpdf;

class DistRuangan Extends BaseController{
	public function __construct()
	{
		$this->MTwebGedung      = new MTwebGedung();
		$this->MTwebLokasi      = new MTwebLokasi();
		$this->MTransaksiPB     = new MTransaksiPB();
		$this->MTransaksiPBitem = new MTransaksiPBitem();
		$this->MInventarisPeralatan = new MInventarisPeralatan();
	}

	public function index()
	{
		$dist_ruangan    = $this->MTransaksiPBitem->DBR();
		return view('admin/distinventarisruangan/index',[
			'dist_ruangan'		=> $dist_ruangan,
		]);
	}

	public function pdf($lokasi){
		$ruangan = $this->MTwebLokasi
                ->join('tweb_pengguna', 'tweb_pengguna.id_pengguna = tweb_lokasi.id_pengguna','left')
                ->join('tweb_gedung', 'tweb_gedung.id_gedung = tweb_lokasi.id_gedung','left')
                ->where('tweb_lokasi.id_lokasi',$lokasi)
                ->first();

        $item = $this->db->table('transaksi_penempatan_item')
            ->join('transaksi_penempatan', 'transaksi_penempatan.idtransaksi_penempatan = transaksi_penempatan_item.idtransaksi_penempatan', 'left')
            ->join('inventaris_peralatan', 'inventaris_peralatan.idinventaris_peralatan = transaksi_penempatan_item.idinventaris_peralatan', 'left')
            ->join('tweb_pengguna', 'tweb_pengguna.id_pengguna = transaksi_penempatan_item.id_pengguna', 'left')
            ->join('tweb_hak', 'tweb_hak.id_hak = transaksi_penempatan_item.id_hak', 'left')
            ->join('tweb_lokasi', 'tweb_lokasi.id_lokasi = transaksi_penempatan.id_lokasi')
            ->join('tweb_gedung', 'tweb_gedung.id_gedung = tweb_lokasi.id_gedung')
            ->where('status_penempatan_item', '1')
            ->where('jenis_transaksi', 'DBR')
            ->where('transaksi_penempatan.id_lokasi', $lokasi)
            ->get()->getResult();

        $mpdf = new \Mpdf\Mpdf();
        $this->response->setContentType('application/pdf');
        $data = view('print_dbr',[
            'ruangan'   =>  $ruangan,
            'item'      =>  $item
        ]);
        $mpdf->setFooter('{PAGENO}');
        $mpdf->WriteHTML($data);
        $mpdf->Output();
	}

	// REPORT DBR
	public function report_1(){
		$gedung    = $this->MTwebGedung->findAll();
		return view('admin/distinventarisruangan/report',[
			'gedung' => $gedung
		]);
	}

	public function riwayat($id){
		$data = $this->MTransaksiPBitem
			->join('transaksi_penempatan', 'transaksi_penempatan.idtransaksi_penempatan = transaksi_penempatan_item.idtransaksi_penempatan', 'left')
			->join('inventaris_peralatan', 'inventaris_peralatan.idinventaris_peralatan = transaksi_penempatan_item.idinventaris_peralatan', 'left')
			->join('tweb_lokasi', 'tweb_lokasi.id_lokasi = transaksi_penempatan.id_lokasi', 'left')
			->join('tweb_gedung', 'tweb_gedung.id_gedung = tweb_lokasi.id_gedung', 'left')
			->join('tweb_pengguna', 'tweb_pengguna.id_pengguna = transaksi_penempatan_item.id_pengguna', 'left')
			->where('transaksi_penempatan_item.idinventaris_peralatan', $id)
			->orderBy('tgl_penempatan', 'asc')
			->findAll();

		$check = $this->MTransaksiPBitem
		->join('inventaris_peralatan', 'inventaris_peralatan.idinventaris_peralatan = transaksi_penempatan_item.idinventaris_peralatan', 'left')
		->where('transaksi_penempatan_item.idinventaris_peralatan', $id)
		->first();
		return view('admin/distinventarisruangan/riwayat', [
			'data' => $data,
			'check' => $check
		]);
	}

	public function reset($id){
		$datainv = $this->MInventarisPeralatan->find($id);

		if ($datainv['fotoinventaris_peralatan'] == NULL) {
			$simpan = $this->MInventarisPeralatan->updateInventarisPeralatan([
				"fotoinventaris_peralatan" => 'default.jpg',
			], $id);

			session()->setFlashdata(
                "pesan",
                "Category data has been successfully deleted."
            );
            return redirect()->back();
		}

		if ($datainv['fotoinventaris_peralatan'] != "default.jpg") {
    		unlink("uploads/dbr/" . $datainv['fotoinventaris_peralatan']);

    		$simpan = $this->MInventarisPeralatan->updateInventarisPeralatan([
				"fotoinventaris_peralatan" => 'default.jpg',
			], $id);

			if ($simpan) {
				session()->setFlashdata("pesan","Gambar Berhasil Diupdate.");
    			return redirect()->back();
			}
    	}
	}

	public function updatefoto(){
		$id = $this->request->getVar('idinventaris_peralatan');
		$foto_sebelum = $this->request->getVar('foto_sebelum');
		$valid = $this->validate([
            "foto_dbr" => [
                "label" => "Foto DBR",
                "rules" =>
                    "max_size[foto_dbr,1024]|is_image[foto_dbr]|mime_in[foto_dbr,image/jpg,image/jpeg,image/gif,image/png,image/webp]",
                "errors" => [
                    "max_size" => "Ukuran {field} Max 2048 KB",
                    "ext_in" => "Format {field} Wajib .PDF",
                ],
            ],
        ]);

        $foto_dbr = $this->request->getFile("foto_dbr");

        if ($foto_dbr->getError() == 4) {
            $nama_file = $foto_sebelum;
        }else{
            $nama_file = $foto_dbr->getRandomName();
            $foto_dbr->move('uploads/dbr', $nama_file);
            if ($foto_sebelum != "default.jpg") {
            	unlink("uploads/dbr/" . $foto_sebelum);
            }
        }

        if (!$valid) {
            session()->setFlashdata(
                "pesan",
                \Config\Services::validation()->getErrors()
            );
            return redirect()
                ->back()
                ->with("pesan", "Foto Gagal diganti");
        } else {
            $update = $this->MInventarisPeralatan->updateInventarisPeralatan([
				"fotoinventaris_peralatan" => $nama_file,
			], $id);

            if ($update) {            	
                session()->setFlashdata(
                    "pesan",
                    "Foto Berhasil Dieedit"
                );
                return redirect()->to(site_url("admin/inventaris_ruangan"));
            }
        }
	}

	public function addfoto(){
		$id = $this->request->getVar('idinventaris_peralatan');
		$valid = $this->validate([
            "foto_dbr" => [
                "label" => "Foto DBR",
                "rules" =>
                    "max_size[foto_dbr,1024]|is_image[foto_dbr]|mime_in[foto_dbr,image/jpg,image/jpeg,image/gif,image/png,image/webp]",
                "errors" => [
                    "max_size" => "Ukuran {field} Max 2048 KB",
                    "ext_in" => "Format {field} Wajib .PDF",
                ],
            ],
        ]);

        $foto_dbr = $this->request->getFile("foto_dbr");

        if ($foto_dbr->getError() == 4) {
            $file_name = "default.jpg";
        } else {
            $file_name = $foto_dbr->getRandomName();
            $foto_dbr->move("uploads/dbr", $file_name);
        }

        if (!$valid) {
            return redirect()
                ->back()
                ->with("error", "Foto Gagal diganti. Periksa kembali format inputan!");
        } else {
            $simpan = $this->MInventarisPeralatan->updateInventarisPeralatan([
				"fotoinventaris_peralatan" => $file_name,
			], $id);

            if ($simpan) {            	
                session()->setFlashdata(
                    "pesan",
                    "Foto Berhasil Dieedit"
                );
                return redirect()->to(site_url("admin/inventaris_ruangan"));
            }
        }
	}
}