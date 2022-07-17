<?php

namespace App\Controllers\Admin;
use App\Models\Admin\MTwebCategory;
use App\Models\Admin\MTwebGedung;
use App\Models\Admin\MInventarisPeralatan;
use App\Models\Admin\MTransaksiPBitem;
use App\Controllers\BaseController;
use Config\Services;
use \Hermawan\DataTables\DataTable;
use Ifsnop\Mysqldump\Mysqldump;

class Admin extends BaseController
{
    public function __construct($foo = null)
    {
        $this->MTwebGedung          = new MTwebGedung();
        $this->MTransaksiPBitem          = new MTransaksiPBitem();
        $this->MTwebCategory        = new MTwebCategory();
        $this->MInventarisPeralatan = new MInventarisPeralatan();
    }

    public function set_token(){
        return view('admin/token/index');
    }

    public function create_token(){
        $data = [
            'kategori' => $this->request->getVar('kategori'),
            'token'    => md5($this->request->getVar('token')),
        ];

        $simpan = $this->db->table('set_token')->insert($data);

        if ($simpan) {
            session()->setFlashdata('pesan', 'Data token berhasil <b>ditambahkan!!</b>');
            return $this->response->redirect(site_url('admin/token'));
        }else{
            echo "Gagal";
        }
    }

    public function update_token(){
        $id = $this->request->getVar('id');
        $data = [
            'token'    => md5($this->request->getVar('token')),
        ];

        $update = $this->db->table('set_token')->where('id', $id)->update($data);

        if ($update) {
            session()->setFlashdata('pesan', 'Data token berhasil <b>diubah!!</b>');
            return $this->response->redirect(site_url('admin/token'));
        }else{
            echo "Gagal";
        }
    }

    public function reset_token($id){
        $data = [
            'token'    => md5(123),
        ];

        $update = $this->db->table('set_token')->where('id', $id)->update($data);

        if ($update) {
            session()->setFlashdata('pesan', 'Data token berhasil <b>direset!!</b>');
            return $this->response->redirect(site_url('admin/token'));
        }else{
            echo "Gagal";
        }
    }

    public function database()
    {
        return view('admin/database/index');
    }

    public function dobackup()
    {
        try {
            $tgl_sekarang = date('dym');
            $dumper = new Mysqldump('mysql:host=localhost;dbname=simasetnew;port=3306', 'root', '');
            $dumper->start('database/dbbackup-'.$tgl_sekarang.'.sql');
        } catch (\Exception $e) {
            echo 'mysqldump-php error: ' . $e->getMessage();
        }

        return redirect()->back()->with('pesan', 'Backup Database Berhasil');
    }

    public function index()
    {
    $gedung   = $this->MTwebGedung->findAll();
    return view('admin/index',[
        'gedung'   => $gedung
    ]);
    }

    public function statistik(){
    $builder  = $this->db->table('inventaris_peralatan');
    $baik     = $this->db->table('inventaris_peralatan')->where('id_kondisi', 'K1');
    $r_ringan = $this->db->table('inventaris_peralatan')->where('id_kondisi', 'K2');
    $r_berat  = $this->db->table('inventaris_peralatan')->where('id_kondisi', 'K3');

    $bidang    = $this->MTwebCategory->orderBy('golongan', 'asc')->getBidang();
    $gedung   = $this->MTwebGedung->findAll();

        return view('admin/statistik/index',[
            'baik'     => $baik->countAllResults(),
            'r_ringan' => $r_ringan->countAllResults(),
            'r_berat'  => $r_berat->countAllResults(),
            'bidang'   => $bidang,
            'gedung'   => $gedung
        ]);
    }

    public function DT_inventaris_peralatan(){
        $request = Services::request();
        if ($request->isAJAX()) {            
            $db = db_connect();
            $builder = $db->table('inventaris_peralatan')
            ->select('idinventaris_peralatan,kode_barang, merk, nup, nama_barang, uraian_kondisi, tercatat')
            ->join('tweb_kondisi', 'tweb_kondisi.id_kondisi = inventaris_peralatan.id_kondisi')
            ->where('tercatat', NULL);
            
            return DataTable::of($builder)
            ->postQuery(function($builder){
                $builder->orderBy('kode_barang', 'asc');
                $builder->orderBy('nup', 'asc');
            })
            ->addNumbering('no')
            ->filter(function ($builder, $request) {
                if ($request->bidang)
                    $builder->where('idtweb_asset', $request->bidang);
            })
            ->add('action', function($row){
                return "<a onClick=\"
                window.opener.document.getElementById('id').value = '".$row->idinventaris_peralatan."';
                window.opener.document.getElementById('kode_barang').value = '".$row->kode_barang."';
                window.opener.document.getElementById('nama_barang').value = '".$row->nama_barang."';
                window.opener.document.getElementById('nup').value = '".$row->nup."';
                window.close();\"> <button class=\"btn btn-sm btn-primary\"> <i class=\"ace-icon fa fa-check\"></i> Select </button> <br>
                                            </a>";
            })
            ->edit('nama_barang', function($row){
                return '<b>'.$row->merk.'</b><br> '.$row->nama_barang.'';
            })
            ->toJson(true);
        }
    }

