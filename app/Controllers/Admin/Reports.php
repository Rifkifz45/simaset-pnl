<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use Mpdf\Mpdf;
use App\Models\Admin\MInventarisTanah;
use App\Models\Admin\MInventarisPeralatan;
use App\Models\Admin\MInventarisGedung;
use App\Models\Admin\MInventarisJalan;
use App\Models\Admin\MTwebGedung;
use App\Models\Admin\MTwebLokasi;
use App\Models\Admin\MTwebLokasiKategori;
use App\Models\Admin\MTwebCategory;
use App\Models\Admin\MTwebKondisi;
use App\Models\Admin\MTwebSatuan;
use App\Models\Admin\MTwebHak;
use App\Models\Admin\MTwebPerolehan;
use App\Models\Admin\MTwebPengguna;
use App\Models\Admin\MTwebPenggunaKategori;

class Reports Extends BaseController{
	public function index()
	{
		return view('admin/reports/index');
	}

	public function __construct()
    {
		$this->MInventarisTanah      = new MInventarisTanah();
		$this->MInventarisPeralatan  = new MInventarisPeralatan();
		$this->MInventarisGedung     = new MInventarisGedung();
		$this->MInventarisJalan      = new MInventarisJalan();
		$this->MTwebCategory         = new MTwebCategory();
		$this->MTwebGedung           = new MTwebGedung();
		$this->MTwebLokasi           = new MTwebLokasi();
		$this->MTwebLokasiKategori   = new MTwebLokasiKategori();
		$this->MTwebKondisi          = new MTwebKondisi();
		$this->MTwebSatuan           = new MTwebSatuan();
		$this->MTwebHak              = new MTwebHak();
		$this->MTwebPerolehan        = new MTwebPerolehan();
		$this->MTwebPengguna         = new MTwebPengguna();
		$this->MTwebPenggunaKategori = new MTwebPenggunaKategori();   
    }

    public function penempatan_periode(){
    	return view('admin/reports/penempatan_periode');
    }

    public function penempatan_bulan(){
    	return view('admin/reports/penempatan_bulan');
    }

    public function penempatan_lokasi(){
    	$gedung = $this->MTwebGedung->findAll();
    	return view('admin/reports/penempatan_lokasi',[
    		'gedung' => $gedung
    	]);
    }

    public function mutasi_periode(){
    	return view('admin/reports/mutasi_periode');
    }

    public function mutasi_bulan(){
    	return view('admin/reports/mutasi_bulan');
    }

    public function mutasi_lokasi(){
    	$gedung = $this->MTwebGedung->findAll();
    	return view('admin/reports/mutasi_lokasi',[
    		'gedung' => $gedung
    	]);
    }

    public function penempatan_ruangan(){
    	$gedung = $this->MTwebGedung->findAll();
    	return view('admin/reports/penempatan_ruangan',[
    		'gedung' => $gedung
    	]);
    }

    public function penempatan_lainnya(){
    	$gedung = $this->MTwebGedung->findAll();
    	return view('admin/reports/penempatan_lainnya',[
    		'gedung' => $gedung
    	]);
    }		

    public function kib_tanah(){
		$tanah = $this->MInventarisTanah
			->where('idtweb_asset', 11)
			->findAll();

		$mpdf = new \Mpdf\Mpdf();
        $this->response->setContentType('application/pdf');
        $data = view('admin/reports/tanah_index',[
            'tanah'   =>  $tanah
        ]);
        $mpdf->setFooter('{PAGENO}');
        $mpdf->WriteHTML($data);
        $mpdf->Output();
	}

	public function kib_alatbesar(){
		$alatbesar = $this->MInventarisPeralatan
			->where('idtweb_asset', 285)
			->findAll();

		$mpdf = new \Mpdf\Mpdf();
        $this->response->setContentType('application/pdf');
        $data = view('admin/reports/alatbesar_index',[
            'alatbesar'   =>  $alatbesar
        ]);
        $mpdf->setFooter('{PAGENO}');
        $mpdf->WriteHTML($data);
        $mpdf->Output();
	}

	public function kib_alatangkut(){
		$alatbesar = $this->MInventarisPeralatan
			->where('idtweb_asset', 286)
			->findAll();

		$mpdf = new \Mpdf\Mpdf();
        $this->response->setContentType('application/pdf');
        $data = view('admin/reports/alatangkut_index',[
            'alatbesar'   =>  $alatbesar
        ]);
        $mpdf->setFooter('{PAGENO}');
        $mpdf->WriteHTML($data);
        $mpdf->Output();
	}

	public function kib_alatsenjata(){
		$alatsenjata = $this->MInventarisPeralatan
			->where('idtweb_asset', 293)
			->findAll();

		$mpdf = new \Mpdf\Mpdf();
        $this->response->setContentType('application/pdf');
        $data = view('admin/reports/alatsenjata_index',[
            'alatsenjata'   =>  $alatsenjata
        ]);
        $mpdf->setFooter('{PAGENO}');
        $mpdf->WriteHTML($data);
        $mpdf->Output();
	}

	public function kib_bangunangedung(){
		$bangunangedung = $this->MInventarisGedung
			->where('idtweb_asset', 304)
			->findAll();

		$mpdf = new \Mpdf\Mpdf();
        $this->response->setContentType('application/pdf');
        $data = view('admin/reports/bangunangedung_index',[
            'bangunangedung'   =>  $bangunangedung
        ]);
        $mpdf->setFooter('{PAGENO}');
        $mpdf->WriteHTML($data);
        $mpdf->Output();
	}

