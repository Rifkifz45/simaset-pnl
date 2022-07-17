<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\Admin\MInventarisGedung;
use App\Models\Admin\MTwebCategory;
use App\Models\Admin\MTwebKondisi;
use App\Models\Admin\MTwebPerolehan;

class InventarisGedung Extends BaseController{
	public function __construct()
	{
		$this->MInventarisGedung = new MInventarisGedung();
        $this->MTwebCategory = new MTwebCategory();
        $this->MTwebKondisi = new MTwebKondisi();
        $this->MTwebPerolehan = new MTwebPerolehan();
	}

	public function index()
	{
        $builder = $this->db->table('inventaris_gedung')
            ->select('idinventaris_gedung,kode_barang,nup,nama_barang,merk,tgl_perolehan,id_perolehan,tercatat,uraian_kondisi,nilai_perolehan')
            ->join('tweb_kondisi', 'tweb_kondisi.id_kondisi = inventaris_gedung.id_kondisi')
            ->orderBy('kode_barang', 'asc')
            ->orderBy('nup', 'asc');

		return view('admin/inventarisgedung/index',[
			'jlh'    => $builder->countAllResults()
		]);
	}

    public function add()
    {
        $kategori = $this->MTwebCategory
            ->where("golongan", 4)
            ->where("bidang !=", "*")
            ->where("kelompok !=", "*")
            ->where("sub_kelompok !=", "*")
            ->where("sub_sub_kelompok !=", "*")
            ->findAll();

        $kondisi = $this->MTwebKondisi->findAll();
        $perolehan = $this->MTwebPerolehan->findAll();
        return view("admin/inventarisgedung/add", [
            "kategori" => $kategori,
            "kondisi" => $kondisi,
            "perolehan" => $perolehan,
        ]);
    }

     public function detail($id)
    {
        $detail = $this->MInventarisGedung->find($id);
        $kategori = $this->MTwebCategory
            ->where("golongan", 4)
            ->where("bidang !=", "*")
            ->where("kelompok !=", "*")
            ->where("sub_kelompok !=", "*")
            ->where("sub_sub_kelompok !=", "*")
            ->findAll();

        $kondisi = $this->MTwebKondisi->findAll();
        $perolehan = $this->MTwebPerolehan->findAll();

        return view("admin/inventarisgedung/detail", [
            "detail" => $detail,
            "kategori" => $kategori,
            "kondisi" => $kondisi,
            "perolehan" => $perolehan,
        ]);
    }

    public function edit($id)
    {
        $detail = $this->MInventarisGedung->find($id);
        $kategori = $this->MTwebCategory
            ->where("golongan", 4)
            ->where("bidang !=", "*")
            ->where("kelompok !=", "*")
            ->where("sub_kelompok !=", "*")
            ->where("sub_sub_kelompok !=", "*")
            ->findAll();

        $kondisi = $this->MTwebKondisi->findAll();
        $perolehan = $this->MTwebPerolehan->findAll();

        return view("admin/inventarisgedung/edit", [
            "detail" => $detail,
            "kategori" => $kategori,
            "kondisi" => $kondisi,
            "perolehan" => $perolehan,
        ]);
    }

    public function create()
    {
        $cat = $this->request->getVar("idtweb_asset");
        $kode_satker = "023180600677594000KD";
        $nama_satker = "POLITEKNIK NEGERI LHOKSEUMAWE";
        $kode = $this->MTwebCategory->find($cat);
        $user = $this->session->get('id_user');

        $kode_barang =
            $kode["golongan"] .
            $kode["bidang"] .
            $kode["kelompok"] .
            $kode["sub_kelompok"] .
            $kode["sub_sub_kelompok"];

        $simpan = $this->MInventarisTanah->insertInventarisTanah([
            "idtweb_asset" => $cat,
            "id_kondisi" => $this->request->getVar("id_kondisi"),
            "id_perolehan" => $this->request->getVar("id_perolehan"),
            "kode_satker" => $kode_satker,
            "nama_satker" => $nama_satker,
            "kode_barang" => $kode_barang,
            "nama_barang" => $kode["uraian"],
            "nup" => $this->request->getVar("nup"),
            "dokumen" => $this->request->getVar("dokumen"),
            "merk" => $this->request->getVar("merk"),
            "tgl_rekam_pertama" => $this->request->getVar(
                    "tgl_rekam_pertama"
                ),
            "tgl_perolehan" => $this->request->getVar("tgl_perolehan"),
            "nilai_perolehan_pertama" => $this->request->getVar(
                "nilai_perolehan_pertama"
            ),
            "nilai_mutasi" => $this->request->getVar("nilai_mutasi"),
            "nilai_perolehan" => $this->request->getVar("nilai_perolehan"),
            "nilai_penyusutan" => $this->request->getVar(
                "nilai_penyusutan"
            ),
            "nilai_buku" => $this->request->getVar("nilai_buku"),
            "kuantitas" => $this->request->getVar("kuantitas"),
            "luas_bangunan" => $this->request->getVar(
                "luas_bangunan"
            ),
            "luas_dasar_bangunan" => $this->request->getVar(
                "luas_dasar_bangunan"
            ),
            "jumlah_lantai" => $this->request->getVar(
                "jumlah_lantai"
            ),
            "jumlah_foto" => $this->request->getVar(
                "jumlah_foto"
            ),
             "jalan" => $this->request->getVar(
                "jalan"
            ),
            "kabkot" => $this->request->getVar(
                "kabkot"
            ),
            "kode_kabkot" => $this->request->getVar(
                "kode_kabkot"
            ),
            "provinsi" => $this->request->getVar(
                "provinsi"
            ),
            "kode_provinsi" => $this->request->getVar(
                "kode_provinsi"
            ),
            "kode_pos" => $this->request->getVar(
                "kode_pos"
            ),
            "status_penggunaan" => $this->request->getVar(
                "status_penggunaan"
            ),
            "status_pengelolaan" => $this->request->getVar(
                "status_pengelolaan"
            ),
            "no_psp" => $this->request->getVar(
                "no_psp"
            ),
            "tgl_psp" => $this->request->getVar(
                "tgl_psp"
            ),
            "jumlah_kib" => $this->request->getVar(
                "jumlah_kib"
            ),
            "sbsk" => $this->request->getVar(
                "sbsk"
            ),
            "optimalisasi" => $this->request->getVar(
                "optimalisasi"
            ),
            "created_at"              => date("Y-m-d H:i:s"),
            "created_by"              => $user,   
        ]);

        if ($simpan) {
            session()->setFlashdata(
                "pesan",
                "Data Peralatan has been successfully created."
            );
            return $this->response->redirect(site_url("admin/inventaris_peralatan"));
        } else {
            echo "Gagal";
        }
    }