    public function DT_inventaris_peralatan2(){
        $request = Services::request();
        if ($request->isAJAX()) {            
            $db = db_connect();
            $builder = $db->table('inventaris_peralatan')
            ->select('inventaris_peralatan.idinventaris_peralatan,kode_barang, merk, nup, nama_barang, uraian_kondisi, tercatat')
            ->join('tweb_kondisi', 'tweb_kondisi.id_kondisi = inventaris_peralatan.id_kondisi')
            ->join('transaksi_penempatan_item', 'transaksi_penempatan_item.idinventaris_peralatan = inventaris_peralatan.idinventaris_peralatan')
            ->join('transaksi_penempatan', 'transaksi_penempatan.idtransaksi_penempatan = transaksi_penempatan_item.idtransaksi_penempatan')
            ->where('tercatat !=', NULL);
            
            return DataTable::of($builder)
            ->postQuery(function($builder){
                $builder->orderBy('kode_barang', 'asc');
                $builder->orderBy('nup', 'asc');
            })
            ->addNumbering('no')
            ->filter(function ($builder, $request) {
                if ($request->bidang)
                    $builder->where('transaksi_penempatan.id_lokasi', $request->bidang);
            })
            ->add('action', function($row){
                return "<a onClick=\"
                window.opener.document.getElementById('id').value = '".$row->idinventaris_peralatan."';
                window.opener.document.getElementById('kode_barang').value = '".$row->kode_barang."';
                window.opener.document.getElementById('nama_barang').value = '".$row->nama_barang."';
                window.opener.document.getElementById('nup').value = '".$row->nup."';
                window.close();\"> <button class=\"btn btn-sm btn-primary\"> <i class=\"ace-icon fa fa-check\"></i> Select </button> <br>
                                            </a>";
            })
            ->add('lokasi', function($row){
                $test = $this->MTransaksiPBitem
                    ->join('transaksi_penempatan', 'transaksi_penempatan.idtransaksi_penempatan = transaksi_penempatan_item.idtransaksi_penempatan', 'left')
                    ->join('tweb_lokasi', 'tweb_lokasi.id_lokasi = transaksi_penempatan.id_lokasi', 'left')
                    ->join('tweb_gedung', 'tweb_gedung.id_gedung = tweb_lokasi.id_gedung', 'left')
                    ->join('tweb_pengguna', 'tweb_pengguna.id_pengguna = transaksi_penempatan_item.id_pengguna', 'left')
                    ->where('transaksi_penempatan_item.idinventaris_peralatan', $row->idinventaris_peralatan)
                    ->where('status_penempatan_item', "1")
                    ->first();

                if (isset($test)) {
                    return "<b>" . $test['nama_lokasi'] . "</b><br>" . $test['nama_gedung'] . " Lantai 0" . $test['lantai'] . "<br>" . $test['nama_pengguna'] ;
                }else{
                    return ' Belum Ditempatkan! ';
                }
            })
            ->edit('nama_barang', function($row){
                return '<b>'.$row->merk.'</b><br> '.$row->nama_barang.'';
            })
            ->toJson(true);
        }
    }

