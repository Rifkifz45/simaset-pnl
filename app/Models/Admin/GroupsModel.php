<?php

namespace App\Models\Admin;
use CodeIgniter\Model;

class GroupsModel extends Model
{
    protected $table          = "table-groups";
    protected $primaryKey     = 'groups_id';
    protected $allowedFields  = [
        'fields_id', 'groups_name',
    ];
    protected $useTimestamps  = false;

    public function getGroups($id = false)
    {
        if($id === false){
            return $this->findAll();
        } else {
            return $this->getWhere(['groups_id' => $id]);
        }  
    }
 
    public function insertGroups($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateGroups($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['groups_id' => $id]);
    }

    public function deleteGroups($id)
    {
        return $this->db->table($this->table)->delete(['groups_id' => $id]);
    } 
}