<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\Admin\MTransaksiPBtmp;
use App\Models\Admin\MTransaksiPBitem;
use App\Models\Admin\MInventarisPeralatan;

class TransaksiPBtmp Extends BaseController{
	public function __construct()
	{
		$this->MTransaksiPBtmp      = new MTransaksiPBtmp();
		$this->MInventarisPeralatan = new MInventarisPeralatan();
		$this->MTransaksiPBitem     = new MTransaksiPBitem();
	}

	public function index()
	{
		$kategori    = $this->MTransaksiPBtmp->getTransaksiPBtmp();
		return view('admin/twebkategori/index',[
			'kategori'		=> $kategori,
		]);
	}

	public function create()
	{
		// PRIMARY ID DARI BARANG
        $id              = $this->request->getVar('id');
        $kode_barang     = $this->request->getVar('kode_barang');
        $nup             = $this->request->getVar('nup');
        
        //ID TRANSAKSI
        $idtransaksi_tmp = $this->request->getVar('kode');
        
        // ID PENGGUNA
        $idpengguna      = $this->request->getVar('id_pengguna');

        $data = $this->MInventarisPeralatan
        	->where('kode_barang', $kode_barang)
        	->where('nup', $nup)
        	->first();

        // JIKA TIDAK DITEMUKAN
        if ($data == NULL) {
        	echo "<script>alert(\"Data tidak ditemukan. Silahkan input terlebih dahulu pada menu data inventaris\"); window.history.back(); </script>";
        }else{
	        // PERIKSA APAKAH BARANG SUDAH DITEMPATKAN
	        $check2 = $this->MTransaksiPBitem
	        		->where('idinventaris_peralatan', $data['idinventaris_peralatan'])
	        		->where('status_penempatan_item', "0")
	        		->findAll();

	        if (($data['tercatat'] == "DBR") OR ($data['tercatat'] == "DBL") OR ($data['tercatat'] == "KIB")){
	            $pesanError = "Kode Barang tidak dapat dipakai, karna <b> sudah Ditempatkan/ dipakai</b>!";
	            return redirect()->to(site_url('admin/penempatan/new'))->with('error', $pesanError); 
	        }else if (count($check2)>=1) {
	        	$pesanError = "Kode Barang sedang menunggu persetujuan. Proses Dibatalkan untuk menghindari ketidaknormalan sistem!";
	            return redirect()->to(site_url('admin/penempatan/new'))->with('error', $pesanError); 
	        }else{
	            $check = $this->MTransaksiPBtmp->where('inventaris_peralatan_id', $data['idinventaris_peralatan'])->findAll();

	            // CEK APAKAH KODE SUDAH DIINPUT PADA TMP
	            if (count($check) >= 1) {
	                return redirect()->to(site_url('admin/penempatan/new'))->With('pesantmp', 'Kode Barang sudah di-Input, ganti dengan yang lain !'); 
	            }else{
	            // MASUKKAN DATABASE TMP
	            $input = [
					'idtransaksi_penempatan'  => $idtransaksi_tmp,
					'inventaris_peralatan_id' => $data['idinventaris_peralatan'],
					'id_pengguna'             => $idpengguna,
	            ];
	            $simpan = $this->MTransaksiPBtmp->insertTransaksiPBtmp($input);
	            if ($simpan) {
	            session()->setFlashdata('pesanberhasil', 'Data Berhasil Ditambahkan');
	                return redirect()->to(site_url('admin/penempatan/new'))->withInput(); 
	            }else{
	                echo "Gagal";
	            }
	            }
	        }
	        }
	}

	public function update(){
		$id = $this->request->getVar('idtransaksi_penempatan_tmp');
		
		$update = $this->MTransaksiPBtmp->updateTransaksiPBtmp([
            'id_pengguna'          => $this->request->getVar('id_pengguna_modal'),
        ], $id);

		if ($update) {
			session()->setFlashdata('pesan', 'Temp Data User data has been successfully updated.');
			 return redirect()->to(site_url('admin/penempatan/new')); 
		}
	}

	public function delete($id){
		$delete = $this->MTransaksiPBtmp->deleteTransaksiPBtmp($id);

		if ($delete) {
			session()->setFlashdata('pesan', 'Temp data has been successfully deleted.');
			return redirect()->back();
		}else{
			echo "Gagal Delete";
		}
	}
}