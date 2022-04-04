<?php

namespace App\Models\Admin;
use CodeIgniter\Model;

class SgroupsModel extends Model
{
    protected $table          = "table-sgroups";
    protected $primaryKey     = 'sgroups_id';
    protected $allowedFields  = [
        'groups_id', 'sgroups_name',
    ];
    protected $useTimestamps  = false;

    public function getSgroups($id = false)
    {
        if($id === false){
            return $this->findAll();
        } else {
            return $this->getWhere(['sgroups_id' => $id]);
        }  
    }
 
    public function insertSgroups($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateSgroups($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['sgroups_id' => $id]);
    }

    public function deleteSGroups($id)
    {
        return $this->db->table($this->table)->delete(['sgroups_id' => $id]);
    } 
}