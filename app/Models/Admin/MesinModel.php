<?php

namespace App\Models\Admin;
use CodeIgniter\Model;
use CodeIgniter\HTTP\RequestInterface;

class MesinModel extends Model
{
	protected $table          = "tabel-master-plm";
    protected $primaryKey     = 'idmasterplm';
    protected $useTimestamps  = false;

	public function check($kode_barang, $nup){
		return $this->db->table('tabel-master-plm')
				->where('kode_barang', $kode_barang)
				->where('nup', $nup)
				->get()->getRowArray();
	}

	public function check_id($id){
		return $this->db->table('table-fields')->getWhere(['fields_id' => $id])->getRow();
	}
}