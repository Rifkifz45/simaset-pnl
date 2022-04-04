<?php

namespace App\Models\Admin;
use CodeIgniter\Model;

class FieldsModel extends Model
{
    protected $table          = "table-fields";
    protected $primaryKey     = 'fields_id';
    protected $allowedFields  = [
        'category_id','fields_name',
    ];
    protected $useTimestamps  = false;

    public function insertFields($data){
        return $this->db->table($this->table)->insert($data);
    }

    public function updateFields($data, $id){
        return $this->db->table($this->table)->update($data, ['fields_id' => $id]);
    }
}