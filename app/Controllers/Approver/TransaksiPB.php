<?php

namespace App\Controllers\Approver;
use App\Models\Admin\MTransaksiPB;
use App\Models\Admin\MTransaksiPBitem;
use App\Models\Admin\MInventarisPeralatan;
use App\Models\Approver\DbrModel;
use App\Controllers\BaseController;

class TransaksiPB extends BaseController
{
    public function __construct()
    {
        $this->MTransaksiPB         = new MTransaksiPB();
        $this->MTransaksiPBitem     = new MTransaksiPBitem();
        $this->MInventarisPeralatan = new MInventarisPeralatan();
    }

    public function index()
    {
        $penempatan = $this->MTransaksiPB->findAll();
        $detail = $this->db->table('transaksi_penempatan_item')
        ->join('inventaris_peralatan', 'inventaris_peralatan.id = transaksi_penempatan_item.inventaris_peralatan_id')
        ->join('tweb_pengguna', 'tweb_pengguna.id_pengguna = transaksi_penempatan_item.id_pengguna')
        ->get()->getResult();
        return view('approver/transaksipenempatan/index', [
            'penempatan'    =>  $penempatan,
            'detail'        =>  $detail
        ]);
    }

      public function viewpdf($id){
        $penempatan = $this->MTransaksiPB->where('idtransaksi_penempatan', $id)->first();
        return view('approver/transaksipenempatan/viewpdf',[
            'penempatan'    =>  $penempatan
        ]);
    }

    public function cetak($id){
        $detail = $this->db->table('transaksi_penempatan_item')
        ->join('inventaris_peralatan', 'inventaris_peralatan.id = transaksi_penempatan_item.inventaris_peralatan_id')
        ->join('tweb_pengguna', 'tweb_pengguna.id_pengguna = transaksi_penempatan_item.id_pengguna')
        ->get()->getResult();
        $penempatan = $this->MTransaksiPB->where('idtransaksi_penempatan', $id)->first();
        return view('approver/transaksipenempatan/cetak',[
            'penempatan'    =>  $penempatan,
            'detail'        =>  $detail,
        ]);
    }

    public function reject($id){
        $data = [
            'response'          =>  $this->request->getVar('response'),
            'status_penempatan' =>  "Rejected"
        ];

        $update = $this->MTransaksiPB->updatePenempatan($data, $id);

        if ($update) {
        $detail = $this->db->table('transaksi_penempatan_item')
            ->join('transaksi_penempatan', 'transaksi_penempatan.idtransaksi_penempatan = transaksi_penempatan_item.idtransaksi_penempatan')
            ->join('inventaris_peralatan', 'inventaris_peralatan.id = transaksi_penempatan_item.inventaris_peralatan_id')->get()->getResult();

        foreach ($detail as $key => $value) {
            $tercatat = [
                'tercatat'  =>  NULL
            ];

            $this->db->table('inventaris_peralatan')->where('id', $value->id)->update($tercatat);
            $this->db->table('transaksi_penempatan_item')
                ->where('idtransaksi_penempatan_item', $value->idtransaksi_penempatan_item)
                ->delete(); 
        }

        session()->setFlashdata('pesan', 'Placement Data has been successfully <b>Accepted</b>.');
            return redirect()->back();     
        }
    }

    public function accept($id){
        $data = [
            'response'          =>  $this->request->getVar('response'),
            'status_penempatan' =>  "Accepted"
        ];

        $update = $this->MTransaksiPB->updatePenempatan($data, $id);

        if ($update) {
        $detail = $this->db->table('transaksi_penempatan_item')
            ->join('transaksi_penempatan', 'transaksi_penempatan.idtransaksi_penempatan = transaksi_penempatan_item.idtransaksi_penempatan')
            ->join('inventaris_peralatan', 'inventaris_peralatan.id = transaksi_penempatan_item.inventaris_peralatan_id')->get()->getResult();

        foreach ($detail as $key => $value) {
            $tercatat = [
                'tercatat'  =>  $value->jenis_transaksi
            ];

            $this->db->table('inventaris_peralatan')->where('id', $value->id)->update($tercatat);

             $status = [
                'status_penempatan_item'  =>  "1"
            ];

            $this->db->table('transaksi_penempatan_item')
                ->where('idtransaksi_penempatan_item', $value->idtransaksi_penempatan_item)
                ->update($status); 
        }

        session()->setFlashdata('pesan', 'Placement Data has been successfully <b>Accepted</b>.');
            return redirect()->back();     
        }
    }
}
