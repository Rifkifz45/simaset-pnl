<?php
namespace App\Controllers\Approver;
use App\Controllers\BaseController;
use App\Models\Admin\MTwebCategory;
use App\Models\Admin\MTwebGedung;
use Config\Services;
use \Hermawan\DataTables\DataTable;

class Statistik Extends BaseController{
	public function __construct()
	{
		$this->MTwebCategory = new MTwebCategory();
		$this->MTwebGedung = new MTwebGedung();
	}

	public function index()
	{
		$bidang    = $this->MTwebCategory->orderBy('golongan', 'asc')->getBidang();
		return view('approver/statistik/index',[
			'bidang'		=> $bidang,
		]);
	}

	public function detail1($id)
	{
		$idtweb_asset = $this->MTwebCategory->find($id);
		$select = $idtweb_asset["golongan"] . $idtweb_asset["bidang"];

		if ($idtweb_asset["golongan"] == 2) {
			$db_select = site_url('approver/statistik/peralatan/'.$id);
		} else if ($idtweb_asset["golongan"] == 3) {
			$db_select = site_url('approver/statistik/peralatan/'.$id);
		} else if ($idtweb_asset["golongan"] == 4) {
			$db_select = site_url('approver/statistik/peralatan/'.$id);
		} else if ($idtweb_asset["golongan"] == 5) {
			$db_select = site_url('approver/statistik/peralatan/'.$id);
		} else if ($idtweb_asset["golongan"] == 6) {
			$db_select = site_url('approver/statistik/peralatan/'.$id);
		} else if ($idtweb_asset["golongan"] == 7) {
			$db_select = site_url('approver/statistik/peralatan/'.$id);
		} else if ($idtweb_asset["golongan"] == 8) {
			$db_select = site_url('approver/statistik/peralatan/'.$id);
		} else{
			$db_select = 0;
		}
		return view('approver/statistik/subgroup',[
			'detail' => $idtweb_asset,
			'select' => $select,
			'barang' => $db_select
		]);
	}

	public function view($id){
		$idtweb_asset = $this->MTwebCategory->find($id);
		if ($idtweb_asset["golongan"] == 2) {
			$db_select = site_url('approver/statistik/DI_tanah/'.$id);
			$return_view = 'approver/statistik/view-tanah';
		} else if ($idtweb_asset["golongan"] == 3) {
			$db_select = site_url('approver/statistik/DI_peralatan/'.$id);
			$return_view = 'approver/statistik/view-peralatan';
		} else if ($idtweb_asset["golongan"] == 4) {
			$return_view = 'approver/statistik/view-gedung';
			$db_select = site_url('approver/statistik/DI_gedung/'.$id);
		} else if ($idtweb_asset["golongan"] == 5) {
			$return_view = 'approver/statistik/view-jalan';
			$db_select = site_url('approver/statistik/DI_jalan/'.$id);
		} else if ($idtweb_asset["golongan"] == 6) {
			$db_select = site_url('approver/statistik/DI_asset/'.$id);
			$return_view = 'approver/statistik/view-asset';
		} else if ($idtweb_asset["golongan"] == 7) {
			$db_select = site_url('approver/statistik/DI_konstruksi/'.$id);
		} else if ($idtweb_asset["golongan"] == 8) {
			$return_view = 'approver/statistik/view-takberwujud';
			$db_select = site_url('approver/statistik/DI_takberwujud/'.$id);
		} else{
			$db_select = 0;
		}
		return view($return_view,[
			'detail' => $idtweb_asset,
			'barang' => $db_select
		]);
	}

