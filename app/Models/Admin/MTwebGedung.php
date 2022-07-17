<?php

namespace App\Models\Admin;
use CodeIgniter\Model;

class MTwebGedung extends Model
{
    protected $table          = "tweb_gedung";
    protected $primaryKey     = 'id_gedung';
    protected $allowedFields  = [
        'id_pengguna ', 'nama_gedung', 'latitude', 'longitude', 'keterangan', 'foto_gedung'
    ];
    protected $useTimestamps  = false;

    public function getGedung($id = false)
    {
        if($id === false){
            return $this->findAll();
        } else {
            return $this->where('id_gedung', $id)->first();
        }  
    }

    public function detailGedung($id = false)
    {
        $dt = $this->db->table($this->table)
        ->join('tweb_pengguna', 'tweb_pengguna.id_pengguna = tweb_gedung.id_pengguna', 'left')
        ->get()->getResultArray();
        return $dt;
    }

 
    public function insertGedung($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateGedung($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id_gedung' => $id]);
    }

    public function deleteGedung($id)
    {
        return $this->db->table($this->table)->delete(['id_gedung' => $id]);
    } 
}