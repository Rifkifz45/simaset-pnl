<?php

namespace App\Models\Admin;
use CodeIgniter\Model;

class MTwebCategory extends Model
{
    protected $table          = "tweb_asset";
    protected $primaryKey     = 'idtweb_asset';
    protected $useAutoIncrement = true;
    protected $allowedFields  = [
        'golongan',
        'bidang',
        'kelompok',
        'sub_kelompok',
        'sub_sub_kelompok',
    ];
    protected $useTimestamps  = false;

    public function getKategori($id = false)
    {
        if($id === false){
            return $this->findAll();
        } else {
            return $this->getWhere(['idtweb_asset' => $id]);
        }  
    }

    public function getBidang(){
        return $this
        ->where('bidang !=', '*')
        ->where('kelompok', '*')
        ->where('sub_kelompok', '*')
        ->where('sub_sub_kelompok', '*')
        ->findAll() ; 
    }


    public function filterKategori()
    {
    return $this
        ->where('bidang', '*')
        ->where('kelompok', '*')
        ->where('sub_kelompok', '*')
        ->where('sub_sub_kelompok', '*')
        ->findAll() ; 
    }
 
    public function insertKategori($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateKategori($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['idtweb_asset' => $id]);
    }

    public function deleteKategori($id)
    {
        return $this->db->table($this->table)->delete(['idtweb_asset' => $id]);
    } 
}