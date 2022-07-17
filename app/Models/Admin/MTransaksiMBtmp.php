<?php

namespace App\Models\Admin;
use CodeIgniter\Model;

class MTransaksiMBtmp extends Model
{
    protected $table          = "transaksi_mutasi_tmp";
    protected $primaryKey     = 'idtransaksi_mutasi_tmp';
    protected $allowedFields  = [
        'idtransaksi_mutasi', 'inventaris_peralatan_id',
    ];
    protected $useTimestamps  = false;

    public function getMTransaksiMBtmp($id = false)
    {
        if($id === false){
            return $this->findAll();
        } else {
            return $this->getWhere(['idtransaksi_mutasi_tmp' => $id]);
        }  
    }

    public function detailMTransaksiMBtmp(){
        $dt = $this->db->table($this->table)
        ->join('inventaris_peralatan', 'inventaris_peralatan.id = transaksi_mutasi_tmp.idinventaris_peralatan', 'left')
        ->get()->getResult();
        return $dt;
    }
 
    public function insertMTransaksiMBtmp($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateMTransaksiMBtmp($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['idtransaksi_mutasi_tmp' => $id]);
    }

    public function deleteMTransaksiMBtmp($id)
    {
        return $this->db->table($this->table)->delete(['idtransaksi_mutasi_tmp' => $id]);
    } 
}