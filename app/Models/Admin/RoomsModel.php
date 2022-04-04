<?php

namespace App\Models\Admin;
use CodeIgniter\Model;

class RoomsModel extends Model
{
    protected $table          = "table-rooms";
    protected $primaryKey     = 'rooms_id';
    protected $allowedFields  = [
        'floors_id','rooms_name','rooms_area',
    ];
    protected $useTimestamps  = false;

    public function getRooms($id = false)
    {
        if($id === false){
            return $this->findAll();
        } else {
            return $this->getWhere(['rooms_id' => $id]);
        }  
    }
 
    public function insertRooms($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateRooms($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['rooms_id' => $id]);
    }

    public function deleteRooms($id)
    {
        return $this->db->table($this->table)->delete(['rooms_id' => $id]);
    } 
}