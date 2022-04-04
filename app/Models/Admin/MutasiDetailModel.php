<?php

namespace App\Models\Admin;
use CodeIgniter\Model;

class MutasiDetailModel extends Model
{
    protected $table          = "table-mutations-detail";
    protected $primaryKey     = 'mutations-detail_id';
    protected $allowedFields  = [
        'mutations_id', 'assets_id', 'users_id', 'kode_barang', 'nup', 'nama_barang', 'location_old', 'location_new', 'kepemilikan'
    ];
    protected $useTimestamps  = false;
}