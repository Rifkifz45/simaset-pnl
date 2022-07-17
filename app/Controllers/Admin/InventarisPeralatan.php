<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\Admin\MInventarisPeralatan;
use App\Models\Admin\MTwebCategory;
use App\Models\Admin\MTwebKondisi;
use App\Models\Admin\MTwebPerolehan;
use App\Models\Admin\MTransaksiPBitem;
use Config\Services;
use \Hermawan\DataTables\DataTable;

class InventarisPeralatan Extends BaseController{
    public function __construct()
    {
        $this->MInventarisPeralatan = new MInventarisPeralatan();
        $this->MTwebCategory = new MTwebCategory();
        $this->MTwebKondisi = new MTwebKondisi();
        $this->MTwebPerolehan = new MTwebPerolehan();
        $this->MTransaksiPBitem = new MTransaksiPBitem();
    }

    public function index()
    {
        $builder = $this->db->table('inventaris_peralatan')
            ->select('idinventaris_peralatan,kode_barang,nup,nama_barang,merk,tgl_perolehan,id_perolehan,tercatat,uraian_kondisi,nilai_perolehan')
            ->join('tweb_kondisi', 'tweb_kondisi.id_kondisi = inventaris_peralatan.id_kondisi')
            ->orderBy('kode_barang', 'asc')
            ->orderBy('nup', 'asc');

        return view('admin/inventarisperalatan/index',[
            'jlh'       => $builder->countAllResults(),
        ]);
    }

    public function add(){
        $kategori = $this->MTwebCategory
            ->where("golongan", 3)
            ->where("bidang !=", "*")
            ->where("kelompok !=", "*")
            ->where("sub_kelompok !=", "*")
            ->where("sub_sub_kelompok !=", "*")
            ->findAll();

        $kondisi = $this->MTwebKondisi->findAll();
        $perolehan = $this->MTwebPerolehan->findAll();
        return view("admin/inventarisperalatan/add", [
            "kategori" => $kategori,
            "kondisi" => $kondisi,
            "perolehan" => $perolehan,
        ]);
    }

    public function detail($id)
    {
        $detail = $this->MInventarisPeralatan->find($id);
        $kategori = $this->MTwebCategory
            ->where("golongan", 3)
            ->where("bidang !=", "*")
            ->where("kelompok !=", "*")
            ->where("sub_kelompok !=", "*")
            ->where("sub_sub_kelompok !=", "*")
            ->findAll();

        $kondisi = $this->MTwebKondisi->findAll();
        $perolehan = $this->MTwebPerolehan->findAll();

        return view("admin/inventarisperalatan/detail", [
            "detail" => $detail,
            "kategori" => $kategori,
            "kondisi" => $kondisi,
            "perolehan" => $perolehan,
        ]);
    }

