<?php

namespace App\Controllers\Admin;
use App\Models\Admin\MTwebCategory;
use App\Models\Admin\MDTInventarisPeralatan;
use App\Controllers\BaseController;
use Config\Services;
use \Hermawan\DataTables\DataTable;

class Admin extends BaseController
{
    public function __construct($foo = null)
    {
        $this->MTwebCategory = new MTwebCategory();
    }

    public function index()
    {
        return view('admin/index');
    }

    public function DT_inventaris_peralatan(){
        $request = Services::request();
        if ($request->isAJAX()) {            
            $db = db_connect();
            $builder = $db->table('inventaris_peralatan')->select('id,kode_barang, nup, nama_barang, tercatat');
            
            return DataTable::of($builder)
            ->addNumbering('no')
            ->filter(function ($builder, $request) {
                if ($request->bidang)
                    $builder->where('idtweb_asset', $request->bidang);
            })
            ->add('action', function($row){
                return "<a onClick=\"
                window.opener.document.getElementById('id').value = '".$row->id."';
                window.opener.document.getElementById('kode_barang').value = '".$row->kode_barang."';
                window.opener.document.getElementById('nama_barang').value = '".$row->nama_barang."';
                window.opener.document.getElementById('nup').value = '".$row->nup."';
                window.close();\"> <button class=\"btn btn-xs btn-primary\"> <i class=\"ace-icon fa fa-check\"></i> Select </button> <br>
                                            </a>";
            })
            ->toJson(true);
        }
    }

    public function DI_inventaris_peralatan(){
        $request = Services::request();
        if ($request->isAJAX()) {            
            $db = db_connect();
            $builder = $db->table('inventaris_peralatan')
            ->select('id,kode_barang,nup,nama_barang,tgl_perolehan,id_perolehan,tercatat,uraian_kondisi,nilai_perolehan')
            ->join('tweb_kondisi', 'tweb_kondisi.id_kondisi = inventaris_peralatan.id_kondisi');

            return DataTable::of($builder)
            ->add('action', function($row){
                return "<button type=\"button\" title=\"Detail Data\" class=\"btn btn-white btn-sm\"> <i class=\"fa fa-eye\"></i> </button>";
            }, 'last')
            ->toJson();
        }
    }
}
