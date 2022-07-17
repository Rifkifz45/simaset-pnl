<?php

namespace App\Models\Admin;
use CodeIgniter\Model;

class MTransaksiMB extends Model
{
    protected $table          = "transaksi_mutasi";
    protected $primaryKey     = 'idtransaksi_mutasi';
    protected $allowedFields  = [
        'groups_id', 'sgroups_name',
    ];
    protected $useTimestamps  = false;

    public function getTransaksiMB($id = false)
    {
        if($id === false){
            return $this->findAll();
        } else {
            return $this->getWhere(['idtransaksi_mutasi' => $id]);
        }  
    }

    public function detailTransaksiMB(){
        $dt = $this->db->table($this->table)
        ->join('transaksi_penempatan', 'transaksi_penempatan.idtransaksi_penempatan = transaksi_mutasi.idtransaksi_penempatan', 'left')
        ->join('tweb_lokasi', 'tweb_lokasi.id_lokasi = transaksi_penempatan.id_lokasi', 'left')
        ->join('tweb_gedung', 'tweb_gedung.id_gedung = tweb_lokasi.id_gedung', 'left')
        ->get()->getResultArray();
        return $dt;
    }
 
    public function insertTransaksiMB($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateTransaksiMB($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['idtransaksi_mutasi' => $id]);
    }

    public function deleteTransaksiMB($id)
    {
        return $this->db->table($this->table)->delete(['idtransaksi_mutasi' => $id]);
    } 
}