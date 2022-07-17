<?php

namespace App\Models\Admin;
use CodeIgniter\Model;

class MTwebLokasi extends Model
{
    protected $table          = "tweb_lokasi";
    protected $primaryKey     = 'id_lokasi';
    protected $allowedFields  = [
        'id_gedung', 'id_kategori_lokasi', 'id_pengguna', 'nama_lokasi', 'luas_lokasi', 'foto_lokasi',
    ];
    protected $useTimestamps  = false;

    public function getLokasi($id = false)
    {
        if($id === false){
            return $this->findAll();
        } else {
            return $this->getWhere(['id_lokasi' => $id]);
        }  
    }

    public function getLokasiDetail($id = false){
        if($id === false){
            $dt = $this->db->table($this->table)
                ->join('tweb_gedung', 'tweb_gedung.id_gedung = tweb_lokasi.id_gedung', 'left')
                ->join('tweb_lokasi_kategori', 'tweb_lokasi_kategori.id_kategori_lokasi = tweb_lokasi.  id_kategori_lokasi', 'left')
                ->join('tweb_pengguna', 'tweb_pengguna.id_pengguna = tweb_lokasi.id_pengguna', 'left')
                ->get()->getResult();
                return $dt;
        } else {
            $dt = $this->db->table($this->table)
                ->join('tweb_gedung', 'tweb_gedung.id_gedung = tweb_lokasi.id_gedung', 'left')
                ->join('tweb_lokasi_kategori', 'tweb_lokasi_kategori.id_kategori_lokasi = tweb_lokasi.  id_kategori_lokasi', 'left')
                ->join('tweb_pengguna', 'tweb_pengguna.id_pengguna = tweb_lokasi.id_pengguna', 'left')
                ->getWhere(['id_lokasi' => $id])->getRowArray();
                return $dt;
        }
    }
 
    public function insertLokasi($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateLokasi($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id_lokasi' => $id]);
    }

    public function deleteLokasi($id)
    {
        return $this->db->table($this->table)->delete(['id_lokasi' => $id]);
    } 
}