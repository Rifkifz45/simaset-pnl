<?php

namespace App\Models\Admin;
use CodeIgniter\Model;

class MTransaksiPBitem extends Model
{
    protected $table          = "transaksi_penempatan_item";
    protected $primaryKey     = 'idtransaksi_penempatan_item';
    protected $allowedFields  = [
        'inventaris_peralatan_id ', 'id_pengguna', 'status'
    ];
    protected $useTimestamps  = false;

    public function getTransaksiPBitem($id = false)
    {
        if($id === false){
            return $this->findAll();
        } else {
            return $this->getWhere(['idtransaksi_penempatan_item' => $id]);
        }  
    }

    public function detailTransaksiPBitem(){
        $dt = $this->db->table($this->table)
        ->join('inventaris_peralatan', 'inventaris_peralatan.id = transaksi_penempatan_item.inventaris_peralatan_id', 'left')
        ->join('tweb_pengguna', 'tweb_pengguna.id_pengguna = transaksi_penempatan_item.id_pengguna', 'left')
        ->join('tweb_hak', 'tweb_hak.id_hak = transaksi_penempatan_item.id_hak', 'left')
        ->get()->getResult();
        return $dt;
    }

    public function DBR(){
        $dt = $this->db->table($this->table)
        ->join('transaksi_penempatan', 'transaksi_penempatan.idtransaksi_penempatan = transaksi_penempatan_item.idtransaksi_penempatan', 'left')
        ->join('inventaris_peralatan', 'inventaris_peralatan.id = transaksi_penempatan_item.inventaris_peralatan_id', 'left')
        ->join('tweb_pengguna', 'tweb_pengguna.id_pengguna = transaksi_penempatan_item.id_pengguna', 'left')
        ->join('tweb_hak', 'tweb_hak.id_hak = transaksi_penempatan_item.id_hak', 'left')
        ->join('tweb_lokasi', 'tweb_lokasi.id_lokasi = transaksi_penempatan.id_lokasi')
        ->join('tweb_gedung', 'tweb_gedung.id_gedung = tweb_lokasi.id_gedung')
        ->where('status_penempatan', 'Accepted')
        ->where('status_penempatan_item', '1')
        ->where('jenis_transaksi', 'DBR')
        ->get()->getResult();
        return $dt;
    }

    public function DBL(){
        $dt = $this->db->table($this->table)
        ->join('transaksi_penempatan', 'transaksi_penempatan.idtransaksi_penempatan = transaksi_penempatan_item.idtransaksi_penempatan', 'left')
        ->join('inventaris_peralatan', 'inventaris_peralatan.id = transaksi_penempatan_item.inventaris_peralatan_id', 'left')
        ->join('tweb_pengguna', 'tweb_pengguna.id_pengguna = transaksi_penempatan_item.id_pengguna', 'left')
        ->join('tweb_hak', 'tweb_hak.id_hak = transaksi_penempatan_item.id_hak', 'left')
        ->join('tweb_lokasi', 'tweb_lokasi.id_lokasi = transaksi_penempatan.id_lokasi')
        ->join('tweb_gedung', 'tweb_gedung.id_gedung = tweb_lokasi.id_gedung')
        ->where('status_penempatan', 'Accepted')
        ->where('status_penempatan_item', '1')
        ->where('jenis_transaksi', 'DBL')
        ->get()->getResult();
        return $dt;
    }
 
    public function insertTransaksiPBitem($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateTransaksiPBitem($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['idtransaksi_penempatan_item' => $id]);
    }

    public function deleteTransaksiPBitem($id)
    {
        return $this->db->table($this->table)->delete(['idtransaksi_penempatan_item' => $id]);
    } 
}