<?php

namespace App\Models\Admin;
use CodeIgniter\Model;

class SsgroupsModel extends Model
{
    protected $table          = "table-ssgroups";
    protected $primaryKey     = 'ssgroups_id';
    protected $allowedFields  = [
        'sgroups_id', 'ssgroups_name',
    ];
    protected $useTimestamps  = false;

    public function getSsgroups($id = false)
    {
        if($id === false){
            return $this->findAll();
        } else {
            return $this->getWhere(['sgroups_id' => $id]);
        }  
    }
 
    public function insertSsgroups($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateSsgroups($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['ssgroups_id' => $id]);
    }

    public function deleteSsgroups($id)
    {
        return $this->db->table($this->table)->delete(['ssgroups_id' => $id]);
    } 
}