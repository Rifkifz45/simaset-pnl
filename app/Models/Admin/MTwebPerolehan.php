<?php

namespace App\Models\Admin;
use CodeIgniter\Model;

class MTwebPerolehan extends Model
{
    protected $table          = "tweb_perolehan";
    protected $primaryKey     = 'id_perolehan';
    protected $allowedFields  = [
        'uraian_perolehan',
    ];
    protected $useTimestamps  = false;

    public function getPerolehan($id = false)
    {
        if($id === false){
            return $this->findAll();
        } else {
            return $this->getWhere(['id_perolehan' => $id]);
        }  
    }
 
    public function insertPerolehan($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updatePerolehan($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id_perolehan' => $id]);
    }

    public function deletePerolehan($id)
    {
        return $this->db->table($this->table)->delete(['id_perolehan' => $id]);
    } 
}