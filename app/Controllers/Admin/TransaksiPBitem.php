<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\Admin\MTransaksiPB;
use App\Models\Admin\MTransaksiPBitem;
use App\Models\Admin\MTwebPengguna;
use App\Models\Admin\MTwebHak;
use App\Models\Admin\MInventarisPeralatan;

class TransaksiPBitem Extends BaseController{
	public function __construct()
	{
		$this->MTransaksiPB         = new MTransaksiPB();
		$this->MInventarisPeralatan = new MInventarisPeralatan();
		$this->MTransaksiPBitem     = new MTransaksiPBitem();
		$this->MTwebPengguna        = new MTwebPengguna();
		$this->MTwebHak             = new MTwebHak();
	}

	 public function detail($id){
        $item = $this->MTransaksiPBitem->detailTransaksiPBitem($id);
        $penempatan = $this->MTransaksiPB
        				->join('tweb_lokasi', 'tweb_lokasi.id_lokasi = transaksi_penempatan.id_lokasi')
        				->join('tweb_gedung', 'tweb_gedung.id_gedung = tweb_lokasi.id_gedung')
        				->where('idtransaksi_penempatan', $id)->first();
        $pengguna = $this->MTwebPengguna->findAll();
        $hak = $this->MTwebHak->findAll();
            return view('admin/transaksipenempatanitem/index', [
                'item'        	=>  $item,
                'penempatan'    =>  $penempatan,
                'pengguna'		=>	$pengguna,
                'hak'			=>	$hak,
            ]);
    }

    public function cetak($id){
        $detail = $this->db->table('transaksi_penempatan_item')
        ->join('inventaris_peralatan', 'inventaris_peralatan.idinventaris_peralatan = transaksi_penempatan_item.idinventaris_peralatan', 'left')
        ->join('tweb_pengguna', 'tweb_pengguna.id_pengguna = transaksi_penempatan_item.id_pengguna', 'left')
        ->join('tweb_hak', 'tweb_hak.id_hak = transaksi_penempatan_item.id_hak', 'left')
        ->where('idtransaksi_penempatan', $id)
        ->get()->getResult();
        
        $penempatan = $this->MTransaksiPB
        ->join('tweb_lokasi', 'tweb_lokasi.id_lokasi = transaksi_penempatan.id_lokasi', 'left')
        ->join('tweb_gedung', 'tweb_gedung.id_gedung = tweb_lokasi.id_gedung', 'left')
        ->where('transaksi_penempatan.idtransaksi_penempatan', $id)
        ->first();

            return view('admin/transaksipenempatanitem/cetak', [
                'penempatan'    =>  $penempatan,
                'detail'        =>  $detail,
            ]);
    }

    public function cetakv2($id){
        $detail = $this->db->table('transaksi_penempatan_item')
        ->join('inventaris_peralatan', 'inventaris_peralatan.idinventaris_peralatan = transaksi_penempatan_item.idinventaris_peralatan', 'left')
        ->join('tweb_pengguna', 'tweb_pengguna.id_pengguna = transaksi_penempatan_item.id_pengguna', 'left')
        ->join('tweb_hak', 'tweb_hak.id_hak = transaksi_penempatan_item.id_hak', 'left')
        ->where('idtransaksi_penempatan', $id)
        ->get()->getResult();
        
        $penempatan = $this->MTransaksiPB
        ->join('transaksi_mutasi', 'transaksi_mutasi.idtransaksi_penempatan = transaksi_penempatan.idtransaksi_penempatan')
        ->join('tweb_lokasi', 'tweb_lokasi.id_lokasi = transaksi_penempatan.id_lokasi', 'left')
        ->join('tweb_gedung', 'tweb_gedung.id_gedung = tweb_lokasi.id_gedung', 'left')
        ->where('transaksi_penempatan.idtransaksi_penempatan', $id)
        ->first();

            return view('admin/transaksimutasi/cetak', [
                'penempatan'    =>  $penempatan,
                'detail'        =>  $detail,
            ]);
    }

    

	public function create()
	{
		$id                    = $this->request->getVar('id');
		$kode_barang           = $this->request->getVar('kode_barang');
		$nup                   = $this->request->getVar('nup');
		$idtransaki_penempatan = $this->request->getVar('idtransaksi_penempatan');

		$item                  = $this->MTransaksiPBitem->where('idinventaris_peralatan', $id)->findAll();
		// dd($item);
	
		if (count($item) >= 1) {
			session()->setFlashdata('pesan', 'Kode Barang Sudah Dipilih, Silahkan pilih yang lain.');
        	return $this->response->redirect(site_url('admin/penempatan/detail/'.$idtransaki_penempatan));
		}else{
			$data = $this->MInventarisPeralatan
        	->where('kode_barang', $kode_barang)
        	->where('nup', $nup)
        	->first();

        	// JIKA TIDAK DITEMUKAN
        	if ($data == NULL) {
        	echo "<script>alert(\"Data tidak ditemukan. Silahkan input terlebih dahulu pada menu data inventaris\"); window.history.back(); </script>";
        	}else{
        		if (($data['tercatat'] == "DBR") OR ($data['tercatat'] == "DBL") OR ($data['tercatat'] == "KIB")){
	            $pesanError = "Kode Barang tidak dapat dipakai, karna <b> sudah Ditempatkan/ dipakai</b>!";
	            return redirect()->to(site_url('admin/penempatan/detail/'.$idtransaki_penempatan)); 
	        	}else{
	        		$check = $this->MTransaksiPBitem
	        		->where('idinventaris_peralatan', $data['idinventaris_peralatan'])
	        		->where('status_penempatan_item', "1")
	        		->findAll();

	        		if (count($check) >= 1) {
	        			return redirect()->to(site_url('admin/penempatan/new'))->With('pesantmp', 'Kode Barang Sudah ditempatkan, Cek pada Menu DBR / DBL untuk melihat detail !');
	        		}else{
        			$simpan = $this->MTransaksiPBitem->insertTransaksiPBitem([
				        'idtransaksi_penempatan'    => $idtransaki_penempatan,
				        'idinventaris_peralatan'   => $this->request->getVar('id'),
				        'id_pengguna '            	=> $this->request->getVar('id_pengguna_modal'),
				        'id_hak'            	    => $this->request->getVar('id_hak_modal'),
				        'status_penempatan_item'	=> '0',
				    ]);
				      if ($simpan) {
			        	session()->setFlashdata('pesan', 'Barang Baru berhasil ditambahkan.');
			        	return $this->response->redirect(site_url('admin/penempatan/detail/'.$idtransaki_penempatan));
			        }else{
			        	echo "Gagal";
			        }
	        		}
	        	}
        	}
		}
	}

	public function update(){
		$id = $this->request->getVar('idtransaksi_penempatan_item');
		
		$update = $this->MTransaksiPBitem->updateTransaksiPBitem([
            'id_pengguna'   => $this->request->getVar('id_pengguna'),
            'id_hak'        => $this->request->getVar('id_hak'),
        ], $id);

		if ($update) {
			session()->setFlashdata('pesan', 'Item User data has been successfully updated.');
			return redirect()->back();
		}
	}

	public function delete($id){
		$delete = $this->MTransaksiPBitem->deleteTransaksiPBitem($id);

		if ($delete) {
			session()->setFlashdata('pesan', 'Item Data has been successfully deleted.');
			return redirect()->back();
		}else{
			echo "<script>alert(\"Anda Tidak Dapat Menghapus jika terdapat Detail Item\")</script>";
		}
	}
}