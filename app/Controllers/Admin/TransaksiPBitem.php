<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\Admin\MTransaksiPB;
use App\Models\Admin\MTransaksiPBitem;
use App\Models\Admin\MTwebPengguna;
use App\Models\Admin\MTwebHak;

class TransaksiPBitem Extends BaseController{
	public function __construct()
	{
		$this->MTransaksiPB     = new MTransaksiPB();
		$this->MTransaksiPBitem = new MTransaksiPBitem();
		$this->MTwebPengguna    = new MTwebPengguna();
		$this->MTwebHak         = new MTwebHak();
	}

	 public function detail($id){
        $item = $this->MTransaksiPBitem->detailTransaksiPBitem();
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
        ->join('inventaris_peralatan', 'inventaris_peralatan.id = transaksi_penempatan_item.inventaris_peralatan_id')
        ->join('tweb_pengguna', 'tweb_pengguna.id_pengguna = transaksi_penempatan_item.id_pengguna')
        ->get()->getResult();
        $penempatan = $this->MTransaksiPB->where('idtransaksi_penempatan', $id)->first();
            return view('admin/transaksipenempatanitem/cetak', [
                'penempatan'    =>  $penempatan,
                'detail'        =>  $detail,
            ]);
    }

	public function create()
	{
		$id = $this->request->getVar('id');
		$idtransaki_penempatan = $this->request->getVar('idtransaksi_penempatan');
		$item = $this->MTransaksiPBitem->where('inventaris_peralatan_id', $id)->findAll();
	
		if (count($item) >= 1) {
			session()->setFlashdata('pesan', 'Kode Barang Sudah Dipilih, Silahkan pilih yang lain.');
        	return $this->response->redirect(site_url('admin/penempatan/detail/'.$idtransaki_penempatan));
		}else{
			$simpan = $this->MTransaksiPBitem->insertTransaksiPBitem([
            'idtransaksi_penempatan'    => $idtransaki_penempatan,
            'inventaris_peralatan_id'   => $this->request->getVar('id'),
            'id_pengguna '            	=> $this->request->getVar('id_pengguna_modal'),
            'id_hak'            	    => $this->request->getVar('id_hak_modal'),
            'status_penempatan_item'	=> '0',
        ]);

        if ($simpan) {
        	session()->setFlashdata('pesan', 'Placement Data data has been successfully created.');
        	return $this->response->redirect(site_url('admin/penempatan/detail/'.$idtransaki_penempatan));
        }else{
        	echo "Gagal";
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
			echo "Gagal Delete";
		}
	}
}