    public function DI_inventaris_peralatan(){
        $request = Services::request();
        if ($request->isAJAX()) {            
            $db = db_connect();
            $builder = $db->table('inventaris_peralatan')
            ->select('idinventaris_peralatan,kode_barang,nup,nama_barang,merk,tgl_perolehan,id_perolehan,tercatat,uraian_kondisi,nilai_perolehan')
            ->join('tweb_kondisi', 'tweb_kondisi.id_kondisi = inventaris_peralatan.id_kondisi')
            ->orderBy('kode_barang', 'asc')
            ->orderBy('nup', 'asc');

            return DataTable::of($builder)
            ->postQuery(function($builder){
                $builder->limit(10);
            })
            ->addNumbering('no')
            ->add('action', function($row){
                return '
                <a href="'.site_url('admin/inventaris_peralatan/detail/'.$row->idinventaris_peralatan).'" data-toggle="tooltip" data-placement="top" rel="tooltip" type="button" title="Detail" class="btn btn-xs btn-success"><i class="ace-icon fa fa-folder-open-o"></i> </a>
                <a href="'.site_url('admin/inventaris_peralatan/edit/'.$row->idinventaris_peralatan).'" data-toggle="tooltip" data-placement="top" rel="tooltip" type="button" title="Edit" class="btn btn-xs btn-info"><i class="ace-icon glyphicon glyphicon-edit"></i> </a>
                <a href= "'.site_url('admin/inventaris_peralatan/delete/'.$row->idinventaris_peralatan).'" onclick="return confirm(\'Are you sure you want to delete this item?\')" data-toggle="tooltip" data-placement="left" rel="tooltip" type="button" title="Delete" class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash"></i> </a>
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
                $format = date("d-m-Y", strtotime($row->tgl_perolehan));
                return ''.$format.'';
            })
            ->format('nilai_perolehan', function($value){
                return 'Rp. '.number_format($value, 2,'.',',');
            })
            ->toJson(true);
        }
    }

    public function DI_inventaris_gedung(){
        $request = Services::request();
        if ($request->isAJAX()) {            
            $db = db_connect();
            $builder = $db->table('inventaris_gedung')
            ->select('idinventaris_gedung,kode_barang,nup,nama_barang,merk,tgl_perolehan,id_perolehan,tercatat,uraian_kondisi,nilai_perolehan,luas_bangunan')
            ->join('tweb_kondisi', 'tweb_kondisi.id_kondisi = inventaris_gedung.id_kondisi')
            ->orderBy('kode_barang', 'asc')
            ->orderBy('nup', 'asc');

            return DataTable::of($builder)
            ->postQuery(function($builder){
                $builder->limit(10);
            })
            ->addNumbering('no')
            ->add('action', function($row){
                return '
                <a href="'.site_url('admin/inventaris_gedung/detail/'.$row->idinventaris_gedung).'" data-toggle="tooltip" data-placement="top" rel="tooltip" type="button" title="Detail" class="btn btn-xs btn-success"><i class="ace-icon fa fa-folder-open-o"></i> </a>
                <a href="'.site_url('admin/inventaris_gedung/edit/'.$row->idinventaris_gedung).'" data-toggle="tooltip" data-placement="top" rel="tooltip" type="button" title="Edit" class="btn btn-xs btn-info"><i class="ace-icon glyphicon glyphicon-edit"></i> </a>
                <a href= "'.site_url('admin/inventaris_gedung/delete/'.$row->idinventaris_gedung).'" onclick="return confirm(\'Are you sure you want to delete this item?\')" data-toggle="tooltip" data-placement="left" rel="tooltip" type="button" title="Delete" class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash"></i> </a>
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
                $format = date("d-m-Y", strtotime($row->tgl_perolehan));
                return ''.$format.'';
            })
            ->format('nilai_perolehan', function($value){
                return 'Rp. '.number_format($value, 2,'.',',');
            })
            ->toJson(true);
        }
    }

    public function DI_inventaris_jalan(){
        $request = Services::request();
        if ($request->isAJAX()) {            
            $db = db_connect();
            $builder = $db->table('inventaris_jalan')
            ->select('idinventaris_jalan,kode_barang,nup,nama_barang,merk,tgl_perolehan,id_perolehan,tercatat,uraian_kondisi,nilai_perolehan,luas_bangunan')
            ->join('tweb_kondisi', 'tweb_kondisi.id_kondisi = inventaris_jalan.id_kondisi')
            ->orderBy('kode_barang', 'asc')
            ->orderBy('nup', 'asc');

            return DataTable::of($builder)
            ->postQuery(function($builder){
                $builder->limit(10);
            })
            ->addNumbering('no')
            ->add('action', function($row){
                return '
                <a href="'.site_url('admin/inventaris_jalan/detail/'.$row->idinventaris_jalan).'" data-toggle="tooltip" data-placement="top" rel="tooltip" type="button" title="Detail" class="btn btn-xs btn-success"><i class="ace-icon fa fa-folder-open-o"></i> </a>
                <a href="'.site_url('admin/inventaris_jalan/edit/'.$row->idinventaris_jalan).'" data-toggle="tooltip" data-placement="top" rel="tooltip" type="button" title="Edit" class="btn btn-xs btn-info"><i class="ace-icon glyphicon glyphicon-edit"></i> </a>
                <a onclick="return confirm(\'Are you sure you want to delete this item?\')" href="'.site_url('admin/inventaris_jalan/delete/'.$row->idinventaris_jalan).'" data-toggle="tooltip" data-placement="top" rel="tooltip" type="button" title="Delete" class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash"></i> </a>
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
                $format = date("d-m-Y", strtotime($row->tgl_perolehan));
                return ''.$format.'';
            })
            ->format('nilai_perolehan', function($value){
                return 'Rp. '.number_format($value, 2,'.',',');
            })
            ->toJson(true);
        }
    }

