<?php

namespace App\Models\Admin;
use CodeIgniter\Model;

class MutasiModel extends Model
{
    protected $table          = "table-mutations";
    protected $primaryKey     = 'mutations_id';
    protected $allowedFields  = [
        'mutations_name', 'mutations_descriptions', 'mutations_date', 'mutations_locations', 'mutations_document', 'document_size', 'mutations_status', 'user_post'
    ];
    protected $useTimestamps  = false;

    public function insertMutations($data){
        return $this->db->table($this->table)->insert($data);
    }
}