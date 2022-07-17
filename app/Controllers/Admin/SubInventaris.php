<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\Admin\MTwebCategory;
use App\Models\Admin\MTransaksiPBitem;
use Config\Services;
use \Hermawan\DataTables\DataTable;

class SubInventaris Extends BaseController{
	public function __construct()
	{
		$this->MTwebCategory = new MTwebCategory();
        $this->MTransaksiPBitem = new MTransaksiPBitem();
	}

	public function tanahv1($id){
        $request = Services::request();
        if ($request->isAJAX()) {            
            $db = db_connect();
            $idtweb_asset = $this->MTwebCategory->find($id);
            $kc_brg = $idtweb_asset['golongan'].$idtweb_asset['bidang'].$idtweb_asset['kelompok'].$idtweb_asset['sub_kelompok'].$idtweb_asset['sub_sub_kelompok'];
            $builder = $db->table('inventaris_tanah')
                ->select('id,idtweb_asset,merk,kode_barang,nup,uraian_kondisi,nilai_perolehan,nama_barang,luas_tanah_seluruhnya,alamat,tgl_perolehan')
                ->join('tweb_kondisi', 'tweb_kondisi.id_kondisi = inventaris_tanah.id_kondisi')
                ->where('kode_barang', $kc_brg);

            return DataTable::of($builder)
            ->postQuery(function($builder){
                $builder->orderBy('kode_barang', 'asc');
            })
            ->addNumbering('no')
            ->edit('luas_tanah_seluruhnya', function($row){
                return number_format($row->luas_tanah_seluruhnya) . " M<sup>2</sup>";
            })
            ->edit('tgl_perolehan', function($row){
                return date('d-m-Y', strtotime($row->tgl_perolehan));
            })
            ->edit('nama_barang', function($row){
                return "<b>" . $row->merk . "</b><br>" . $row->nama_barang;
            })
            ->add('kondisi', function($row){
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
            ->format('nilai_perolehan', function($value){
                return 'Rp '.number_format($value, 2,'.',',');
            })
            ->toJson(true);
        }
    }

    public function peralatanv1($id){
        $request = Services::request();
        if ($request->isAJAX()) {            
            $db = db_connect();
            $idtweb_asset = $this->MTwebCategory->find($id);
            $kc_brg = $idtweb_asset['golongan'].$idtweb_asset['bidang'].$idtweb_asset['kelompok'].$idtweb_asset['sub_kelompok'].$idtweb_asset['sub_sub_kelompok'];
            $builder = $db->table('inventaris_peralatan')
                ->select('idinventaris_peralatan,kode_barang,merk,nup,nama_barang,tercatat')
                ->where('kode_barang', $kc_brg);

            return DataTable::of($builder)
            ->postQuery(function($builder){
                $builder->orderBy('kode_barang', 'asc');
            })
            ->addNumbering('no')
            ->add('lokasi', function($row){
                $test = $this->MTransaksiPBitem
                    ->join('transaksi_penempatan', 'transaksi_penempatan.idtransaksi_penempatan = transaksi_penempatan_item.idtransaksi_penempatan', 'left')
                    ->join('tweb_lokasi', 'tweb_lokasi.id_lokasi = transaksi_penempatan.id_lokasi', 'left')
                    ->join('tweb_gedung', 'tweb_gedung.id_gedung = tweb_lokasi.id_gedung', 'left')
                    ->where('transaksi_penempatan_item.idinventaris_peralatan', $row->idinventaris_peralatan)
                    ->where('status_penempatan_item', "1")
                    ->first();

                if (isset($test)) {
                    return "<b>" . $test['nama_lokasi'] . "</b><br>" . $test['nama_gedung'] . " Lantai 0" . $test['lantai'] ;
                }else{
                    return ' Belum Ditempatkan! ';
                }
            })
            ->edit('tercatat', function($row){
                if ($row->tercatat == "DBR") {
                    return $row->tercatat;
                }else if($row->tercatat == "DBL"){
                    return $row->tercatat;
                }else if ($row->tercatat == "KIB") {
                    return $row->tercatat;
                }else{
                    return ' Null ';
                }
            })
            ->edit('nama_barang', function($row){
                return "<b>" . $row->merk . "</b><br>" . $row->nama_barang;
            })
            ->add('pengguna', function($row){
                $test = $this->MTransaksiPBitem
                    ->join('transaksi_penempatan', 'transaksi_penempatan.idtransaksi_penempatan = transaksi_penempatan_item.idtransaksi_penempatan', 'left')
                    ->join('tweb_lokasi', 'tweb_lokasi.id_lokasi = transaksi_penempatan.id_lokasi', 'left')
                     ->join('tweb_pengguna', 'tweb_pengguna.id_pengguna = transaksi_penempatan_item.id_pengguna', 'left')
                    ->join('tweb_gedung', 'tweb_gedung.id_gedung = tweb_lokasi.id_gedung', 'left')
                    ->where('transaksi_penempatan_item.idinventaris_peralatan', $row->idinventaris_peralatan)
                    ->where('status_penempatan_item', "1")
                    ->first();

                if (isset($test)) {
                    if ($test['nama_pengguna'] == NULL) {
                        return " - ";
                    }else{
                        return $test['nama_pengguna'];
                    }
                }else{
                    return 'Belum Ditempatkan!';
                }
            })
            ->toJson(true);
        }
    }

     public function gedungv1($id){
        $request = Services::request();
        if ($request->isAJAX()) {            
            $db = db_connect();
            $idtweb_asset = $this->MTwebCategory->find($id);
            $kc_brg = $idtweb_asset['golongan'].$idtweb_asset['bidang'].$idtweb_asset['kelompok'].$idtweb_asset['sub_kelompok'].$idtweb_asset['sub_sub_kelompok'];
            $builder = $db->table('inventaris_gedung')
            ->select('idinventaris_gedung,kode_barang,nup,nama_barang,merk,tgl_perolehan,id_perolehan,tercatat,uraian_kondisi,nilai_perolehan,luas_bangunan')
            ->join('tweb_kondisi', 'tweb_kondisi.id_kondisi = inventaris_gedung.id_kondisi')
            ->orderBy('kode_barang', 'asc')
            ->orderBy('nup', 'asc')
            ->where('kode_barang', $kc_brg);

            return DataTable::of($builder)
            ->setSearchableColumns(['kode_barang', 'nama_barang', 'nup', 'tercatat'])
            ->postQuery(function($builder){
                $builder->orderBy('kode_barang', 'asc');
                $builder->orderBy('nup', 'asc');
            })
            ->addNumbering('no')
            ->add('action', function($row){
                return 'Will Active Soon';
            })
            ->edit('nama_barang', function($row){
                return '<b>'.$row->merk.'</b><br>'.$row->nama_barang.'';
            })
            ->edit('luas_bangunan', function($row){
                return number_format($row->luas_bangunan) . " M<sup>2</sup>";
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

     public function jalanv1($id){
        $request = Services::request();
        if ($request->isAJAX()) {            
            $db = db_connect();
            $idtweb_asset = $this->MTwebCategory->find($id);
            $kc_brg = $idtweb_asset['golongan'].$idtweb_asset['bidang'].$idtweb_asset['kelompok'].$idtweb_asset['sub_kelompok'].$idtweb_asset['sub_sub_kelompok'];

            $builder = $db->table('inventaris_jalan')
            ->select('idinventaris_jalan,kode_barang,nup,nama_barang,merk,tgl_perolehan,id_perolehan,tercatat,uraian_kondisi,nilai_perolehan,luas_bangunan')
            ->join('tweb_kondisi', 'tweb_kondisi.id_kondisi = inventaris_jalan.id_kondisi')
            ->orderBy('kode_barang', 'asc')
            ->orderBy('nup', 'asc')
            ->where('kode_barang', $kc_brg);

            return DataTable::of($builder)
            ->setSearchableColumns(['kode_barang', 'nama_barang', 'nup', 'tercatat'])
            ->postQuery(function($builder){
                $builder->orderBy('kode_barang', 'asc');
                $builder->orderBy('nup', 'asc');
            })
            ->addNumbering('no')
            ->edit('nama_barang', function($row){
                return '<b>'.$row->merk.'</b><br>'.$row->nama_barang.'';
            })
            ->edit('luas_bangunan', function($row){
                return number_format($row->luas_bangunan) . " M<sup>2</>";
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

    public function assetv1($id){
        $request = Services::request();
        if ($request->isAJAX()) {            
            $db = db_connect();
            $idtweb_asset = $this->MTwebCategory->find($id);
            $kc_brg = $idtweb_asset['golongan'].$idtweb_asset['bidang'].$idtweb_asset['kelompok'].$idtweb_asset['sub_kelompok'].$idtweb_asset['sub_sub_kelompok'];

            $builder = $db->table('inventaris_asset')
            ->select('idinventaris_asset,kode_barang,nup,nama_barang,merk,tgl_perolehan,id_perolehan,tercatat,uraian_kondisi,nilai_perolehan,kuantitas')
            ->join('tweb_kondisi', 'tweb_kondisi.id_kondisi = inventaris_asset.id_kondisi')
            ->orderBy('kode_barang', 'asc')
            ->orderBy('nup', 'asc')
            ->where('kode_barang', $kc_brg);

            return DataTable::of($builder)
            ->setSearchableColumns(['kode_barang', 'nama_barang', 'nup', 'tercatat'])
            ->postQuery(function($builder){
                $builder->orderBy('kode_barang', 'asc');
                $builder->orderBy('nup', 'asc');
            })
            ->addNumbering('no')
            ->add('action', function($row){
                return 'Will Active Soon';
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

    public function takberwujudv1($id){
        $request = Services::request();
        if ($request->isAJAX()) {            
            $db = db_connect();
            $idtweb_asset = $this->MTwebCategory->find($id);
            $kc_brg = $idtweb_asset['golongan'].$idtweb_asset['bidang'].$idtweb_asset['kelompok'].$idtweb_asset['sub_kelompok'].$idtweb_asset['sub_sub_kelompok'];

            $builder = $db->table('inventaris_takberwujud')
            ->select('idinventaris_takberwujud,kode_barang,nup,nama_barang,merk,tgl_perolehan,id_perolehan,tercatat,uraian_kondisi,nilai_perolehan,kuantitas')
            ->join('tweb_kondisi', 'tweb_kondisi.id_kondisi = inventaris_takberwujud.id_kondisi')
            ->orderBy('kode_barang', 'asc')
            ->orderBy('nup', 'asc')
            ->where('kode_barang', $kc_brg);

            return DataTable::of($builder)
            ->setSearchableColumns(['kode_barang', 'nama_barang', 'nup', 'tercatat'])
            ->postQuery(function($builder){
                $builder->orderBy('kode_barang', 'asc');
                $builder->orderBy('nup', 'asc');
            })
            ->addNumbering('no')
            ->add('action', function($row){
                return 'Will Active Soon';
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