<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\Admin\MInventarisTanah;
use App\Models\Admin\MTwebCategory;
use App\Models\Admin\MTwebKondisi;
use App\Models\Admin\MTwebPerolehan;
use Config\Services;
use \Hermawan\DataTables\DataTable;

class InventarisTanah extends BaseController
{
    public function __construct()
    {
        $this->MInventarisTanah = new MInventarisTanah();
        $this->MTwebCategory = new MTwebCategory();
        $this->MTwebKondisi = new MTwebKondisi();
        $this->MTwebPerolehan = new MTwebPerolehan();
    }

    public function sub($id){
        $idtweb_asset = $this->MTwebCategory->find($id);
        if ($idtweb_asset["golongan"] == 2) {
            $db_select = site_url('admin/statistik/tanahv1/'.$id);
            $return_view = 'admin/statistik/view-tanahv1';
        } else if ($idtweb_asset["golongan"] == 3) {
            $db_select = site_url('admin/statistik/peralatanv1/'.$id);
            $return_view = 'admin/statistik/view-peralatanv1';
        } else if ($idtweb_asset["golongan"] == 4) {
            $return_view = 'admin/statistik/view-gedungv1';
            $db_select = site_url('admin/statistik/gedungv1/'.$id);
        } else if ($idtweb_asset["golongan"] == 5) {
             $return_view = 'admin/statistik/view-jalanv1';
            $db_select = site_url('admin/statistik/jalanv1/'.$id);
        } else if ($idtweb_asset["golongan"] == 6) {
             $return_view = 'admin/statistik/view-assetv1';
            $db_select = site_url('admin/statistik/assetv1/'.$id);
        } else if ($idtweb_asset["golongan"] == 7) {
             $return_view = 'admin/statistik/view-konstruksiv1';
            $db_select = site_url('admin/statistik/konstruksiv1/'.$id);
        } else if ($idtweb_asset["golongan"] == 8) {
             $return_view = 'admin/statistik/view-takberwujudv1';
            $db_select = site_url('admin/statistik/takberwujudv1/'.$id);
        } else{
            $db_select = 0;
        }

        return view($return_view,[
            'detail' => $idtweb_asset,
            'barang' => $db_select
        ]);
    }

    public function detail($id)
    {
        $detail = $this->MInventarisTanah->find($id);
        $kategori = $this->MTwebCategory
            ->where("golongan", 2)
            ->where("bidang !=", "*")
            ->where("kelompok !=", "*")
            ->where("sub_kelompok !=", "*")
            ->where("sub_sub_kelompok !=", "*")
            ->findAll();

        $kondisi = $this->MTwebKondisi->findAll();
        $perolehan = $this->MTwebPerolehan->findAll();

        return view("admin/inventaristanah/detail", [
            "detail" => $detail,
            "kategori" => $kategori,
            "kondisi" => $kondisi,
            "perolehan" => $perolehan,
        ]);
    }

    public function edit($id)
    {
        $detail = $this->MInventarisTanah->find($id);
        $kategori = $this->MTwebCategory
            ->where("golongan", 2)
            ->where("bidang !=", "*")
            ->where("kelompok !=", "*")
            ->where("sub_kelompok !=", "*")
            ->where("sub_sub_kelompok !=", "*")
            ->findAll();

        $kondisi = $this->MTwebKondisi->findAll();
        $perolehan = $this->MTwebPerolehan->findAll();

        return view("admin/inventaristanah/edit", [
            "detail" => $detail,
            "kategori" => $kategori,
            "kondisi" => $kondisi,
            "perolehan" => $perolehan,
        ]);
    }

    public function index()
    {
        $detail = $this->MInventarisTanah->detailInventarisTanah();
        $tanah = $this->MInventarisTanah->getInventarisTanah();
        return view("admin/inventaristanah/index", [
            "tanah" => $tanah,
            "detail" => $detail,
        ]);
    }