    public function update()
    {
        $id = $this->request->getVar("idinventaris_gedung");
        $cat = $this->request->getVar("idtweb_asset");
        $kode_satker = "023180600677594000KD";
        $nama_satker = "POLITEKNIK NEGERI LHOKSEUMAWE";
        $kode = $this->MTwebCategory->find($cat);
        $user = $this->session->get('id_user');

        $kode_barang =
            $kode["golongan"] .
            $kode["bidang"] .
            $kode["kelompok"] .
            $kode["sub_kelompok"] .
            $kode["sub_sub_kelompok"];

        $update = $this->MInventarisGedung->updateInventarisGedung(
            [
            "idtweb_asset" => $cat,
            "id_kondisi" => $this->request->getVar("id_kondisi"),
            "id_perolehan" => $this->request->getVar("id_perolehan"),
            "kode_satker" => $kode_satker,
            "nama_satker" => $nama_satker,
            "kode_barang" => $kode_barang,
            "nama_barang" => $kode["uraian"],
            "nup" => $this->request->getVar("nup"),
            "dokumen" => $this->request->getVar("dokumen"),
            "merk" => $this->request->getVar("merk"),
            "tgl_rekam_pertama" => $this->request->getVar(
                    "tgl_rekam_pertama"
                ),
            "tgl_perolehan" => $this->request->getVar("tgl_perolehan"),
            "nilai_perolehan_pertama" => $this->request->getVar(
                "nilai_perolehan_pertama"
            ),
            "nilai_mutasi" => $this->request->getVar("nilai_mutasi"),
            "nilai_perolehan" => $this->request->getVar("nilai_perolehan"),
            "nilai_penyusutan" => $this->request->getVar(
                "nilai_penyusutan"
            ),
            "nilai_buku" => $this->request->getVar("nilai_buku"),
            "kuantitas" => $this->request->getVar("kuantitas"),
            "luas_bangunan" => $this->request->getVar(
                "luas_bangunan"
            ),
            "luas_dasar_bangunan" => $this->request->getVar(
                "luas_dasar_bangunan"
            ),
            "jumlah_lantai" => $this->request->getVar(
                "jumlah_lantai"
            ),
            "jumlah_foto" => $this->request->getVar(
                "jumlah_foto"
            ),
             "jalan" => $this->request->getVar(
                "jalan"
            ),
            "kabkot" => $this->request->getVar(
                "kabkot"
            ),
            "kode_kabkot" => $this->request->getVar(
                "kode_kabkot"
            ),
            "provinsi" => $this->request->getVar(
                "provinsi"
            ),
            "kode_provinsi" => $this->request->getVar(
                "kode_provinsi"
            ),
            "kode_pos" => $this->request->getVar(
                "kode_pos"
            ),
            "status_penggunaan" => $this->request->getVar(
                "status_penggunaan"
            ),
            "status_pengelolaan" => $this->request->getVar(
                "status_pengelolaan"
            ),
            "no_psp" => $this->request->getVar(
                "no_psp"
            ),
            "tgl_psp" => $this->request->getVar(
                "tgl_psp"
            ),
            "jumlah_kib" => $this->request->getVar(
                "jumlah_kib"
            ),
            "sbsk" => $this->request->getVar(
                "sbsk"
            ),
            "optimalisasi" => $this->request->getVar(
                "optimalisasi"
            ),
            "updated_at"              => date("Y-m-d H:i:s"),
            "updated_by"              => $user,               
            ],
            $id
        );

        if ($update) {
            session()->setFlashdata(
                "pesan",
                "Data Inventaris Gedung has been successfully updated."
            );
            return redirect()->back();
        }
    }

