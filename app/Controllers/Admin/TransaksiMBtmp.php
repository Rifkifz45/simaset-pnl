<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\Admin\MTransaksiMBtmp;
use App\Models\Admin\MInventarisPeralatan;
use App\Models\Admin\MTransaksiPBitem;

class TransaksiMBtmp Extends BaseController{
	public function __construct()
	{
		$this->MTransaksiMBtmp      = new MTransaksiMBtmp();
		$this->MTransaksiPBitem      = new MTransaksiPBitem();
		$this->MInventarisPeralatan = new MInventarisPeralatan();
	}

	public function create()
	{
		// PRIMARY ID DARI BARANG
        $id              = $this->request->getVar('id');
        $kode_barang     = $this->request->getVar('kode_barang');
        $nup             = $this->request->getVar('nup');
        
        //ID TRANSAKSI
        $idtransaksi_mutasi = $this->request->getVar('kodemb');
        $idpengguna = $this->request->getVar('id_pengguna');

        $data = $this->MInventarisPeralatan
        	->where('kode_barang', $kode_barang)
        	->where('nup', $nup)
        	->first();

        if ($data != NULL) {
        	 $check = $this->MTransaksiPBitem
        	 	->join('transaksi_penempatan', 'transaksi_penempatan.idtransaksi_penempatan = transaksi_penempatan_item.idtransaksi_penempatan', 'right')
	        	->where('idinventaris_peralatan', $data['idinventaris_peralatan'])
	        	->where('status_penempatan_item', "1")
	        	->first();
	        if ($check != NULL) {
	        	// ID PENGGUNA
			    if ($idpengguna == NULL) {
			    	$idpengguna = $check['id_pengguna'];
			    }else{
			    	$idpengguna = $this->request->getVar('id_pengguna');
			    }
	        }
        }

        // JIKA TIDAK DITEMUKAN
        if ($data == NULL) {
        	echo "<script>alert(\"Data tidak ditemukan. Silahkan input terlebih dahulu pada menu data inventaris\"); window.history.back(); </script>";
        }
        else{
	        // PERIKSA APAKAH BARANG SUDAH DITEMPATKAN
	        if ($check == NULL){
	        	echo "<script>alert(\"Kode Barang belum ditempatkan, Anda <b> tidak dapat melakukan mutasi</b>!\"); window.history.back(); </script>";
	        }else{
	            $check2 = $this->MTransaksiMBtmp->where('idinventaris_peralatan', $data['idinventaris_peralatan'])->findAll();

	            // CEK APAKAH KODE SUDAH DIINPUT PADA TMP
	            if (count($check2) >= 1) {
	            	echo "<script>alert(\"Kode Barang Sudah Dipilih, Silahkan <b> pilih yang lain!!</b>!\"); window.history.back(); </script>";
	            }else{
	            // MASUKKAN DATABASE TMP
	            $input = [
					'idtransaksi_mutasi'     => $idtransaksi_mutasi,
					'id_lokasi'     	     => $check['id_lokasi'],
					'idinventaris_peralatan' => $data['idinventaris_peralatan'],
					'idtransaksi_penempatan' => $check['idtransaksi_penempatan'],
					'id_pengguna'            => $idpengguna,
	            ];
	            $simpan = $this->MTransaksiMBtmp->insertMTransaksiMBtmp($input);
	            if ($simpan) {
	            session()->setFlashdata('pesanberhasil', 'Data Berhasil Ditambahkan');
	                return redirect()->to(site_url('admin/mutasi/new'))->withInput(); 
	            }else{
	                echo "Gagal";
	            }
	            }
	        }
	        }
	}

	public function update(){
		$id = $this->request->getVar('idtransaksi_mutasi_tmp');
		
		$update = $this->MTransaksiMBtmp->updateMTransaksiMBtmp([
            'id_pengguna'          => $this->request->getVar('id_pengguna_modal'),
        ], $id);

		if ($update) {
			session()->setFlashdata('pesan', 'Data Barang Mutasi has been successfully updated.');
			 return redirect()->to(site_url('admin/mutasi/new')); 
		}
	}

	public function delete($id){
		$delete = $this->MTransaksiMBtmp->deleteMTransaksiMBtmp($id);

		if ($delete) {
			session()->setFlashdata('pesan', 'Temp data has been successfully deleted.');
			return redirect()->back();
		}else{
			echo "Gagal Delete";
		}
	}
}