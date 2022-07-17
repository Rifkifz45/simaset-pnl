<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\Admin\MTwebCategory;
use App\Models\Admin\MInventarisTanah;
use App\Models\Admin\MInventarisPeralatan;
use Config\Services;
use \Hermawan\DataTables\DataTable;

class QRCode Extends BaseController{
	public function __construct()
	{
		$this->MTwebCategory        = new MTwebCategory();
		$this->MInventarisTanah     = new MInventarisTanah();
		$this->MInventarisPeralatan = new MInventarisPeralatan();
	}

	public function index()
	{
		$bidang    = $this->MTwebCategory->orderBy('golongan', 'asc')->getBidang();
		return view('admin/qrcode/index',[
			'bidang'		=> $bidang,
		]);
	}

	public function print($id){
		if ($id == "2") {
			return view('admin/qrcode/print-tanah');
		} else if ($id == "3") {
			return view('admin/qrcode/print-peralatan');
		}else if ($id == "4") {
			return view('admin/qrcode/print-gedung');
		}else if ($id == "5") {
			return view('admin/qrcode/print-jalan');
		}else if ($id == "6") {
			return view('admin/qrcode/print-asset');
		}else if ($id == "7") {
			return view('admin/qrcode/print-konstruksi');
		}else if ($id == "8") {
			return view('admin/qrcode/print-takberwujud');
		}else{
			echo "<script>alert('Data Tidak ditemukan!!'); history.go(-1);</script>";
		}
		
	}

	public function view($id){
		$idtweb_asset = $this->MTwebCategory->find($id);
		if ($idtweb_asset["golongan"] == 2) {
			$db_select = site_url('admin/DI_tanah/'.$id);
		} else if ($idtweb_asset["golongan"] == 3) {
			$db_select = site_url('admin/DI_peralatan/'.$id);
		} else if ($idtweb_asset["golongan"] == 4) {
			$db_select = site_url('admin/DI_gedung/'.$id);
		} else if ($idtweb_asset["golongan"] == 5) {
			$db_select = site_url('admin/DI_jalan/'.$id);
		} else if ($idtweb_asset["golongan"] == 6) {
			$db_select = site_url('admin/DI_asset/'.$id);
		} else if ($idtweb_asset["golongan"] == 7) {
			$db_select = site_url('admin/DI_konstruksi/'.$id);
		} else if ($idtweb_asset["golongan"] == 8) {
			$db_select = site_url('admin/DI_takberwujud/'.$id);
		} else{
			$db_select = 0;
		}
		return view('admin/qrcode/view',[
			'detail' => $idtweb_asset,
			'barang' => $db_select
		]);
	}

	public function DI_tanah($id){
		$request = Services::request();
        if ($request->isAJAX()) {            
            $db = db_connect();
            $builder = $db->table('inventaris_tanah')
            ->select('id,kode_barang, merk, nup, nama_barang')
            ->where('idtweb_asset', $id);

            return DataTable::of($builder)
            ->postQuery(function($builder){
                $builder->orderBy('kode_barang', 'asc');
                $builder->orderBy('nup', 'asc');
            })
            ->addNumbering('no')
            ->add('action', function($row){
                return '
                <label class="pos-rel">
					<input class="ace" name="cbKode[]" id="cbKode" value="'.$row->id . '" type="checkbox">
					<span class="lbl"></span>
				</label>
				';
            })
            ->edit('kode_barang', function($row){
                return '<b>'.$row->kode_barang.'.'.$row->nup.'</b>';
            })
            ->toJson(true);
        }
	}

	public function DI_peralatan($id){
		$request = Services::request();
        if ($request->isAJAX()) {            
            $db = db_connect();
            $builder = $db->table('inventaris_peralatan')
            ->select('idinventaris_peralatan,kode_barang, merk, nup, nama_barang')
            ->where('idtweb_asset', $id);

            return DataTable::of($builder)
            ->postQuery(function($builder){
                $builder->orderBy('kode_barang', 'asc');
                $builder->orderBy('nup', 'asc');
            })
            ->addNumbering('no')
            ->add('action', function($row){
                return '
                <label class="pos-rel">
					<input class="ace" name="cbKode[]" id="cbKode" value="'.$row->idinventaris_peralatan . '" type="checkbox">
					<span class="lbl"></span>
				</label>
				';
            })
            ->edit('kode_barang', function($row){
                return '<b>'.$row->kode_barang.'.'.$row->nup.'</b>';
            })
            ->toJson(true);
        }
	}

