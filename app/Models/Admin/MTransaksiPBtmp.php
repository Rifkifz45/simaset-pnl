<?php

namespace App\Models\Admin;
use CodeIgniter\Model;

class MTransaksiPBtmp extends Model
{
    protected $table          = "transaksi_penempatan_tmp";
    protected $primaryKey     = 'idtransaksi_penempatan_tmp';
    protected $allowedFields  = [
        'idtransaksi_penempatan', 'inventaris_peralatan_id',
    ];
    protected $useTimestamps  = false;

    public function getTransaksiPBtmp($id = false)
    {
        if($id === false){
            return $this->findAll();
        } else {
            return $this->getWhere(['   idtransaksi_penempatan_tmp' => $id]);
        }  
    }

    public function detailTransaksiPBtmp(){
        $dt = $this->db->table($this->table)
        ->join('inventaris_peralatan', 'inventaris_peralatan.id = transaksi_penempatan_tmp.inventaris_peralatan_id', 'left')
        ->get()->getResult();
        return $dt;
    }
 
    public function insertTransaksiPBtmp($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateTransaksiPBtmp($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['idtransaksi_penempatan_tmp' => $id]);
    }

    public function deleteTransaksiPBtmp($id)
    {
        return $this->db->table($this->table)->delete(['idtransaksi_penempatan_tmp' => $id]);
    } 
}