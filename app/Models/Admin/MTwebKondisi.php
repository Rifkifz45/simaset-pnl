<?php

namespace App\Models\Admin;
use CodeIgniter\Model;

class MTwebKondisi extends Model
{
    protected $table          = "tweb_kondisi";
    protected $primaryKey     = 'id_kondisi';
    protected $allowedFields  = [
        'uraian_kondisi'
    ];
    protected $useTimestamps  = false;

    public function getKondisi($id = false)
    {
        if($id === false){
            return $this->findAll();
        } else {
            return $this->getWhere(['id_kondisi' => $id]);
        }  
    }
 
    public function insertKondisi($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateKondisi($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id_kondisi' => $id]);
    }

    public function deleteKondisi($id)
    {
        return $this->db->table($this->table)->delete(['id_kondisi' => $id]);
    } 
}