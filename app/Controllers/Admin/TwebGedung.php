<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\Admin\MTwebGedung;
use App\Models\Admin\MTwebLokasi;
use App\Models\Admin\MTwebLokasiKategori;
use App\Models\Admin\MTwebPengguna;

class TwebGedung extends BaseController
{
    public function __construct()
    {
        $this->MTwebGedung = new MTwebGedung();
        $this->MTwebLokasi = new MTwebLokasi();
        $this->MTwebLokasiKategori = new MTwebLokasiKategori();
        $this->MTwebPengguna = new MTwebPengguna();
    }

    public function detail($id){
        echo "Detail";
    }

    public function lokasi($id){
        $lokasi = $this->MTwebLokasi->where('id_gedung', $id)->findAll();
        return view('admin/twebgedung/lokasi',[
            'lokasi' => $lokasi
        ]);
    }

    public function index()
    {
        $pengguna = $this->MTwebPengguna->getPengguna();
        $gedung = $this->MTwebGedung->orderBy('id_gedung AS UNSIGNED INTEGER', 'ASC')->detailGedung();
        $lokasi = $this->MTwebLokasi->getLokasi();
        $lokasi_kategori = $this->MTwebLokasiKategori->getLokasiKategori();
        return view("admin/twebgedung/index", [
            "gedung"          => $gedung,
            "pengguna"        => $pengguna,
            "lokasi"          => $lokasi,
            "lokasi_kategori" => $lokasi_kategori,
        ]);
    }

    public function add()
    {
        $pengguna = $this->MTwebPengguna->getPengguna();
        return view("admin/twebgedung/tambahgedung",[
            "pengguna"        => $pengguna,
        ]);
    }

    public function create()
    {
        $valid = $this->validate([
            "foto_gedung" => [
                "label" => "Foto Gedung",
                "rules" =>
                    "max_size[foto_gedung,1024]|is_image[foto_gedung]|mime_in[foto_gedung,image/jpg,image/jpeg,image/gif,image/png,image/webp]",
                "errors" => [
                    "max_size" => "Ukuran {field} Max 2048 KB",
                    "ext_in" => "Format {field} Wajib .PDF",
                ],
            ],
        ]);

        $foto_gedung = $this->request->getFile("foto_gedung");

        if ($foto_gedung->getError() == 4) {
            $file_name = "default.jpg";
        } else {
            $file_name = $foto_gedung->getRandomName();
            $foto_gedung->move("uploads/gedung", $file_name);
        }

        $simpan = $this->MTwebGedung->insertGedung([
            "id_gedung"   => $this->request->getVar("id_gedung"),
            "id_pengguna" => $this->request->getVar("id_pengguna"),
            "nama_gedung" => $this->request->getVar("nama_gedung"),
            "latitude"    => $this->request->getVar("latitude"),
            "longitude"   => $this->request->getVar("longitude"),
            "keterangan"  => $this->request->getVar("keterangan"),
            "foto_gedung" => $file_name,
        ]);

        if ($simpan) {
            session()->setFlashdata(
                "pesan",
                "Data gedung berhasil <b>ditambahkan!</b>"
            );
            return redirect()->back();
        } else {
            echo "Gagal";
        }
    }

    public function edit($id)
    {
        $gedung   = $this->MTwebGedung->getGedung($id);
        $pengguna = $this->MTwebPengguna->findAll();
        return view("admin/twebgedung/editgedung", [
            "gedung"   => $gedung,
            'pengguna' => $pengguna
        ]);
    }

    public function update()
    {
        $id = $this->request->getVar("id_gedung");
        $foto_sebelum = $this->request->getVar("foto_gedung_lama");

        $valid = $this->validate([
            "foto_gedung" => [
                "label" => "Foto Gedung",
                "rules" =>
                    "max_size[foto_gedung,1024]|is_image[foto_gedung]|mime_in[foto_gedung,image/jpg,image/jpeg,image/gif,image/png,image/webp]",
                "errors" => [
                    "max_size" => "Ukuran {field} Max 2048 KB",
                    "ext_in" => "Format {field} Wajib .PDF",
                ],
            ],
        ]);

        $foto_gedung = $this->request->getFile("foto_gedung");
        
        if ($foto_gedung->getError() == 4) {
            $nama_file = $foto_sebelum;
        }else{
            $nama_file = $foto_gedung->getRandomName();
            $foto_gedung->move('uploads/gedung', $nama_file);
            if ($foto_sebelum != "default.jpg") {
            	unlink("uploads/gedung/" . $foto_sebelum);
            }
        }

        if (!$valid) {
            session()->setFlashdata(
                "pesan",
                \Config\Services::validation()->getErrors()
            );
            return redirect()
                ->back()
                ->with("pesan", "Data Gagal Disimpan");
        } else {
            $update = $this->MTwebGedung->updateGedung(
                [
                    "nama_gedung" => $this->request->getVar("nama_gedung"),
                    "id_pengguna" => $this->request->getVar("id_pengguna"),
                    "latitude"    => $this->request->getVar("latitude"),
                    "longitude"   => $this->request->getVar("longitude"),
                    "keterangan"  => $this->request->getVar("keterangan"),
                    "foto_gedung" => $nama_file,
                ],
                $id
            );

            if ($update) {            	
                session()->setFlashdata(
                    "pesan",
                    "Data Gedung Berhasil Diupdate!"
                );
                return redirect()->to(site_url("admin/gedung"));
            }
        }
    }

    public function delete($id)
    {
    	$foto = $this->MTwebGedung->find($id);
    	if ($foto['foto_gedung'] != "default.jpg") {
    		unlink("uploads/gedung/" . $foto['foto_gedung']);
    	}

        $delete = $this->MTwebGedung->deleteGedung($id);

        if ($delete) {
            session()->setFlashdata(
                "pesan",
                "Data Gedung berhasil dihapus!"
            );
            return redirect()->back();
        } else {
            echo "Gagal Delete";
        }
    }
}