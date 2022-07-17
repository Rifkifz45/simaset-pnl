<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\Admin\MTwebPerolehan;

class Twebperolehan Extends BaseController{
	public function __construct()
	{
		$this->MTwebPerolehan = new MTwebPerolehan();
	}

	public function index()
	{
		$perolehan    = $this->MTwebPerolehan->getPerolehan();
		return view('admin/twebperolehan/index',[
			'perolehan'		=> $perolehan,
		]);
	}

	public function create()
	{
        $simpan = $this->MTwebPerolehan->insertPerolehan([
            'id_perolehan'          => $this->request->getVar('id_perolehan'),
            'uraian_perolehan'      => $this->request->getVar('uraian_perolehan'),
        ]);

        if ($simpan) {
        	session()->setFlashdata('pesan', 'Data Perolehan has been successfully created.');
        	return $this->response->redirect(site_url('admin/perolehan'));
        }else{
        	echo "Gagal";
        }
	}

	public function update(){
		$id = $this->request->getVar('id_perolehan');

		$update = $this->MTwebPerolehan->updatePerolehan([
            'uraian_perolehan'      => $this->request->getVar('uraian_perolehan'),
        ], $id);

		if ($update) {
			session()->setFlashdata('pesan', 'Data Perolehan has been successfully updated.');
			return redirect()->back();
		}
	}

	public function delete($id){
		$delete = $this->MTwebPerolehan->deletePerolehan($id);

		if ($delete) {
			session()->setFlashdata('pesan', 'Data Perolehan has been successfully deleted.');
			return redirect()->back();
		}else{
			echo "Gagal Delete";
		}
	}
}