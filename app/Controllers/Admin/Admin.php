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
            ->select('id,kode_barang,nup,nama_barang,merk,tgl_perolehan,id_perolehan,tercatat,uraian_kondisi,nilai_perolehan')
            ->join('tweb_kondisi', 'tweb_kondisi.id_kondisi = inventaris_peralatan.id_kondisi')
            ->orderBy('kode_barang', 'asc')
            ->orderBy('nup', 'asc');

            return DataTable::of($builder)
            ->addNumbering('no')
            ->add('action', function($row){
                return '
                <a href="'.site_url('admin/inventaris_peralatan/detail/'.$row->id).'" data-toggle="tooltip" data-placement="top" rel="tooltip" type="button" title="Detail" class="btn btn-sm btn-white"><i class="ace-icon fa fa-eye"></i> </a>
                <a href="'.site_url('admin/inventaris_peralatan/edit/'.$row->id).'" data-toggle="tooltip" data-placement="top" rel="tooltip" type="button" title="Edit" class="btn btn-xs btn-info"><i class="ace-icon glyphicon glyphicon-edit"></i> </a>
                <a href="'.site_url('admin/inventaris_peralatan/delete/'.$row->id).'" data-toggle="tooltip" data-placement="top" rel="tooltip" type="button" title="Delete" class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash"></i> </a>
                ';
            })
            ->edit('nama_barang', function($row){
                return '<b>'.$row->merk.'</b> '.$row->nama_barang.'';
            })
            ->edit('tercatat', function($row){
                if ($row->tercatat == "DBR") {
                    return '<span class="label label-inverse">'.$row->tercatat.'</span>';
                }else if($row->tercatat == "DBL"){
                    return '<span class="label label-warning">'.$row->tercatat.'</span>';
                }else if ($row->tercatat == "KIB") {
                    return '<span class="label label-info">'.$row->tercatat.'</span>';
                }else{
                    return '<span class="label label-danger">Null</span>';
                }
            })
            ->edit('uraian_kondisi', function($row){
                if ($row->uraian_kondisi == "Baik") {
                    return '<span class="label label-success arrowed">'.$row->uraian_kondisi.'</span>';
                }else if($row->uraian_kondisi == "Rusak Ringan"){
                    return '<span class="label label-info arrowed-in-right arrowed">'.$row->uraian_kondisi.'</span>';
                }else if ($row->uraian_kondisi == "Rusak Berat") {
                    return '<span class="label label-danger arrowed-in"><i class="ace-icon fa fa-exclamation-triangle"></i>  '.$row->uraian_kondisi.'</span>';
                }else{
                    return '';
                }
            })
            ->edit('tgl_perolehan', function($row){
                $format = date("d-m-Y", strtotime($row->tgl_perolehan));;
                return ''.$format.'';
            })
            ->format('nilai_perolehan', function($value){
                return 'Rp. '.number_format($value, 2,'.',',');
            })
            ->toJson(true);
        }
    }
}
