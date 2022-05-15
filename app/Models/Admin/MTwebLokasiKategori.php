<?php

namespace App\Models\Admin;
use CodeIgniter\Model;

class MTwebLokasiKategori extends Model
{
    protected $table          = "tweb_lokasi_kategori";
    protected $primaryKey     = 'id_kategori_lokasi ';
    protected $allowedFields  = [
        'nama_kategori_lokasi'
    ];
    protected $useTimestamps  = false;

    public function getLokasiKategori($id = false)
    {
        if($id === false){
            return $this->findAll();
        } else {
            return $this->getWhere(['id_kategori_lokasi ' => $id]);
        }  
    }
 
    public function insertLokasiKategori($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateLokasiKategori($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id_kategori_lokasi ' => $id]);
    }

    public function deleteLokasiKategori($id)
    {
        return $this->db->table($this->table)->delete(['id_kategori_lokasi ' => $id]);
    } 
}