	public function peralatan($id){
		$request = Services::request();
        if ($request->isAJAX()) {            
            $db = db_connect();
            $idtweb_asset = $this->MTwebCategory->find($id);
            $builder = $db->table('tweb_asset')
            ->select('idtweb_asset,golongan,bidang,kelompok,sub_kelompok,sub_sub_kelompok,uraian')
            ->where('golongan', $idtweb_asset["golongan"])
            ->where('bidang', $idtweb_asset["bidang"])
            ->where('kelompok !=', "*")
            ->where("sub_kelompok !=", "*")
            ->where("sub_sub_kelompok !=", "*");

            return DataTable::of($builder)
            ->postQuery(function($builder){
                $builder->orderBy('golongan', 'asc');
            })
            ->addNumbering('no')
            ->add('action', function($row){
            	if ($row->golongan == 2) {
            		return '
                	<div class="action-buttons">
	                <a target="_blank" href="'.site_url('approver/inventaris_tanah/sub/'.$row->idtweb_asset).'" title="Detail" class="primary"><i class="ace-icon fa fa-search-plus bigger-130"></i> </a>
	                </div>
					';
                } else if ($row->golongan == 3) {
                	return '
                	<div class="action-buttons">
	                <a target="_blank" href="'.site_url('approver/inventaris_peralatan/sub/'.$row->idtweb_asset).'" title="Detail" class="primary"><i class="ace-icon fa fa-search-plus bigger-130"></i> </a>
	                </div>
					';
                } else if ($row->golongan == 4) {
                	return '
                	<div class="action-buttons">
	                <a target="_blank" href="'.site_url('approver/inventaris_gedung/sub/'.$row->idtweb_asset).'" title="Detail" class="primary"><i class="ace-icon fa fa-search-plus bigger-130"></i> </a>
	                </div>
					';
                } else if ($row->golongan == 5) {
                	return '
                	<div class="action-buttons">
	                <a target="_blank" href="'.site_url('approver/inventaris_jalan/sub/'.$row->idtweb_asset).'" title="Detail" class="primary"><i class="ace-icon fa fa-search-plus bigger-130"></i> </a>
	                </div>
					';
                } else if ($row->golongan == 6) {
                	return '
                	<div class="action-buttons">
	                <a target="_blank" href="'.site_url('approver/inventaris_asset/sub/'.$row->idtweb_asset).'" title="Detail" class="primary"><i class="ace-icon fa fa-search-plus bigger-130"></i> </a>
	                </div>
					';
                } else if ($row->golongan == 7) {
                	return '
                	<div class="action-buttons">
	                <a target="_blank" href="'.site_url('approver/inventaris_konstruksi/sub/'.$row->idtweb_asset).'" title="Detail" class="primary"><i class="ace-icon fa fa-search-plus bigger-130"></i> </a>
	                </div>
					';
                } else if ($row->golongan == 8) {
                	return '
                	<div class="action-buttons">
	                <a target="_blank" href="'.site_url('approver/inventaris_takberwujud/sub/'.$row->idtweb_asset).'" title="Detail" class="primary"><i class="ace-icon fa fa-search-plus bigger-130"></i> </a>
	                </div>
					';
                } else{
                	return "None";
                }
            })
            ->add('jumlah', function($row){
                $db = \Config\Database::connect();
                $data = $row->golongan.$row->bidang.$row->kelompok.$row->sub_kelompok.$row->sub_sub_kelompok;

                if ($row->golongan == 2) {
                	$inv_tanah = $db->table('inventaris_tanah')->where('kode_barang', $data);
                	return $inv_tanah->countAllResults();
                } else if ($row->golongan == 3) {
                	$inv_prl = $db->table('inventaris_peralatan')->where('kode_barang', $data);
                	return $inv_prl->countAllResults();
                } else if ($row->golongan == 4) {
                	$inv_jalan = $db->table('inventaris_gedung')->where('kode_barang', $data);
                	return $inv_jalan->countAllResults();
                } else if ($row->golongan == 5) {
                	$inv_jalan = $db->table('inventaris_jalan')->where('kode_barang', $data);
                	return $inv_jalan->countAllResults();
                } else if ($row->golongan == 6) {
                	$inv_jalan = $db->table('inventaris_asset')->where('kode_barang', $data);
                	return $inv_jalan->countAllResults();
                } else if ($row->golongan == 7) {
                	$inv_jalan = $db->table('inventaris_konstruksi')->where('kode_barang', $data);
                	return $inv_jalan->countAllResults();
                } else if ($row->golongan == 8) {
                	$inv_jalan = $db->table('inventaris_takberwujud')->where('kode_barang', $data);
                	return $inv_jalan->countAllResults();
                } else{
                	return "None";
                }
            })
            ->add('satuan', function($row){
                return 'Buah';
            })
            ->add('kode_barang', function($row){
                return ''.$row->golongan.$row->bidang.$row->kelompok.$row->sub_kelompok.$row->sub_sub_kelompok.'';
            })
            ->toJson(true);
        }
	}

	public function index2()
	{
		$builder  = $this->db->table('inventaris_peralatan');
    	$baik     = $this->db->table('inventaris_peralatan')->where('id_kondisi', 'K1');
    	$r_ringan = $this->db->table('inventaris_peralatan')->where('id_kondisi', 'K2');
    	$r_berat  = $this->db->table('inventaris_peralatan')->where('id_kondisi', 'K3');

    	$kategori    = $this->MTwebCategory->orderBy('golongan', 'asc')->filterKategori();
    	$gedung   = $this->MTwebGedung->findAll();

        return view('approver/statistik/index2',[
			'baik'     => $baik->countAllResults(),
			'r_ringan' => $r_ringan->countAllResults(),
			'r_berat'  => $r_berat->countAllResults(),
			'kategori' => $kategori,
			'gedung'   => $gedung
        ]);
	}
}