     public function delete($id)
     {
        $delete = $this->MInventarisGedung->deleteInventarisGedung($id);

        if ($delete) {
            session()->setFlashdata(
                "pesan",
                "Data Inventaris Gedung has been successfully deleted."
            );
            return redirect()->back();
        } else {
            echo "Gagal Delete";
        }
    }

	  public function import()
	  {
        $opsi = $this->request->getVar('opsi');

        if ($opsi == "1") {
        $file = $this->request->getFile("file_excel");

        $ext = $file->getClientExtension();

        if ($ext == "xls") {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        } else {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }

        $spreadsheet = $render->load($file);
        $sheet = $spreadsheet->getActiveSheet()->toArray();

        $jumlaherror = 0;
        $jumlahsukses = 0;

        foreach ($sheet as $x => $excel) {

            if ($x == 0) {
                continue;
            }

            $kode_barang = $this->MInventarisGedung->check($excel["3"], $excel["5"]);
            //Skip jika ada data yang sama

            if (isset($kode_barang["kode_barang"])) {
                if (
                    $excel["3"] == $kode_barang["kode_barang"] and
                    $excel["5"] == $kode_barang["nup"]
                ) {
                    $jumlaherror++;
                    continue;
                }
            }

            $nilai_perolehan_pertama = str_replace(",", "", $excel["11"]);
            $nilai_mutasi            = str_replace(",", "", $excel["12"]);
            $nilai_perolehan         = str_replace(",", "", $excel["13"]);
            $nilai_penyusutan        = str_replace(",", "", $excel["14"]);
            $nilai_buku              = str_replace(",", "", $excel["15"]);
            $tgl_psp                 = strtotime($excel["30"]);

            // ID BIDANG
            $golongan   = substr($excel["3"], 0, 1);
            $bidang     = substr($excel["3"], 1, 2);
            $tweb_asset = $this->MInventarisGedung->check_id($golongan, $bidang);

            // ID KONDISI
            $kondisi    = $excel["6"];
            $kondisi    = $this->MInventarisGedung->check_kondisi($kondisi);

            $data = [
                "idtweb_asset"            => $tweb_asset['idtweb_asset'],
                'id_kondisi'              => $kondisi['id_kondisi'],
                "kode_satker"             => $excel["1"],
                "nama_satker"             => $excel["2"],
                "kode_barang"             => $excel["3"],
                "nama_barang"             => $excel["4"],
                "nup"                     => $excel["5"],
                "dokumen"                 => $excel["7"],
                "merk"                    => $excel["8"],
                "tgl_rekam_pertama"       => date("Y-m-d", strtotime($excel["9"])),
                "tgl_perolehan"           => date("Y-m-d", strtotime($excel["10"])),
                "nilai_perolehan_pertama" => $nilai_perolehan_pertama,
                "nilai_mutasi"            => $nilai_mutasi,
                "nilai_perolehan"         => $nilai_perolehan,
                "nilai_penyusutan"        => $nilai_penyusutan,
                "nilai_buku"              => $nilai_buku,
                "kuantitas"               => str_replace(",", "", $excel["16"]),
                "luas_bangunan"           => str_replace(",", "", $excel["17"]),
                "luas_dasar_bangunan"     => str_replace(",", "", $excel["18"]),
                "jumlah_lantai"           => $excel["19"],
                "jumlah_foto"             => $excel["20"],
                "jalan"                   => $excel["21"],
                "kode_kabkot"             => $excel["22"],
                "uraian_kabkot"           => $excel["23"],
                "kode_provinsi"           => $excel["24"],
                "uraian_provinsi"         => $excel["25"],
                "kode_pos"                => $excel["26"],
                "status_penggunaan"       => $excel["27"],
                "status_pengelolaan"      => $excel["28"],
                "no_psp"                  => $excel["29"],
                "tgl_psp"                 => date("Y-m-d", $tgl_psp),
                "jumlah_kib"              => $excel["31"],
                "sbsk"                    => $excel["32"],
                "optimalisasi"            => $excel["33"],
                "created_at"              => date("Y-m-d H:i:s"),
                "created_by"              => "Admin",
                "updated_at"              => NULL,
                "updated_by"              => NULL,
                "tercatat"                => NULL,
            ];

            $this->db->table("inventaris_gedung")->insert($data);
            $jumlahsukses++;
        }

        session()->setFlashdata("pesan", "$jumlaherror Data Tidak Bisa Disimpan <br> $jumlahsukses Data Berhasil Disimpan"
        );
        return redirect()->to(site_url("admin/inventaris_gedung"));       
        }else{
            echo "Gagal Input";
        }
    }
}