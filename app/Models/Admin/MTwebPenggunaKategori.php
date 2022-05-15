<?php

namespace App\Models\Admin;
use CodeIgniter\Model;

class MTwebPenggunaKategori extends Model
{
    protected $table          = "tweb_pengguna_kategori";
    protected $primaryKey     = 'id_kategori_pengguna ';
    protected $allowedFields  = [
        'nama_kategori_pengguna'
    ];
    protected $useTimestamps  = false;

    public function getPenggunaKategori($id = false)
    {
        if($id === false){
            return $this->findAll();
        } else {
            return $this->getWhere(['id_kategori_pengguna' => $id]);
        }  
    }
 
    public function insertPenggunaKategori($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updatePenggunaKategori($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id_kategori_pengguna' => $id]);
    }

    public function deletePenggunaKategori($id)
    {
        return $this->db->table($this->table)->delete(['id_kategori_pengguna' => $id]);
    } 
}