	public function DI_gedung($id){
		$request = Services::request();
        if ($request->isAJAX()) {            
            $db = db_connect();
            $builder = $db->table('inventaris_gedung')
            ->select('idinventaris_gedung,kode_barang, merk, nup, nama_barang')
            ->where('idtweb_asset', $id);

            return DataTable::of($builder)
            ->postQuery(function($builder){
                $builder->orderBy('kode_barang', 'asc');
                $builder->orderBy('nup', 'asc');
            })
            ->addNumbering('no')
            ->add('action', function($row){
                return '
                <label class="pos-rel">
					<input class="ace" name="cbKode[]" id="cbKode" value="'.$row->idinventaris_gedung . '" type="checkbox">
					<span class="lbl"></span>
				</label>
				';
            })
            ->edit('kode_barang', function($row){
                return '<b>'.$row->kode_barang.'.'.$row->nup.'</b>';
            })
            ->toJson(true);
        }
	}

	public function DI_jalan($id){
		$request = Services::request();
        if ($request->isAJAX()) {            
            $db = db_connect();
            $builder = $db->table('inventaris_jalan')
            ->select('idinventaris_jalan,kode_barang, merk, nup, nama_barang')
            ->where('idtweb_asset', $id);

            return DataTable::of($builder)
            ->postQuery(function($builder){
                $builder->orderBy('kode_barang', 'asc');
                $builder->orderBy('nup', 'asc');
            })
            ->addNumbering('no')
            ->add('action', function($row){
                return '
                <label class="pos-rel">
					<input class="ace" name="cbKode[]" id="cbKode" value="'.$row->idinventaris_jalan . '" type="checkbox">
					<span class="lbl"></span>
				</label>
				';
            })
            ->edit('kode_barang', function($row){
                return '<b>'.$row->kode_barang.'.'.$row->nup.'</b>';
            })
            ->toJson(true);
        }
	}

	public function DI_asset($id){
		$request = Services::request();
        if ($request->isAJAX()) {            
            $db = db_connect();
            $builder = $db->table('inventaris_asset')
            ->select('idinventaris_asset,kode_barang, merk, nup, nama_barang')
            ->where('idtweb_asset', $id);

            return DataTable::of($builder)
            ->postQuery(function($builder){
                $builder->orderBy('kode_barang', 'asc');
                $builder->orderBy('nup', 'asc');
            })
            ->addNumbering('no')
            ->add('action', function($row){
                return '
                <label class="pos-rel">
					<input class="ace" name="cbKode[]" id="cbKode" value="'.$row->idinventaris_asset . '" type="checkbox">
					<span class="lbl"></span>
				</label>
				';
            })
            ->edit('kode_barang', function($row){
                return '<b>'.$row->kode_barang.'.'.$row->nup.'</b>';
            })
            ->toJson(true);
        }
	}

	public function DI_konstruksi($id){
		$request = Services::request();
        if ($request->isAJAX()) {            
            $db = db_connect();
            $builder = $db->table('inventaris_konstruksi')
            ->select('idinventaris_konstruksi,kode_barang, merk, nup, nama_barang')
            ->where('idtweb_asset', $id);

            return DataTable::of($builder)
            ->postQuery(function($builder){
                $builder->orderBy('kode_barang', 'asc');
                $builder->orderBy('nup', 'asc');
            })
            ->addNumbering('no')
            ->add('action', function($row){
                return '
                <label class="pos-rel">
					<input class="ace" name="cbKode[]" id="cbKode" value="'.$row->idinventaris_konstruksi . '" type="checkbox">
					<span class="lbl"></span>
				</label>
				';
            })
            ->edit('kode_barang', function($row){
                return '<b>'.$row->kode_barang.'.'.$row->nup.'</b>';
            })
            ->toJson(true);
        }
	}

	public function DI_takberwujud($id){
		$request = Services::request();
        if ($request->isAJAX()) {            
            $db = db_connect();
            $builder = $db->table('inventaris_takberwujud')
            ->select('idinventaris_takberwujud,kode_barang, merk, nup, nama_barang')
            ->where('idtweb_asset', $id);

            return DataTable::of($builder)
            ->postQuery(function($builder){
                $builder->orderBy('kode_barang', 'asc');
                $builder->orderBy('nup', 'asc');
            })
            ->addNumbering('no')
            ->add('action', function($row){
                return '
                <label class="pos-rel">
					<input class="ace" name="cbKode[]" id="cbKode" value="'.$row->idinventaris_takberwujud . '" type="checkbox">
					<span class="lbl"></span>
				</label>
				';
            })
            ->edit('kode_barang', function($row){
                return '<b>'.$row->kode_barang.'.'.$row->nup.'</b>';
            })
            ->toJson(true);
        }
	}
}