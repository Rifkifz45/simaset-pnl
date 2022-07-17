<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\Admin\MInventarisJalan;
use App\Models\Admin\MTwebCategory;
use App\Models\Admin\MTwebKondisi;
use App\Models\Admin\MTwebPerolehan;

class InventarisJalan Extends BaseController{
	public function __construct()
	{
		$this->MInventarisJalan = new MInventarisJalan();
        $this->MTwebCategory = new MTwebCategory();
        $this->MTwebKondisi = new MTwebKondisi();
        $this->MTwebPerolehan = new MTwebPerolehan();
	}

	public function index()
	{
        $builder = $this->db->table('inventaris_jalan')
            ->select('idinventaris_jalan,kode_barang,nup,nama_barang,merk,tgl_perolehan,id_perolehan,tercatat,uraian_kondisi,nilai_perolehan,luas_bangunan,luas_dasar')
            ->join('tweb_kondisi', 'tweb_kondisi.id_kondisi = inventaris_jalan.id_kondisi')
            ->orderBy('kode_barang', 'asc')
            ->orderBy('nup', 'asc');

		return view('admin/inventarisjalan/index',[
			'jlh'    => $builder->countAllResults()
		]);
	}

     public function add()
    {
        $kategori = $this->MTwebCategory
            ->where("golongan", 5)
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

        $simpan = $this->MInventarisJalan->insertInventarisJalan([
            "idtweb_asset" => $cat,
            "id_kondisi" => $this->request->getVar("id_kondisi"),
            "id_perolehan" => $this->request->getVar("id_perolehan"),
            "kode_satker" => $kode_satker,
            "nama_satker" => $nama_satker,
            "kode_barang" => $kode_barang,
            "nama_barang" => $kode["uraian"],
            "nup" => $this->request->getVar("nup"),
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
            "luas_dasar" => $this->request->getVar(
                "luas_dasar_bangunan"
            ),
            "jumlah_foto" => $this->request->getVar(
                "jumlah_foto"
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
            "created_at"              => date("Y-m-d H:i:s"),
            "created_by"              => $user,   
        ]);

        if ($simpan) {
            session()->setFlashdata(
                "pesan",
                "Data Jalan dan Irigasi has been successfully created."
            );
            return $this->response->redirect(site_url("admin/inventaris_jalan"));
        } else {
            echo "Gagal";
        }
    }

    public function edit($id)
    {
        $detail = $this->MInventarisJalan->find($id);
        $kategori = $this->MTwebCategory
            ->where("golongan", 5)
            ->where("bidang !=", "*")
            ->where("kelompok !=", "*")
            ->where("sub_kelompok !=", "*")
            ->where("sub_sub_kelompok !=", "*")
            ->findAll();

        $kondisi = $this->MTwebKondisi->findAll();
        $perolehan = $this->MTwebPerolehan->findAll();

        return view("admin/inventarisjalan/edit", [
            "detail" => $detail,
            "kategori" => $kategori,
            "kondisi" => $kondisi,
            "perolehan" => $perolehan,
        ]);
    }

    public function update()
    {
        $id = $this->request->getVar("idinventaris_jalan");
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

        $update = $this->MInventarisJalan->updateInventarisJalan(
            [
            "idtweb_asset" => $cat,
            "id_kondisi" => $this->request->getVar("id_kondisi"),
            "id_perolehan" => $this->request->getVar("id_perolehan"),
            "kode_satker" => $kode_satker,
            "nama_satker" => $nama_satker,
            "kode_barang" => $kode_barang,
            "nama_barang" => $kode["uraian"],
            "nup" => $this->request->getVar("nup"),
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
            "luas_dasar" => $this->request->getVar(
                "luas_dasar_bangunan"
            ),
            "jumlah_foto" => $this->request->getVar(
                "jumlah_foto"
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
        $delete = $this->MInventarisJalan->deleteInventarisJalan($id);

        if ($delete) {
            session()->setFlashdata(
                "pesan",
                "Data Inventaris Jalan has been successfully deleted."
            );
            return redirect()->back();
        } else {
            echo "Gagal Delete";
        }
    }

     public function detail($id)
    {
        $detail = $this->MInventarisJalan->find($id);
        $kategori = $this->MTwebCategory
            ->where("golongan", 5)
            ->where("bidang !=", "*")
            ->where("kelompok !=", "*")
            ->where("sub_kelompok !=", "*")
            ->where("sub_sub_kelompok !=", "*")
            ->findAll();

        $kondisi = $this->MTwebKondisi->findAll();
        $perolehan = $this->MTwebPerolehan->findAll();

        return view("admin/inventarisjalan/detail", [
            "detail" => $detail,
            "kategori" => $kategori,
            "kondisi" => $kondisi,
            "perolehan" => $perolehan,
        ]);
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

            $kode_barang = $this->MInventarisJalan->check($excel["3"], $excel["5"]);
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

            $nilai_perolehan_pertama = str_replace(",", "", $excel["10"]);
            $nilai_mutasi            = str_replace(",", "", $excel["11"]);
            $nilai_perolehan         = str_replace(",", "", $excel["12"]);
            $nilai_penyusutan        = str_replace(",", "", $excel["13"]);
            $nilai_buku              = str_replace(",", "", $excel["14"]);
            $tgl_psp                 = strtotime($excel["22"]);

            // ID BIDANG
            $golongan   = substr($excel["3"], 0, 1);
            $bidang     = substr($excel["3"], 1, 2);
            $tweb_asset = $this->MInventarisJalan->check_id($golongan, $bidang);

            // ID KONDISI
            $kondisi    = $excel["6"];
            $kondisi    = $this->MInventarisJalan->check_kondisi($kondisi);

            $data = [
                "idtweb_asset"            => $tweb_asset['idtweb_asset'],
                'id_kondisi'              => $kondisi['id_kondisi'],
                "kode_satker"             => $excel["1"],
                "nama_satker"             => $excel["2"],
                "kode_barang"             => $excel["3"],
                "nama_barang"             => $excel["4"],
                "nup"                     => $excel["5"],
                "merk"                    => $excel["7"],
                "tgl_rekam_pertama"       => date("Y-m-d", strtotime($excel["8"])),
                "tgl_perolehan"           => date("Y-m-d", strtotime($excel["9"])),
                "nilai_perolehan_pertama" => $nilai_perolehan_pertama,
                "nilai_mutasi"            => $nilai_mutasi,
                "nilai_perolehan"         => $nilai_perolehan,
                "nilai_penyusutan"        => $nilai_penyusutan,
                "nilai_buku"              => $nilai_buku,
                "kuantitas"               => str_replace(",", "", $excel["15"]),
                "luas_bangunan"           => str_replace(",", "", $excel["16"]),
                "luas_dasar"              => str_replace(",", "", $excel["17"]),
                "jumlah_foto"             => $excel["18"],
                "status_penggunaan"       => $excel["19"],
                "status_pengelolaan"      => $excel["20"],
                "no_psp"                  => $excel["21"],
                "tgl_psp"                 => date("Y-m-d", $tgl_psp),
                "jumlah_kib"              => $excel["23"],
                "created_at"              => date("Y-m-d H:i:s"),
                "created_by"              => "Admin",
                "updated_at"              => NULL,
                "updated_by"              => NULL,
                "tercatat"                => NULL,
            ];

            $this->db->table("inventaris_jalan")->insert($data);
            $jumlahsukses++;
        }

        session()->setFlashdata("pesan", "$jumlaherror Data Tidak Bisa Disimpan <br> $jumlahsukses Data Berhasil Disimpan"
        );
        return redirect()->to(site_url("admin/inventaris_jalan"));       
        }else{
            echo "Gagal Input";
        }
    }
}