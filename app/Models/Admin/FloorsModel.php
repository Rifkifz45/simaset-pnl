<?php

namespace App\Models\Admin;
use CodeIgniter\Model;

class FloorsModel extends Model
{
    protected $table          = "table-floors";
    protected $primaryKey     = 'floors_id';
    protected $allowedFields  = [
        'buildings_id','floors_name',
    ];
    protected $useTimestamps  = false;

    public function getFloors($id = false)
    {
        if($id === false){
            return $this->findAll();
        } else {
            return $this->getWhere(['floors_id' => $id]);
        }  
    }
 
    public function insertFloors($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateFloors($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['floors_id' => $id]);
    }

    public function deleteFloors($id)
    {
        return $this->db->table($this->table)->delete(['floors_id' => $id]);
    } 
}