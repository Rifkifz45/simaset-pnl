<?php

namespace App\Models\Admin;
use CodeIgniter\Model;

class MTwebSatuan extends Model
{
    protected $table          = "tweb_satuan";
    protected $primaryKey     = 'id_satuan';
    protected $allowedFields  = [
        'uraian_satuan',
    ];
    protected $useTimestamps  = false;

    public function getSatuan($id = false)
    {
        if($id === false){
            return $this->findAll();
        } else {
            return $this->getWhere(['id_satuan' => $id]);
        }  
    }
 
    public function insertSatuan($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateSatuan($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id_satuan' => $id]);
    }

    public function deleteSatuan($id)
    {
        return $this->db->table($this->table)->delete(['id_satuan' => $id]);
    } 
}