<?php

namespace App\Models\Admin;
use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table          = "tabel-users";
    protected $primaryKey     = 'idusers';
    protected $allowedFields  = [
        'username',
        'password',
        'salt',
        'nama',
        'email',
        'telp',
        'avatar',
        'role',
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