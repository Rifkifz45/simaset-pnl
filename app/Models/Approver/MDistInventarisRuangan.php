<?php

namespace App\Models\Approver;
use CodeIgniter\Model;

class MDistInventarisRuangan extends Model
{
    protected $table          = "dist_inventarisasi_ruangan";
    protected $primaryKey     = 'id';
    protected $allowedFields  = [
        'id_lokasi','id_pengguna','inventaris_peralatan_id','id_hak','foto','keterangan',
    ];
    protected $useTimestamps  = false;

    public function getDistInventarisRuangan($id = false)
    {
        if($id === false){
            return $this->findAll();
        } else {
            return $this->getWhere(['id' => $id]);
        }  
    }

    public function DetailDistInventarisRuangan()
    {
       $dt = $this->db->table($this->table)
        ->join('tweb_pengguna', 'tweb_pengguna.id_pengguna = dist_inventarisasi_ruangan.id_pengguna', 'left')
        ->join('tweb_lokasi', 'tweb_lokasi.id_lokasi = dist_inventarisasi_ruangan.id_lokasi', 'left')
        ->join('tweb_gedung', 'tweb_gedung.id_gedung = tweb_lokasi.id_gedung', 'left')
        ->join('inventaris_peralatan', 'inventaris_peralatan.id = dist_inventarisasi_ruangan.inventaris_peralatan_id', 'left')
        ->get()->getResultArray();
        return $dt;
    }
 
    public function insertDistInventarisRuangan($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateDistInventarisRuangan($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id' => $id]);
    }

    public function deleteDistInventarisRuangan($id)
    {
        return $this->db->table($this->table)->delete(['id' => $id]);
    } 
}