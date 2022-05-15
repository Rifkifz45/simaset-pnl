<?php

namespace App\Models\Admin;
use CodeIgniter\Model;

class MTransaksiPB extends Model
{
    protected $table          = "transaksi_penempatan";
    protected $primaryKey     = 'idtransaksi_penempatan';
    protected $allowedFields  = [
        'id_lokasi', 'id_hak', 'tgl_penempatan', 'keterangan', 'dokumen ', 'ukuran_dokumen', 'status_penempatan', 'jenis_transaksi', 'created_at', 'created_by', 'updated_at', 'updated_by'
    ];
    protected $useTimestamps  = false;

    public function getPenempatan($id = false)
    {
        if($id === false){
            return $this->findAll();
        } else {
            return $this->getWhere(['idtransaksi_penempatan' => $id]);
        }  
    }

    public function detailPenempatan(){
        $dt = $this->db->table($this->table)
        ->join('tweb_lokasi', 'tweb_lokasi.id_lokasi = transaksi_penempatan.id_lokasi', 'left')
        ->join('tweb_gedung', 'tweb_gedung.id_gedung = tweb_lokasi.id_gedung', 'left')
        ->get()->getResultArray();
        return $dt;
    }
 
    public function insertPenempatan($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updatePenempatan($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['idtransaksi_penempatan' => $id]);
    }

    public function deletePenempatan($id)
    {
        return $this->db->table($this->table)->delete(['idtransaksi_penempatan' => $id]);
    } 
}