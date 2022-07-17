<?php

namespace App\Models\Admin;
use CodeIgniter\Model;

class MTwebPengguna extends Model
{
    protected $table          = "tweb_pengguna";
    protected $primaryKey     = 'id_pengguna';
    protected $allowedFields  = [
        'id_kategori_pengguna','nama_pegawai','nip','pangkat','golongan','jabatan','foto_pengguna'
    ];
    protected $useTimestamps  = false;

    public function getPengguna($id = false)
    {
        if($id === false){
            return $this->findAll();
        } else {
            return $this->getWhere(['id_pengguna' => $id]);
        }  
    }

    public function getDetail(){
        $dt = $this->db->table($this->table)
        ->join('tweb_pengguna_kategori', 'tweb_pengguna_kategori.id_kategori_pengguna = tweb_pengguna.id_kategori_pengguna', 'left')
        ->get()->getResult();
        return $dt;
    }
 
    public function insertPengguna($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updatePengguna($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id_pengguna' => $id]);
    }

    public function deletePengguna($id)
    {
        return $this->db->table($this->table)->delete(['id_pengguna' => $id]);
    } 
}