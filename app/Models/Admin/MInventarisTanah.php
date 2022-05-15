<?php

namespace App\Models\Admin;
use CodeIgniter\Model;
use App\Models\Admin\MTwebCategory;
use App\Models\Admin\MTwebKondisi;

class MInventarisTanah extends Model
{
    protected $table          = "inventaris_tanah";
    protected $primaryKey     = 'id';
    protected $allowedFields  = [
        'idtweb_asset ', 'id_kondisi ', 'id_perolehan', 'kode_satker', 'nama_satker', 'kode_barang', 'nama_barang', 'nup', 'jenis_dokumen', 'kepemilikan', 'jenis_sertifikat', 'merk', 'tgl_rekam_pertama', 'tgl_perolehan', 'nilai_perolehan_pertama', 'nilai_mutasi', 'nilai_perolehan', 'nilai_penyusutan', 'nilai_buku', 'kuantitas', 'luas_tanah_seluruhnya', 'luas_tanah_untuk_bangunan','luas_tanah_untuk_sarana_lingkungan','luas_lahan_kosong','jumlah_foto', 'status_penggunaan', 'status_pengelolaan', 'no_psp', 'tgl_psp', 'alamat', 'rt_rw', 'desa', 'kecamatan', 'kabkot', 'kode_kabkot', 'provinsi', 'kode_provinsi', 'kode_pos', 'alamat_lainnya', 'jumlah_kib', 'sbsk', 'optimalisasi', 'created_at', 'created_by', 'updated_at','updated_by','tercatat'
    ];
    protected $useTimestamps  = false;

    public function check($kode_barang, $nup){
        return  $this->db->table($this->table)
                    ->where('kode_barang', $kode_barang)
                    ->where('nup', $nup)
                    ->get()->getRowArray();
    }

    public function detailInventarisTanah(){
         $dt = $this->db->table($this->table)
        ->join('tweb_kondisi', 'tweb_kondisi.id_kondisi = inventaris_tanah.id_kondisi', 'left')
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

    public function getInventarisTanah($id = false)
    {
        if($id === false){
            return $this->findAll();
        } else {
            return $this->getWhere(['id' => $id]);
        }  
    }
 
    public function insertInventarisTanah($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateInventarisTanah($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id' => $id]);
    }

    public function deleteInventarisTanah($id)
    {
        return $this->db->table($this->table)->delete(['id' => $id]);
    } 
}