<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\Admin\MTwebPengguna;
use App\Models\Admin\MTwebPenggunaKategori;

class TwebPengguna Extends BaseController{
	public function __construct()
	{
		$this->MTwebPengguna = new MTwebPengguna();
		$this->MTwebPenggunaKategori = new MTwebPenggunaKategori();
	}

	public function index()
	{
		$detail      = $this->MTwebPengguna->getDetail();
		$pengguna    = $this->MTwebPengguna->getPengguna();
		$kategori 	 = $this->MTwebPenggunaKategori->getPenggunaKategori();
		return view('admin/twebpengguna/index',[
			'pengguna'		=> $pengguna,
			'detail'		=> $detail,
			'kategori'		=> $kategori
		]);
	}

	public function create()
	{
		$valid = $this->validate([
            "foto_pengguna" => [
                "label" => "Foto Pengguna",
                "rules" =>
                    "max_size[foto_pengguna,1024]|is_image[foto_pengguna]|mime_in[foto_pengguna,image/jpg,image/jpeg,image/gif,image/png,image/webp]",
                "errors" => [
                    "max_size" => "Ukuran {field} Max 2048 KB",
                    "ext_in" => "Format {field} Wajib Image",
                ],
            ],
        ]);

        $foto_pengguna = $this->request->getFile("foto_pengguna");

        if ($foto_pengguna->getError() == 4) {
            $file_name = "default.jpg";
        } else {
            $file_name = $foto_pengguna->getRandomName();
            $foto_pengguna->move("uploads/pengguna", $file_name);
        }

        if (!$valid) {
            session()->setFlashdata(
                "pesan",
                \Config\Services::validation()->getErrors()
            );
            return redirect()
                ->back()
                ->with("pesan", "Data Gagal Disimpan");
        }else{
    	$simpan = $this->MTwebPengguna->insertPengguna([
        'id_kategori_pengguna'   => $this->request->getVar('id_kategori_pengguna'),
        'nama_pengguna'          => $this->request->getVar('nama_pengguna'),
        'nip'                    => $this->request->getVar('nip'),
        'pangkat'                => $this->request->getVar('pangkat'),
        'golongan'               => $this->request->getVar('golongan'),
        'jabatan'                => $this->request->getVar('jabatan'),
        'nip'                    => $this->request->getVar('nip'),
        'foto_pengguna'          => $file_name
        ]);


        if ($simpan) {
        	session()->setFlashdata('pesan', 'Data Pengguna Barang has been successfully created.');
        	return $this->response->redirect(site_url('admin/pengguna'));
        }else{
        	echo "Gagal";
        }
        }
	}

	public function update(){
		$id = $this->request->getVar('id_pengguna');
		$foto_sebelum = $this->request->getVar("fotoLama");

		$valid = $this->validate([
            "foto_pengguna" => [
                "label" => "Foto Lokasi",
                "rules" =>
                    "max_size[foto_pengguna,1024]|is_image[foto_pengguna]|mime_in[foto_pengguna,image/jpg,image/jpeg,image/gif,image/png,image/webp]",
                "errors" => [
                    "max_size" => "Ukuran {field} Max 2048 KB",
                    "ext_in" => "Format {field} Wajib Image",
                ],
            ],
        ]);

        $foto_pengguna = $this->request->getFile("foto_pengguna");
        
        if ($foto_pengguna->getError() == 4) {
            $nama_file = $foto_sebelum;
        }else{
            $nama_file = $foto_pengguna->getRandomName();
            $foto_pengguna->move('uploads/pengguna', $nama_file);
            if ($foto_sebelum != "default.jpg") {
                unlink("uploads/pengguna/" . $foto_sebelum);
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
        }else{
        	$update = $this->MTwebPengguna->updatePengguna([
            'id_kategori_pengguna'   => $this->request->getVar('id_kategori_pengguna'),
            'nama_pengguna'          => $this->request->getVar('nama_pengguna'),
            'nip'                    => $this->request->getVar('nip'),
            'pangkat'                => $this->request->getVar('pangkat'),
            'golongan'               => $this->request->getVar('golongan'),
            'jabatan'                => $this->request->getVar('jabatan'),
            'foto_pengguna'          => $nama_file
        ], $id);

		if ($update) {
			session()->setFlashdata('pesan', 'Data Pengguna Barang has been successfully updated.');
			return redirect()->back();
		}
        }
	}

	public function delete($id){
		$foto = $this->MTwebPengguna->find($id);
        if ($foto['foto_pengguna'] != "default.jpg") {
            unlink("uploads/pengguna/" . $foto['foto_pengguna']);
        }

		$delete = $this->MTwebPengguna->deletePengguna($id);

		if ($delete) {
			session()->setFlashdata('pesan', 'Data Pengguna Barang has been successfully deleted.');
			return redirect()->back();
		}else{
			echo "Gagal Delete";
		}
	}
}