    public function DI_inventaris_asset(){
        $request = Services::request();
        if ($request->isAJAX()) {            
            $db = db_connect();
            $builder = $db->table('inventaris_asset')
            ->select('idinventaris_asset,kode_barang,nup,nama_barang,merk,tgl_perolehan,id_perolehan,tercatat,uraian_kondisi,nilai_perolehan,kuantitas')
            ->join('tweb_kondisi', 'tweb_kondisi.id_kondisi = inventaris_asset.id_kondisi')
            ->orderBy('kode_barang', 'asc')
            ->orderBy('nup', 'asc');

            return DataTable::of($builder)
            ->postQuery(function($builder){
                $builder->limit(10);
            })
            ->addNumbering('no')
            ->add('action', function($row){
                return '
                <a href="'.site_url('admin/inventaris_asset/detail/'.$row->idinventaris_asset).'" data-toggle="tooltip" data-placement="top" rel="tooltip" type="button" title="Detail" class="btn btn-xs btn-success"><i class="ace-icon fa fa-folder-open-o"></i> </a>
                <a href="'.site_url('admin/inventaris_asset/edit/'.$row->idinventaris_asset).'" data-toggle="tooltip" data-placement="top" rel="tooltip" type="button" title="Edit" class="btn btn-xs btn-info"><i class="ace-icon glyphicon glyphicon-edit"></i> </a>
                <a onclick="return confirm(\'Are you sure you want to delete this item?\')" href="'.site_url('admin/inventaris_asset/delete/'.$row->idinventaris_asset).'" data-toggle="tooltip" data-placement="top" rel="tooltip" type="button" title="Delete" class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash"></i> </a>
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
                $format = date("d-m-Y", strtotime($row->tgl_perolehan));
                return ''.$format.'';
            })
            ->format('nilai_perolehan', function($value){
                return 'Rp. '.number_format($value, 2,'.',',');
            })
            ->toJson(true);
        }
    }

    public function DI_inventaris_takberwujud(){
        $request = Services::request();
        if ($request->isAJAX()) {            
            $db = db_connect();
            $builder = $db->table('inventaris_takberwujud')
            ->select('idinventaris_takberwujud,kode_barang,nup,nama_barang,merk,tgl_perolehan,id_perolehan,tercatat,uraian_kondisi,nilai_perolehan,kuantitas')
            ->join('tweb_kondisi', 'tweb_kondisi.id_kondisi = inventaris_takberwujud.id_kondisi')
            ->orderBy('kode_barang', 'asc')
            ->orderBy('nup', 'asc');

            return DataTable::of($builder)
            ->postQuery(function($builder){
                $builder->limit(10);
            })
            ->addNumbering('no')
            ->add('action', function($row){
                return '
                <a href="'.site_url('admin/inventaris_takberwujud/detail/'.$row->idinventaris_takberwujud).'" data-toggle="tooltip" data-placement="top" rel="tooltip" type="button" title="Detail" class="btn btn-xs btn-success"><i class="ace-icon fa fa-folder-open-o"></i> </a>
                <a href="'.site_url('admin/inventaris_takberwujud/edit/'.$row->idinventaris_takberwujud).'" data-toggle="tooltip" data-placement="top" rel="tooltip" type="button" title="Edit" class="btn btn-xs btn-info"><i class="ace-icon glyphicon glyphicon-edit"></i> </a>
                <a onclick="return confirm(\'Are you sure you want to delete this item?\')" href="'.site_url('admin/inventaris_takberwujud/delete/'.$row->idinventaris_takberwujud).'" data-toggle="tooltip" data-placement="top" rel="tooltip" type="button" title="Delete" class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash"></i> </a>
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
                $format = date("d-m-Y", strtotime($row->tgl_perolehan));
                return ''.$format.'';
            })
            ->format('nilai_perolehan', function($value){
                return 'Rp. '.number_format($value, 2,'.',',');
            })
            ->toJson(true);
        }
    }
}