    public function add()
    {
        $kategori = $this->MTwebCategory
            ->where("golongan", 2)
            ->where("bidang !=", "*")
            ->where("kelompok !=", "*")
            ->where("sub_kelompok !=", "*")
            ->where("sub_sub_kelompok !=", "*")
            ->findAll();

        $kondisi = $this->MTwebKondisi->findAll();
        $perolehan = $this->MTwebPerolehan->findAll();
        return view("admin/inventaristanah/add", [
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
            "jenis_dokumen" => $this->request->getVar("jenis_dokumen"),
            "kepemilikan" => $this->request->getVar("kepemilikan"),
            "jenis_sertifikat" => $this->request->getVar("jenis_sertifikat"),
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
            "luas_tanah_seluruhnya" => $this->request->getVar(
                "luas_tanah_seluruhnya"
            ),
            "luas_tanah_untuk_bangunan" => $this->request->getVar(
                "luas_tanah_untuk_bangunan"
            ),
            "luas_tanah_untuk_sarana_lingkungan" => $this->request->getVar(
                "luas_tanah_untuk_sarana_lingkungan"
            ),
            "luas_lahan_kosong" => $this->request->getVar(
                "luas_lahan_kosong"
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
            "alamat" => $this->request->getVar(
                "alamat"
            ),
            "rt_rw" => $this->request->getVar(
                "rt_rw"
            ),
            "desa" => $this->request->getVar(
                "desa"
            ),
            "kecamatan" => $this->request->getVar(
                "kecamatan"
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
            "alamat_lainnya" => $this->request->getVar(
                "alamat_lainnya"
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
        $id = $this->request->getVar("idinventaris_tanah");
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

        $update = $this->MInventarisTanah->updateInventarisTanah(
            [
                "idtweb_asset" => $cat,
                "id_kondisi" => $this->request->getVar("id_kondisi"),
                "id_perolehan" => $this->request->getVar("id_perolehan"),
                "kode_satker" => $kode_satker,
                "nama_satker" => $nama_satker,
                "kode_barang" => $kode_barang,
                "nama_barang" => $kode["uraian"],
                "nup" => $this->request->getVar("nup"),
                "jenis_dokumen" => $this->request->getVar("jenis_dokumen"),
                "kepemilikan" => $this->request->getVar("kepemilikan"),
                "jenis_sertifikat" => $this->request->getVar(
                    "jenis_sertifikat"
                ),
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
                "luas_tanah_seluruhnya" => $this->request->getVar(
                    "luas_tanah_seluruhnya"
                ),
                "luas_tanah_untuk_bangunan" => $this->request->getVar(
                    "luas_tanah_untuk_bangunan"
                ),
                "luas_tanah_untuk_sarana_lingkungan" => $this->request->getVar(
                    "luas_tanah_untuk_sarana_lingkungan"
                ),
                "luas_lahan_kosong" => $this->request->getVar(
                    "luas_lahan_kosong"
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
                "alamat" => $this->request->getVar(
                    "alamat"
                ),
                "rt_rw" => $this->request->getVar(
                    "rt_rw"
                ),
                "desa" => $this->request->getVar(
                    "desa"
                ),
                "kecamatan" => $this->request->getVar(
                    "kecamatan"
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
                "alamat_lainnya" => $this->request->getVar(
                    "alamat_lainnya"
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
                "Data Inventaris Tanah has been successfully updated."
            );
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        $delete = $this->MInventarisTanah->deleteInventarisTanah($id);

        if ($delete) {
            session()->setFlashdata(
                "pesan",
                "Data Inventaris Tanah has been successfully deleted."
            );
            return redirect()->back();
        } else {
            echo "Gagal Delete";
        }
    }

    public function import()
    {
        $opsi = $this->request->getVar("opsi");

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

                $kode_barang = $this->MInventarisTanah->check(
                    $excel["3"],
                    $excel["5"]
                );
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

                $nilai_perolehan_pertama = str_replace(",", "", $excel["13"]);
                $nilai_mutasi = str_replace(",", "", $excel["14"]);
                $nilai_perolehan = str_replace(",", "", $excel["15"]);
                $nilai_penyusutan = str_replace(",", "", $excel["16"]);
                $nilai_buku = str_replace(",", "", $excel["17"]);
                $tgl_psp = strtotime($excel["27"]);

                // ID BIDANG
                $golongan = substr($excel["3"], 0, 1);
                $bidang = substr($excel["3"], 1, 2);
                $tweb_asset = $this->MInventarisTanah->check_id(
                    $golongan,
                    $bidang
                );

                // ID KONDISI
                $kondisi = $excel["6"];
                $kondisi = $this->MInventarisTanah->check_kondisi($kondisi);

                $data = [
                    "idtweb_asset" => $tweb_asset["idtweb_asset"],
                    "id_kondisi" => $kondisi["id_kondisi"],
                    "kode_satker" => $excel["1"],
                    "nama_satker" => $excel["2"],
                    "kode_barang" => $excel["3"],
                    "nama_barang" => $excel["4"],
                    "nup" => $excel["5"],
                    "jenis_dokumen" => $excel["7"],
                    "kepemilikan" => $excel["8"],
                    "jenis_sertifikat" => $excel["9"],
                    "merk" => $excel["10"],
                    "tgl_rekam_pertama" => date(
                        "Y-m-d",
                        strtotime($excel["11"])
                    ),
                    "tgl_perolehan" => date("Y-m-d", strtotime($excel["12"])),
                    "nilai_perolehan_pertama" => $nilai_perolehan_pertama,
                    "nilai_mutasi" => $nilai_mutasi,
                    "nilai_perolehan" => $nilai_perolehan,
                    "nilai_penyusutan" => $nilai_penyusutan,
                    "nilai_buku" => $nilai_buku,
                    "kuantitas" => str_replace(",", "", $excel["18"]),
                    "luas_tanah_seluruhnya" => str_replace(
                        ",",
                        "",
                        $excel["19"]
                    ),
                    "luas_tanah_untuk_bangunan" => str_replace(
                        ",",
                        "",
                        $excel["20"]
                    ),
                    "luas_tanah_untuk_sarana_lingkungan" => str_replace(
                        ",",
                        "",
                        $excel["21"]
                    ),
                    "luas_lahan_kosong" => $excel["22"],
                    "jumlah_foto" => $excel["23"],
                    "status_penggunaan" => $excel["24"],
                    "status_pengelolaan" => $excel["25"],
                    "no_psp" => $excel["26"],
                    "tgl_psp" => date("Y-m-d", $tgl_psp),
                    "alamat" => $excel["28"],
                    "rt_rw" => $excel["29"],
                    "desa" => $excel["30"],
                    "kecamatan" => $excel["31"],
                    "kabkot" => $excel["32"],
                    "kode_kabkot" => $excel["33"],
                    "provinsi" => $excel["34"],
                    "kode_provinsi" => $excel["35"],
                    "kode_pos" => $excel["36"],
                    "alamat_lainnya" => $excel["37"],
                    "jumlah_kib" => $excel["38"],
                    "sbsk" => $excel["39"],
                    "optimalisasi" => $excel["40"],
                    "created_at" => date("Y-m-d H:i:s"),
                    "created_by" => "Admin",
                    "updated_at" => null,
                    "updated_by" => null,
                    "tercatat" => null,
                ];

                $this->db->table("inventaris_tanah")->insert($data);
                $jumlahsukses++;
            }

            session()->setFlashdata(
                "pesan",
                "$jumlaherror Data Tidak Bisa Disimpan <br> $jumlahsukses Data Berhasil Disimpan"
            );
            return redirect()->to(site_url("admin/inventaris_tanah"));
        } else {
            echo "Gagal Input";
        }
    }
}