	public function kib_bangunanair(){
		$bangunanair = $this->MInventarisJalan
			->where('idtweb_asset', 309)
			->findAll();

		$mpdf = new \Mpdf\Mpdf();
        $this->response->setContentType('application/pdf');
        $data = view('admin/reports/bangunanair_index',[
            'bangunanair'   =>  $bangunanair
        ]);
        $mpdf->setFooter('{PAGENO}');
        $mpdf->WriteHTML($data);
        $mpdf->Output();
	}

	public function reports_gedung(){
		$gedung = $this->MTwebGedung->findAll();
		$mpdf = new \Mpdf\Mpdf();
        $this->response->setContentType('application/pdf');
        $data = view('admin/reports/reports_gedung',[
            'gedung'   =>  $gedung
        ]);
        $mpdf->setFooter('{PAGENO}');
        $mpdf->WriteHTML($data);
        $mpdf->Output();
	}

	public function reports_lokasi(){
		$lokasi = $this->MTwebLokasi
					->join('tweb_gedung', 'tweb_gedung.id_gedung = tweb_lokasi.id_gedung', 'left')
					->join('tweb_lokasi_kategori', 'tweb_lokasi_kategori.id_kategori_lokasi = tweb_lokasi.id_kategori_lokasi', 'left')
					->findAll();
		$mpdf = new \Mpdf\Mpdf();
        $this->response->setContentType('application/pdf');
        $data = view('admin/reports/reports_lokasi',[
            'lokasi'   =>  $lokasi
        ]);
        $mpdf->setFooter('{PAGENO}');
        $mpdf->WriteHTML($data);
        $mpdf->Output();
	}

	public function reports_lokasi_kategori(){
		$lokasi_kategori = $this->MTwebLokasiKategori->findAll();
		$mpdf = new \Mpdf\Mpdf();
        $this->response->setContentType('application/pdf');
        $data = view('admin/reports/reports_lokasi_kategori',[
            'lokasi_kategori'   =>  $lokasi_kategori
        ]);
        $mpdf->setFooter('{PAGENO}');
        $mpdf->WriteHTML($data);
        $mpdf->Output();
	}

	public function reports_kategori(){
		$kategori = $this->MTwebCategory->findAll();
		$mpdf = new \Mpdf\Mpdf();
        $this->response->setContentType('application/pdf');
        $data = view('admin/reports/reports_kategori',[
            'kategori'   =>  $kategori
        ]);
        $mpdf->setFooter('{PAGENO}');
        $mpdf->WriteHTML($data);
        $mpdf->Output();
	}

	public function reports_kondisi(){
		$kondisi = $this->MTwebKondisi->findAll();
		$mpdf = new \Mpdf\Mpdf();
        $this->response->setContentType('application/pdf');
        $data = view('admin/reports/reports_kondisi',[
            'kondisi'   =>  $kondisi
        ]);
        $mpdf->setFooter('{PAGENO}');
        $mpdf->WriteHTML($data);
        $mpdf->Output();
	}

	public function reports_satuan(){
		$satuan = $this->MTwebSatuan->findAll();
		$mpdf = new \Mpdf\Mpdf();
        $this->response->setContentType('application/pdf');
        $data = view('admin/reports/reports_satuan',[
            'satuan'   =>  $satuan
        ]);
        $mpdf->setFooter('{PAGENO}');
        $mpdf->WriteHTML($data);
        $mpdf->Output();
	}

	public function reports_hak(){
		$hak = $this->MTwebHak->findAll();
		$mpdf = new \Mpdf\Mpdf();
        $this->response->setContentType('application/pdf');
        $data = view('admin/reports/reports_hak',[
            'hak'   =>  $hak
        ]);
        $mpdf->setFooter('{PAGENO}');
        $mpdf->WriteHTML($data);
        $mpdf->Output();
	}

	public function reports_perolehan(){
		$perolehan = $this->MTwebPerolehan->findAll();
		$mpdf = new \Mpdf\Mpdf();
        $this->response->setContentType('application/pdf');
        $data = view('admin/reports/reports_perolehan',[
            'perolehan'   =>  $perolehan
        ]);
        $mpdf->setFooter('{PAGENO}');
        $mpdf->WriteHTML($data);
        $mpdf->Output();
	}

	public function reports_pengguna(){
		$pengguna = $this->MTwebPengguna
						->join('tweb_pengguna_kategori', 'tweb_pengguna_kategori.id_kategori_pengguna = tweb_pengguna.id_kategori_pengguna', 'left')
						->findAll();
		$mpdf = new \Mpdf\Mpdf();
        $this->response->setContentType('application/pdf');
        $data = view('admin/reports/reports_pengguna',[
            'pengguna'   =>  $pengguna
        ]);
        $mpdf->setFooter('{PAGENO}');
        $mpdf->WriteHTML($data);
        $mpdf->Output();
	}

	public function reports_pengguna_kategori(){
		$pengguna_kategori = $this->MTwebPenggunaKategori->findAll();
		$mpdf = new \Mpdf\Mpdf();
        $this->response->setContentType('application/pdf');
        $data = view('admin/reports/reports_pengguna_kategori',[
            'pengguna_kategori'   =>  $pengguna_kategori
        ]);
        $mpdf->setFooter('{PAGENO}');
        $mpdf->WriteHTML($data);
        $mpdf->Output();
	}
}