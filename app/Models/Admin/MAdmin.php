<?php

namespace App\Controllers\Admin;
use App\Models\Admin\DtsModel;
use App\Models\Admin\DtsModel1;
use App\Models\Admin\DtsModel2;
use App\Models\Admin\CategoryModel;
use App\Controllers\BaseController;
use Config\Services;

class Admin extends BaseController
{
    public function __construct($foo = null)
    {
        $this->CategoryModel = new CategoryModel();
    }

    public function index()
    {
        return view('admin/index');
    }

    public function datatable(){
        $request = Services::request();
        if ($request->isAJAX()) {
            
            $datamodel = new DtsModel($request, $this->request->getVar('id'));

            if ($request->getMethod(true) == 'POST') {
                $lists = $datamodel->get_datatables();
                $data = [];
                $no = $request->getPost("start");
                foreach ($lists as $list) {
                $no++;
                $row = [];

                $row[] = $no;
                $row[] = $list->kode_barang;
                $row[] = $list->nup;
                $row[] = $list->nama_barang;
                $row[] = $list->kondisi;
                $row[] = $list->merk_tipe;
                $row[] = date('j F Y', strtotime($list->tgl_rekam_pertama));
                $row[] = date('j F Y', strtotime($list->tgl_perolehan));
                $row[] = 'Rp. ' . number_format($list->nilai_perolehan_pertama);
                $row[] = 'Rp. ' . number_format($list->nilai_mutasi);
                $row[] = 'Rp. ' . number_format($list->nilai_perolehan);
                $row[] = 'Rp. ' . number_format($list->nilai_penyusutan);
                $row[] = 'Rp. ' . number_format($list->nilai_buku);
                $row[] = $list->kuantitas;
                $row[] = $list->no_psp;
                $row[] = date('j F Y', strtotime($list->tgl_psp));
                $row[] = '<a type="button" style="padding: 5px 5px 5px 5px; height: auto; width: auto" class="btn btn-warning btn-icon btn-xs" href="#" onClick="alert(\'Not activated yet\')" title="Edit Data"><i class="fa fa-edit fa-lg"></i></a>';

                $data[] = $row;
            }
            $output = [
                "draw" => $request->getPost('draw'),
                "recordsTotal" => $datamodel->count_all(),
                "recordsFiltered" => $datamodel->count_filtered(),
                "data" => $data
            ];
            echo json_encode($output);
            }
        }
    }

    public function datatable1(){
        $request = Services::request();
        if ($request->isAJAX()) {
            
            $datamodel = new DtsModel1($request);

            if ($request->getMethod(true) == 'POST') {
                $lists = $datamodel->get_datatables();
                $data = [];
                $no = $request->getPost("start");
                foreach ($lists as $list) {
                $no++;
                $row = [];

                $row[] = $no;
                $row[] = $list->kode_barang;
                $row[] = $list->nup;
                $row[] = $list->nama_barang;
                $row[] = $list->merk_tipe;
                $row[] = $list->status;
                $row[] = '<a type="button" class="btn btn-info btn-icon btn-xs" href="#" onClick="alert(\'Not activated yet\')" title="Select Data"><i class="fa fa-check fa-lg"></i> Select</a>';

                $data[] = $row;
            }
            $output = [
                "draw" => $request->getPost('draw'),
                "recordsTotal" => $datamodel->count_all(),
                "recordsFiltered" => $datamodel->count_filtered(),
                "data" => $data
            ];
            echo json_encode($output);
            }
        }
    }

    public function datatable2(){
        $request = Services::request();
        if ($request->isAJAX()) {
            
            $datamodel = new DtsModel2($request);

            if ($request->getMethod(true) == 'POST') {
                $lists = $datamodel->get_datatables();
                $data = [];
                $no = $request->getPost("start");
                foreach ($lists as $list) {
                $no++;
                $row = [];

                $row[] = $no;
                $row[] = $list->kode_barang;
                $row[] = $list->nup;
                $row[] = $list->nama_barang;
                $row[] = $list->merk_tipe;
                $row[] = $list->status;
                $row[] = "<a href='#' onClick=\"window.opener.document.getElementById('txtKodeInventaris').value = '".$list->idmasterplm."';
                window.opener.document.getElementById('txtNamaBrg').value = '".$list->nama_barang."';
                window.close();\"> <b>".$list->idmasterplm."</b> <br>
                                            </a>";

                $data[] = $row;
            }
            $output = [
                "draw" => $request->getPost('draw'),
                "recordsTotal" => $datamodel->count_all(),
                "recordsFiltered" => $datamodel->count_filtered(),
                "data" => $data
            ];
            echo json_encode($output);
            }
        }
    }
}
