<?php

namespace App\Models\Admin;
use CodeIgniter\Model;

class GedungModel extends Model
{
    protected $table          = "table-buildings";
    protected $primaryKey     = 'buildings_id';
    protected $allowedFields  = [
        'buildings_name',
    ];
    protected $useTimestamps  = false;

    public function getBuildings($id = false)
    {
        if($id === false){
            return $this->findAll();
        } else {
            return $this->getWhere(['buildings_id' => $id]);
        }  
    }
 
    public function insertBuildings($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateBuildings($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['buildings_id' => $id]);
    }

    public function deleteBuildings($id)
    {
        return $this->db->table($this->table)->delete(['buildings_id' => $id]);
    } 
}