    public function edit($id)
    {
        $detail = $this->MInventarisPeralatan->find($id);
        $kategori = $this->MTwebCategory
            ->where("golongan", 3)
            ->where("bidang !=", "*")
            ->where("kelompok !=", "*")
            ->where("sub_kelompok !=", "*")
            ->where("sub_sub_kelompok !=", "*")
            ->findAll();

        $kondisi = $this->MTwebKondisi->findAll();
        $perolehan = $this->MTwebPerolehan->findAll();

        return view("admin/inventarisperalatan/edit", [
            "detail"    => $detail,
            "kategori"  => $kategori,
            "kondisi"   => $kondisi,
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

        $simpan = $this->MInventarisPeralatan->insertInventarisPeralatan([
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
            "no_bpkb" => $this->request->getVar(
                "no_bpkb"
            ),
            "no_polisi" => $this->request->getVar(
                "no_polisi"
            ),
            "pemakai" => $this->request->getVar(
                "pemakai"
            ),
            "created_at"              => date("Y-m-d H:i:s"),
            "created_by"              => $user,   
        ]);

        if ($simpan) {
            session()->setFlashdata(
                "pesan",
                "Category data has been successfully created."
            );
            return $this->response->redirect(site_url("admin/inventaris_tanah"));
        } else {
            echo "Gagal";
        }
    }

    public function update(){
        $id = $this->request->getVar("idinventaris_peralatan");
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

        $update = $this->MInventarisPeralatan->updateInventarisPeralatan([
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
            "no_bpkb" => $this->request->getVar(
                "no_bpkb"
            ),
            "no_polisi" => $this->request->getVar(
                "no_polisi"
            ),
            "pemakai" => $this->request->getVar(
                "pemakai"
            ),
            "updated_at"              => date("Y-m-d H:i:s"),
            "updated_by"              => $user,   
        ], $id);

        if ($update) {
            session()->setFlashdata('pesan', 'Data Peralatan has been successfully updated.');
            return redirect()->back();
        }
    }

    public function delete($id){
        $delete = $this->MInventarisPeralatan->deleteInventarisPeralatan($id);

        if ($delete) {
            session()->setFlashdata('pesan', 'Category data has been successfully deleted.');
            return redirect()->back();
        }else{
            echo "Gagal Delete";
        }
    }

      public function import()
      {
        $opsi = $this->request->getVar('opsi');
        $user = $this->session->get('id_user');

        // OPSI PERALATAN MESIN NONTIK
        if ($opsi == "1") {
        $file = $this->request->getFile("file_excel");

        $ext = $file->getClientExtension();

        if ($ext == "xls") {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        } else if($ext == "xlsx") {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }else{
            echo "<script>alert(\"Ekstensi Tidak Diizinkan. Import Hanya Excel (.Xls, dan .Xlsx)\");process.exit(1);history.back();</script>";
        }

        $spreadsheet = $render->load($file);
        $sheetdata   = $spreadsheet->getActiveSheet()->toArray();
        $count       = count($sheetdata);

        for ($i=1; $i < $count; $i++) { 
        
        $jumlaherror  = 0;
        $jumlahsukses = 0;
        $nup = str_replace(",", "", $sheetdata[$i][5]);

        $kode_barang = $this->MInventarisPeralatan->check($sheetdata[$i][3], $nup);

        //Skip jika ada data yang sama
        if (isset($kode_barang["kode_barang"])) {
            if (($kode_barang['kode_barang'] == $sheetdata[$i][3]) AND ($kode_barang['nup'] == $nup)) {
                $jumlaherror++;
                continue;
            }
        }

        $nilai_perolehan_pertama = str_replace(",", "", $sheetdata[$i][10]);
        $nilai_mutasi            = str_replace(",", "", $sheetdata[$i][11]);
        $nilai_perolehan         = str_replace(",", "", $sheetdata[$i][12]);
        $nilai_penyusutan        = str_replace(",", "", $sheetdata[$i][13]);
        $nilai_buku              = str_replace(",", "", $sheetdata[$i][14]);
        $tgl_psp                 = strtotime($sheetdata[$i][20]);

        // ID BIDANG
        $golongan   = substr($sheetdata[$i][3], 0, 1);
        $bidang     = substr($sheetdata[$i][3], 1, 2);
        $tweb_asset = $this->MInventarisPeralatan->check_id($golongan, $bidang);

        // ID KONDISI
        $kondisi    = $sheetdata[$i][6];
        // $kondisi    = $this->db->table('tweb_kondisi')->where('uraian_kondisi', $kondisi)->get()->getRowArray();
        $kondisi = $this->MInventarisPeralatan->check_kondisi($kondisi);

        $data = array(
            "idtweb_asset"            => $tweb_asset['idtweb_asset'],
            'id_kondisi'              => $kondisi['id_kondisi'],
            'id_perolehan'            => NULL,
            "kode_satker"             => $sheetdata[$i][1],
            "nama_satker"             => $sheetdata[$i][2],
            "kode_barang"             => $sheetdata[$i][3],
            "nama_barang"             => $sheetdata[$i][4],
            "nup"                     => $nup,
            "merk"                    => $sheetdata[$i][7],
            "tgl_rekam_pertama"       => date("Y-m-d", strtotime($sheetdata[$i][8])),
            "tgl_perolehan"           => date("Y-m-d", strtotime($sheetdata[$i][9])),
            "nilai_perolehan_pertama" => $nilai_perolehan_pertama,
            "nilai_mutasi"            => $nilai_mutasi,
            "nilai_perolehan"         => $nilai_perolehan,
            "nilai_penyusutan"        => $nilai_penyusutan,
            "nilai_buku"              => $nilai_buku,
            "kuantitas"               => $sheetdata[$i][15],
            "jumlah_foto"             => $sheetdata[$i][16],
            "status_penggunaan"       => $sheetdata[$i][17],
            "status_pengelolaan"      => $sheetdata[$i][18],
            "no_psp"                  => $sheetdata[$i][19],
            "tgl_psp"                 => date("Y-m-d", $tgl_psp),
            "jumlah_kib"              => $sheetdata[$i][21],
            "created_at"              => date("Y-m-d H:i:s"),
            "created_by"              => $user,
            "updated_at"              => NULL,
            "updated_by"              => NULL,
            "tercatat"                => NULL,
        );

        $this->db->table("inventaris_peralatan")->insert($data);
        $jumlahsukses++;
    }
    session()->setFlashdata("pesan", "$jumlaherror Data Tidak Bisa Disimpan <br> $jumlahsukses Data Berhasil Disimpan");
    return redirect()->to(site_url("admin/inventaris_peralatan"));
    }
    // IMPORT PERALATAN MESIN KHUSUS TIK
    else if ($opsi == "2") {
        $file = $this->request->getFile("file_excel");

        $ext = $file->getClientExtension();

        if ($ext == "xls") {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        } else if($ext == "xlsx") {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }else{
            echo "<script>alert(\"Ekstensi Tidak Diizinkan. Import Hanya Excel (.Xls, dan .Xlsx)\");process.exit(1);history.back();</script>";
        }

        $spreadsheet = $render->load($file);
        $sheetdata   = $spreadsheet->getActiveSheet()->toArray();
        $count       = count($sheetdata);

        for ($i=1; $i < $count; $i++) { 
        
        $jumlaherror  = 0;
        $jumlahsukses = 0;
        $nup = str_replace(",", "", $sheetdata[$i][5]);

        $kode_barang = $this->MInventarisPeralatan->check($sheetdata[$i][3], $nup);

        //Skip jika ada data yang sama
        if (isset($kode_barang["kode_barang"])) {
            if (($kode_barang['kode_barang'] == $sheetdata[$i][3]) AND ($kode_barang['nup'] == $nup)) {
                $jumlaherror++;
                continue;
            }
        }

        $nilai_perolehan_pertama = str_replace(",", "", $sheetdata[$i][10]);
        $nilai_mutasi            = str_replace(",", "", $sheetdata[$i][11]);
        $nilai_perolehan         = str_replace(",", "", $sheetdata[$i][12]);
        $nilai_penyusutan        = str_replace(",", "", $sheetdata[$i][13]);
        $nilai_buku              = str_replace(",", "", $sheetdata[$i][14]);
        $tgl_psp                 = strtotime($sheetdata[$i][20]);

        // ID BIDANG
        $golongan   = substr($sheetdata[$i][3], 0, 1);
        $bidang     = substr($sheetdata[$i][3], 1, 2);
        $tweb_asset = $this->MInventarisPeralatan->check_id($golongan, $bidang);

        // ID KONDISI
        $kondisi    = $sheetdata[$i][6];
        // $kondisi    = $this->db->table('tweb_kondisi')->where('uraian_kondisi', $kondisi)->get()->getRowArray();
        $kondisi = $this->MInventarisPeralatan->check_kondisi($kondisi);

        $data = array(
            "idtweb_asset"            => $tweb_asset['idtweb_asset'],
            'id_kondisi'              => $kondisi['id_kondisi'],
            'id_perolehan'            => NULL,
            "kode_satker"             => $sheetdata[$i][1],
            "nama_satker"             => $sheetdata[$i][2],
            "kode_barang"             => $sheetdata[$i][3],
            "nama_barang"             => $sheetdata[$i][4],
            "nup"                     => $nup,
            "merk"                    => $sheetdata[$i][7],
            "tgl_rekam_pertama"       => date("Y-m-d", strtotime($sheetdata[$i][8])),
            "tgl_perolehan"           => date("Y-m-d", strtotime($sheetdata[$i][9])),
            "nilai_perolehan_pertama" => $nilai_perolehan_pertama,
            "nilai_mutasi"            => $nilai_mutasi,
            "nilai_perolehan"         => $nilai_perolehan,
            "nilai_penyusutan"        => $nilai_penyusutan,
            "nilai_buku"              => $nilai_buku,
            "kuantitas"               => $sheetdata[$i][15],
            "jumlah_foto"             => $sheetdata[$i][16],
            "status_penggunaan"       => $sheetdata[$i][17],
            "status_pengelolaan"      => $sheetdata[$i][18],
            "no_psp"                  => $sheetdata[$i][19],
            "tgl_psp"                 => date("Y-m-d", $tgl_psp),
            "created_at"              => date("Y-m-d H:i:s"),
            "created_by"              => $user,
            "updated_at"              => NULL,
            "updated_by"              => NULL,
            "tercatat"                => NULL,
        );

        $this->db->table("inventaris_peralatan")->insert($data);
        $jumlahsukses++;
    }
    session()->setFlashdata("pesan", "$jumlaherror Data Tidak Bisa Disimpan <br> $jumlahsukses Data Berhasil Disimpan");
    return redirect()->to(site_url("admin/inventaris_peralatan"));
    }
    // PERALATAN MESIN ALAT ANGKUATAN (MOBIL)
    else if ($opsi == "3") {
       $file = $this->request->getFile("file_excel");

        $ext = $file->getClientExtension();

        if ($ext == "xls") {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        } else if($ext == "xlsx") {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }else{
            echo "<script>alert(\"Ekstensi Tidak Diizinkan. Import Hanya Excel (.Xls, dan .Xlsx)\");process.exit(1);history.back();</script>";
        }

        $spreadsheet = $render->load($file);
        $sheetdata   = $spreadsheet->getActiveSheet()->toArray();
        $count       = count($sheetdata);

        for ($i=1; $i < $count; $i++) { 
        
        $jumlaherror  = 0;
        $jumlahsukses = 0;
        $nup = str_replace(",", "", $sheetdata[$i][5]);

        $kode_barang = $this->MInventarisPeralatan->check($sheetdata[$i][3], $nup);

        //Skip jika ada data yang sama
        if (isset($kode_barang["kode_barang"])) {
            if (($kode_barang['kode_barang'] == $sheetdata[$i][3]) AND ($kode_barang['nup'] == $nup)) {
                $jumlaherror++;
                continue;
            }
        }

        $nilai_perolehan_pertama = str_replace(",", "", $sheetdata[$i][10]);
        $nilai_mutasi            = str_replace(",", "", $sheetdata[$i][11]);
        $nilai_perolehan         = str_replace(",", "", $sheetdata[$i][12]);
        $nilai_penyusutan        = str_replace(",", "", $sheetdata[$i][13]);
        $nilai_buku              = str_replace(",", "", $sheetdata[$i][14]);
        $tgl_psp                 = strtotime($sheetdata[$i][20]);

        // ID BIDANG
        $golongan   = substr($sheetdata[$i][3], 0, 1);
        $bidang     = substr($sheetdata[$i][3], 1, 2);
        $tweb_asset = $this->MInventarisPeralatan->check_id($golongan, $bidang);

        // ID KONDISI
        $kondisi    = $sheetdata[$i][6];
        // $kondisi    = $this->db->table('tweb_kondisi')->where('uraian_kondisi', $kondisi)->get()->getRowArray();
        $kondisi = $this->MInventarisPeralatan->check_kondisi($kondisi);

        $data = array(
            "idtweb_asset"            => $tweb_asset['idtweb_asset'],
            'id_kondisi'              => $kondisi['id_kondisi'],
            'id_perolehan'            => NULL,
            "kode_satker"             => $sheetdata[$i][1],
            "nama_satker"             => $sheetdata[$i][2],
            "kode_barang"             => $sheetdata[$i][3],
            "nama_barang"             => $sheetdata[$i][4],
            "nup"                     => $nup,
            "merk"                    => $sheetdata[$i][7],
            "tgl_rekam_pertama"       => date("Y-m-d", strtotime($sheetdata[$i][8])),
            "tgl_perolehan"           => date("Y-m-d", strtotime($sheetdata[$i][9])),
            "nilai_perolehan_pertama" => $nilai_perolehan_pertama,
            "nilai_mutasi"            => $nilai_mutasi,
            "nilai_perolehan"         => $nilai_perolehan,
            "nilai_penyusutan"        => $nilai_penyusutan,
            "nilai_buku"              => $nilai_buku,
            "kuantitas"               => $sheetdata[$i][15],
            "jumlah_foto"             => $sheetdata[$i][16],
            "status_penggunaan"       => $sheetdata[$i][17],
            "status_pengelolaan"      => $sheetdata[$i][18],
            "no_psp"                  => $sheetdata[$i][19],
            "tgl_psp"                 => date("Y-m-d", $tgl_psp),
            "no_bpkb"                 => $sheetdata[$i][21],
            "no_polisi"               => $sheetdata[$i][22],
            "pemakai"                 => $sheetdata[$i][23],
            "jumlah_kib"              => $sheetdata[$i][24],
            "created_at"              => date("Y-m-d H:i:s"),
            "created_by"              => $user,
            "updated_at"              => NULL,
            "updated_by"              => NULL,
            "tercatat"                => NULL,
        );

        $this->db->table("inventaris_peralatan")->insert($data);
        $jumlahsukses++;
    }
    session()->setFlashdata("pesan", "$jumlaherror Data Tidak Bisa Disimpan <br> $jumlahsukses Data Berhasil Disimpan");
    return redirect()->to(site_url("admin/inventaris_peralatan"));
    }
    else{
        echo "Gagal Input";
        }
    }
}