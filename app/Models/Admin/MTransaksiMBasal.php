<?php

namespace App\Models\Admin;
use CodeIgniter\Model;

class MTransaksiMBasal extends Model
{
    protected $table          = "transaksi_mutasi_asal";
    protected $primaryKey     = 'idtransaksi_mutasi_asal ';
    protected $allowedFields  = [
        'idtransaksi_mutasi', 'idtransaksi_penempatan', 'idinventaris_peralatan',
    ];
    protected $useTimestamps  = false;

    public function getTransaksiMBasal($id = false)
    {
        if($id === false){
            return $this->findAll();
        } else {
            return $this->getWhere(['idtransaksi_mutasi_asal' => $id]);
        }  
    }

    public function detailTransaksiMBasal(){
        $dt = $this->db->table($this->table)
        ->join('inventaris_peralatan', 'inventaris_peralatan.idinventaris_peralatan = transaksi_mutasi_asal.idinventaris_peralatan', 'left')
        ->get()->getResult();
        return $dt;
    }
 
    public function insertTransaksiMBasal($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateTransaksiMBasal($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['idtransaksi_mutasi_asal' => $id]);
    }

    public function deleteTransaksiMBasal($id)
    {
        return $this->db->table($this->table)->delete(['idtransaksi_mutasi_asal' => $id]);
    } 
}