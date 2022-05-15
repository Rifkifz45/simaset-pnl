<?php

namespace App\Models\Admin;
use CodeIgniter\Model;

class MTwebHak extends Model
{
    protected $table          = "tweb_hak";
    protected $primaryKey     = 'id_hak';
    protected $allowedFields  = [
        'uraian_hak',
    ];
    protected $useTimestamps  = false;

    public function getHak($id = false)
    {
        if($id === false){
            return $this->findAll();
        } else {
            return $this->getWhere(['id_hak' => $id]);
        }  
    }
 
    public function insertHak($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateHak($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id_hak' => $id]);
    }

    public function deleteHak($id)
    {
        return $this->db->table($this->table)->delete(['id_hak' => $id]);
    } 
}