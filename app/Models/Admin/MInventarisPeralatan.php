<?php

namespace App\Models\Admin;
use CodeIgniter\Model;
use App\Models\Admin\MTwebCategory;
use App\Models\Admin\MTwebKondisi;

class MInventarisPeralatan extends Model
{
    protected $table          = "inventaris_peralatan";
    protected $primaryKey     = 'idinventaris_peralatan';
    protected $allowedFields  = [
        'idtweb_asset ', 'id_kondisi ', 'id_perolehan', 'kode_satker', 'nama_satker', 'kode_barang', 'nama_barang', 'nup', 'merk', 'tgl_rekam_pertama', 'tgl_perolehan', 'nilai_perolehan_pertama', 'nilai_mutasi', 'nilai_perolehan', 'nilai_penyusutan', 'nilai_buku', 'kuantitas', 'jumlah_foto', 'status_penggunaan', 'status_pengelolaan', 'no_psp', 'tgl_psp', 'jumlah_kib', 'no_bpkb', 'no_polisi', 'pemakai', 'created_at', 'created_by', 'updated_at','updated_by','tercatat'
    ];
    protected $useTimestamps  = false;

    public function check($kode_barang, $nup){
        $dt = $this->db
            ->table($this->table)
            ->where('kode_barang', $kode_barang)
            ->where('nup', $nup)
            ->get()
            ->getRowArray();
        return $dt;
    }

    public function detailInventarisPeralatan(){
         $dt = $this
            ->join('tweb_kondisi', 'tweb_kondisi.id_kondisi = inventaris_peralatan.id_kondisi', 'left')
            ->findAll();
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

    public function getInventarisPeralatan($id = false)
    {
        if($id === false){
            return $this->findAll();
        } else {
            return $this->getWhere(['idinventaris_peralatan' => $id]);
        }  
    }
 
    public function insertInventarisPeralatan($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function insertBatchInventarisPeralatan($data)
    {
        return $this->db->table($this->table)->insertBatch($data);
    }

    public function updateInventarisPeralatan($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['idinventaris_peralatan' => $id]);
    }

    public function deleteInventarisPeralatan($id)
    {
        return $this->db->table($this->table)->delete(['idinventaris_peralatan' => $id]);
    } 
}