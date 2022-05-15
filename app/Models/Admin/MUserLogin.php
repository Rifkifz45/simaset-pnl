<?php

namespace App\Models\Admin;
use CodeIgniter\Model;

class MUserLogin extends Model
{
    protected $table          = "user_login";
    protected $primaryKey     = 'id';
    protected $allowedFields  = [
        'id_level',
        'username',
        'password',
        'email',
        'nama_user',
        'phone',
        'level',
        'status_akun',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by'
    ];
    protected $useTimestamps  = false;

    public function getUsers($id = false)
    {
        if($id === false){
            return $this->findAll();
        } else {
            return $this->getWhere(['idusers' => $id]);
        }  
    }

    public function search($keyword){
        return $this->table('tabel-users')->like('nama', $keyword);
    }
}