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
        'reset_key',
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

    public function updateKey($email, $reset_key){
        $data = $this->db->table($this->table)
                ->where('email', $email)
                ->get()
                ->getRowArray();
       
        return $this->db->table($this->table)->update(['reset_key' => $reset_key], ['id' => $data['id']]);
    }

    public function update_password($password, $reset_key){
        $data = $this->db->table($this->table)
                ->where('reset_key', $reset_key)
                ->get()
                ->getRowArray();
       
        return $this->db->table($this->table)->update([
            'reset_key' => '',
            'password'  => md5($password)
            ], ['id' => $data['id']]);
    }

    public function search($keyword){
        return $this->table('user_login')->like('nama', $keyword);
    }

    public function insertUserLogin($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateUserLogin($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id' => $id]);
    }
}