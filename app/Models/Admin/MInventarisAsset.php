<?php

namespace App\Models\Admin;
use CodeIgniter\Model;
use App\Models\Admin\MTwebCategory;
use App\Models\Admin\MTwebKondisi;

class MInventarisAsset extends Model
{
    protected $table          = "inventaris_asset";
    protected $primaryKey     = 'idinventaris_asset';
    protected $allowedFields  = [
        'idtweb_asset ', 'id_kondisi ', 'id_perolehan', 'kode_satker', 'nama_satker', 'kode_barang', 'nama_barang', 'nup', 'merk', 'tgl_rekam_pertama', 'tgl_perolehan', 'nilai_perolehan_pertama', 'nilai_mutasi', 'nilai_perolehan', 'nilai_penyusutan', 'nilai_buku', 'kuantitas','jumlah_foto','status_penggunaan', 'status_pengelolaan', 'no_psp', 'tgl_psp', 'created_at', 'created_by', 'updated_at','updated_by','tercatat'
    ];
    protected $useTimestamps  = false;

    public function check($kode_barang, $nup){
        return  $this->db->table($this->table)
                    ->where('kode_barang', $kode_barang)
                    ->where('nup', $nup)
                    ->get()->getRowArray();
    }

    public function detailInventarisAsset(){
         $dt = $this->db->table($this->table)
        ->join('tweb_kondisi', 'tweb_kondisi.id_kondisi = inventaris_asset.id_kondisi', 'left')
        ->get()->getResult();
        return $dt;
    }

    public function check_id($golongan, $bidang){
        $MTwebCategory = new MTwebCategory();
        $data = $MTwebCategory
        ->where('golongan', $golongan)
        ->where('bidang', $bidang)
        ->where('kelompok', '*')
        ->where('sub_kelompok', '*')
        ->where('sub_sub_kelompok', '*')
        ->first();

        return $data;
    }

    public function check_kondisi($kondisi){
        $MTwebKondisi = new MTwebKondisi();
        
        $data = $MTwebKondisi
        ->where('uraian_kondisi', $kondisi)
        ->first();

        return $data;
    }

    public function getInventarisAsset($id = false)
    {
        if($id === false){
            return $this->findAll();
        } else {
            return $this->getWhere(['idinventaris_asset' => $id]);
        }  
    }
 
    public function insertInventarisAsset($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateInventarisAsset($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['idinventaris_asset' => $id]);
    }

    public function deleteInventarisAsset($id)
    {
        return $this->db->table($this->table)->delete(['idinventaris_asset' => $id]);
    } 
}