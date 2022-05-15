<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\Admin\MTwebHak;

class TwebHak Extends BaseController{
	public function __construct()
	{
		$this->MTwebHak = new MTwebHak();
	}

	public function index()
	{
		$hak    = $this->MTwebHak->getHak();
		return view('admin/twebhak/index',[
			'hak'		=> $hak,
		]);
	}

	public function create()
	{
        $simpan = $this->MTwebHak->insertHak([
            'id_hak'          => $this->request->getVar('id_hak'),
            'uraian_hak'      => $this->request->getVar('uraian_hak'),
        ]);

        if ($simpan) {
        	session()->setFlashdata('pesan', 'Mastery data has been successfully created.');
        	return $this->response->redirect(site_url('admin/hak'));
        }else{
        	echo "Gagal";
        }
	}

	public function update(){
		$id = $this->request->getVar('id_hak');

		$update = $this->MTwebHak->updateHak([
            'uraian_hak'      => $this->request->getVar('uraian_hak'),
        ], $id);

		if ($update) {
			session()->setFlashdata('pesan', 'Mastery data has been successfully updated.');
			return redirect()->back();
		}
	}

	public function delete($id){
		$delete = $this->MTwebHak->deleteHak($id);

		if ($delete) {
			session()->setFlashdata('pesan', 'Mastery data has been successfully deleted.');
			return redirect()->back();
		}else{
			echo "Gagal Delete";
		}
	}
}