<?php

namespace App\Controllers;
use App\Models\Admin\MUserLogin;
use App\Models\Admin\MTwebGedung;
use App\Models\Admin\MTwebLokasi;
use App\Models\Admin\MInventarisTanah;
use App\Models\Admin\MInventarisPeralatan;
use App\Models\Admin\MInventarisGedung;
use App\Models\Admin\MInventarisJalan;
use App\Models\Admin\MInventarisTakBerwujud;
use App\Models\Admin\MTransaksiPBitem;
use \Hermawan\DataTables\DataTable;
use Mpdf\Mpdf;

class UserLogin extends BaseController
{
    public function __construct()
    {
        $this->MUserLogin             = new MUserLogin();
        $this->MInventarisTanah       = new MInventarisTanah();
        $this->MInventarisPeralatan   = new MInventarisPeralatan();
        $this->MTwebGedung            = new MTwebGedung();
        $this->MInventarisJalan       = new MInventarisJalan();
        $this->MTwebGedung            = new MTwebGedung();
        $this->MTwebLokasi            = new MTwebLokasi();
        $this->MInventarisTakBerwujud = new MInventarisTakBerwujud();
        $this->MTransaksiPBitem       = new MTransaksiPBitem();
        $this->email = \Config\Services::email();
        
    }

    public function verify(){
        $reset_key = random_string('alnum', 50);
        $emailto = $this->request->getVar('email');
        
        $check_email = $this->MUserLogin->where('email', $emailto)->get()->getRowArray();

        if (isset($check_email)) {
            $updatekey = $this->MUserLogin->updateKey($emailto, $reset_key);
            $to = $emailto;
            $this->email->setFrom('rifkilhokseumawe2484@gmail.com', 'SIMASETPNL');
            $this->email->setTo($to);
            $this->email->setSubject('Reset Password SIMASETPNL');
            $message = "<p>Anda melakukan permintaan reset password</p>";
            $message .= "<a href='".site_url('reset_password/'.$reset_key)."'>Click here!</a><br>";
            $message .= "This is your resey key: " . $reset_key;
            $this->email->setMessage($message);

            if (!$this->email->send()) {
                $this->session->setFlashdata('pesan', 'Email Tidak Terkirim');
                return redirect()->to('reset_password');
            }else{
                $this->session->setFlashdata('sukses', 'Email Berhasil Dikirim');
                return redirect()->to('reset_password');
            }
        }else{
            $this->session->setFlashdata('pesan', 'Email tidak ditemukan!');
            return redirect()->to('reset_password');
        }
    }

    public function reset_password($key){
        $check_key = $this->MUserLogin->where('reset_key', $key)->first();
        if (isset($check_key)) {
            return view('landing/pw_baru',['key' => $key]);
        }else{
            $this->session->setFlashdata('pesan', 'Key Salah');
            return redirect()->to('reset_password');
        }
        
    }

    public function pwbaru_verify(){
        $pwbaru = $this->request->getVar('password');      
        $pwbaru_confirm = $this->request->getVar('new_password');      
        $resetkey = $this->request->getVar('reset_key');

        if ($pwbaru == $pwbaru_confirm) {
            $updatepw = $this->MUserLogin->update_password($pwbaru, $resetkey);
            if ($updatepw) {
                $this->session->setFlashdata('pesan', 'Reset Password Berhasil!');
                return redirect()->to('page-login');
            }            
        }else{
            $this->session->setFlashdata('pesan', 'Password Tidak Sama');
            return redirect()->back();
        }
    }

    public function index()
    {
        $site=array('inventaris_tanah','inventaris_peralatan','inventaris_gedung','inventaris_jalan','inventaris_asset','inventaris_konstruksi', 'inventaris_takberwujud');
        $data = 0;
        foreach ($site as $value) {
            $query = $this->db->table($value);
            $count = $query->countAllResults();
            $data += $count;
        }

        $pengguna = $this->db->table('tweb_pengguna');
        $pengguna = $pengguna->countAllResults();

        $lokasi = $this->db->table('tweb_lokasi');
        $lokasi = $lokasi->countAllResults();
        
        return view('landing/dashboard',[
            'count'    => $data,
            'pengguna' => $pengguna,
            'lokasi' => $lokasi
        ]);
    }

    public function reset(){
        return view('landing/reset_pw');
    }

    public function about()
    {
        $gedung = $this->MTwebGedung->findAll();
        $lokasi = $this->MTwebLokasi->findAll();
        return view('landing/about',[
            'gedung' => $gedung,
            'lokasi' => $lokasi,
        ]);
    }

    public function services()
    {
       return view('landing/services');
    }

    public function info()
    {
       return view('landing/info');
    }

    public function info_detail()
    {
        $kode_barang = $this->request->getVar('kode_barang');
        $nup_barang = $this->request->getVar('nup');
        $token = $this->request->getVar('token');

        $rendertoken = $this->db->table('set_token')->where('kategori', "1")->get()->getRowArray();

        if (md5($token) == $rendertoken['token']) {
            if (substr($kode_barang, 0, 1) == "3") {
                 $data = $this->MInventarisPeralatan
                 ->where('kode_barang', $kode_barang)
                 ->where('nup', $nup_barang)
                 ->first();

                 if (isset($data) >= 1) {
                    $dbr = $this->MTransaksiPBitem
                        ->join('transaksi_penempatan', 'transaksi_penempatan.idtransaksi_penempatan = transaksi_penempatan_item.idtransaksi_penempatan', 'left')
                        ->join('inventaris_peralatan', 'inventaris_peralatan.idinventaris_peralatan = transaksi_penempatan_item.idinventaris_peralatan', 'left')
                        ->join('tweb_lokasi', 'tweb_lokasi.id_lokasi = transaksi_penempatan.id_lokasi', 'left')
                        ->join('tweb_pengguna', 'tweb_pengguna.id_pengguna = transaksi_penempatan_item.id_pengguna', 'left')
                        ->join('tweb_kondisi', 'tweb_kondisi.id_kondisi = inventaris_peralatan.id_kondisi', 'left')
                        ->where('status_penempatan_item', '1')
                        ->where('transaksi_penempatan_item.idinventaris_peralatan', $data['idinventaris_peralatan'])
                        ->first();

                        if (isset($dbr)) {
                            return view('landing/info_detail',[
                                'data' => $dbr
                            ]);
                        }else{
                             echo "<script>alert('DATA TIDAK DITEMUKAN'); history.go(-1);</script>";
                        }
                }else{
                    echo "<script>alert('DATA TIDAK DITEMUKAN'); history.go(-1);</script>";   
                }
            }else {
                echo "<script>alert('MASUKAN KODE YANG SESUAI'); history.go(-1);</script>";
            }
        }else{
            echo "<script>alert('TOKEN SALAH'); history.go(-1);</script>";   
        }
    }

    public function report()
    {
       $gedung = $this->MTwebGedung->findAll();
       return view('landing/report_dbr',[
        'gedung'    =>  $gedung
       ]);
    }

    public function lock(){
        $id_gedung = $this->request->getVar("gedung_id");
        $builder = $this->db
            ->table("tweb_lokasi")
            ->getWhere(["id_gedung" => $id_gedung])
            ->getResult();
        echo json_encode($builder);
    }

    public function contact()
    {
       return view('landing/contact');
    }

    public function login()
    {
        $userlog = $this->session->get('id_user');
        if ($userlog) {
            $check_level = $this->MUserLogin->where('id', $userlog)->first();

            if ($check_level['level'] == 1) {
                return redirect()->to('/admin');
            }else if ($check_level['level'] == 2){
                return redirect()->to('/approver');
            }else{
                return view('landing/login');
            }
        }
        return view('landing/login');
    }

    public function logout(){
        $this->session->destroy();
        return redirect()->to('');
    }

    public function statistik_detail(){
        $builder = $this->db->table('inventaris_peralatan');
        $builder->selectCount('kode_barang','total_barang');
        $builder->select('kode_barang,nama_barang,idinventaris_peralatan');
        $builder->groupBy('kode_barang');
        $builder->where('tercatat', 'DBR');
        $builder->orWhere('tercatat', 'DBL');
        $builder->orWhere('tercatat', 'KIB');
        $group = $builder->get()->getResult();

       return view('statistik-detail',[
       'group' =>  $group
        ]); 
    }

    public function statistik_detail2($id)
    {
        $builder = $this->db->table('transaksi_penempatan_item');
        $builder->join('transaksi_penempatan', 'transaksi_penempatan.idtransaksi_penempatan = transaksi_penempatan_item.idtransaksi_penempatan');
        $builder->join('tweb_lokasi', 'tweb_lokasi.id_lokasi = transaksi_penempatan.id_lokasi');
        $builder->join('tweb_gedung', 'tweb_gedung.id_gedung = tweb_lokasi.id_gedung');
        $builder->join('inventaris_peralatan', 'inventaris_peralatan.idinventaris_peralatan = transaksi_penempatan_item.idinventaris_peralatan');
        $builder->selectCount('kode_barang','total_barang');
        $builder->select('kode_barang,nama_barang,nama_lokasi,nama_gedung');
        $builder->orderBy('transaksi_penempatan.id_lokasi','ASC');
        $builder->groupBy(['kode_barang','tweb_gedung.id_gedung']);
        $builder->like('kode_barang', $id);
        $builder->where('tercatat', 'DBR');
        $builder->orWhere('tercatat', 'DBL');
        $builder->orWhere('tercatat', 'KIB');
        $group = $builder->get()->getResult();

        return view('statistik-detail2',[
            'group' =>  $group
        ]);
    }

    public function cetak_dbr()
    {
        $lokasi  = $this->request->getVar('id_lokasi');
        $token  = $this->request->getVar('token');
        $rendertoken = $this->db->table('set_token')->where('kategori', "1")->get()->getRowArray();

        if (md5($token) == $rendertoken['token']) {
            $ruangan = $this->MTwebLokasi
                ->join('tweb_pengguna', 'tweb_pengguna.id_pengguna = tweb_lokasi.id_pengguna','left')
                ->join('tweb_gedung', 'tweb_gedung.id_gedung = tweb_lokasi.id_gedung','left')
                ->where('tweb_lokasi.id_lokasi',$lokasi)
                ->first();

        $item = $this->db->table('transaksi_penempatan_item')
            ->join('transaksi_penempatan', 'transaksi_penempatan.idtransaksi_penempatan = transaksi_penempatan_item.idtransaksi_penempatan', 'left')
            ->join('inventaris_peralatan', 'inventaris_peralatan.idinventaris_peralatan = transaksi_penempatan_item.idinventaris_peralatan', 'left')
            ->join('tweb_pengguna', 'tweb_pengguna.id_pengguna = transaksi_penempatan_item.id_pengguna', 'left')
            ->join('tweb_hak', 'tweb_hak.id_hak = transaksi_penempatan_item.id_hak', 'left')
            ->join('tweb_lokasi', 'tweb_lokasi.id_lokasi = transaksi_penempatan.id_lokasi')
            ->join('tweb_gedung', 'tweb_gedung.id_gedung = tweb_lokasi.id_gedung')
            ->where('status_penempatan_item', '1')
            ->where('jenis_transaksi', 'DBR')
            ->where('transaksi_penempatan.id_lokasi', $lokasi)
            ->get()->getResult();

        $mpdf = new \Mpdf\Mpdf();
        $this->response->setContentType('application/pdf');
        $data = view('print_dbr',[
            'ruangan'   =>  $ruangan,
            'item'      =>  $item
        ]);
        $mpdf->setFooter('{PAGENO}');
        $mpdf->WriteHTML($data);
        $mpdf->Output();
        }else{
            echo "<script>alert('TOKEN SALAH'); history.go(-1);</script>";   
        }
    }

    public function report_1()
    {
       $gedung = $this->MTwebGedung->findAll();
       return view('dbr',[
        'gedung'    =>  $gedung
       ]);
    }

    public function report_2()
    {
       return view('dbl');
    }

    public function pagelogin()
    {
        return view('login_2');
    }

    public function pagelogin2()
    {
        return view('logintest');
    }

    public function proses(){
        $session    = session();
        $username   = $this->request->getVar('username');
        $password   = $this->request->getVar('password');
        
        $data = $this->MUserLogin->where('username', $username)->first();
        
        if($data){
            $pass = $data['password'];
            $authenticatePassword = md5($password);
            if($authenticatePassword == $pass){
                $ses_data = [
                    'id_user'    => $data['id'],
                    'nama_user'  => $data['nama_user'],
                    'email'      => $data['email'],
                    'foto_user'  => $data['foto_user'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);

                if ($data['level'] == 1) {
                    return redirect()->to('/admin');
                }elseif ($data['level'] == 2) {
                    return redirect()->to('/approver');
                }elseif ($data['level'] == 3) {
                    return redirect()->to('/pic');
                }            
            }else{
                $session->setFlashdata('error', 'Password is incorrect.');
                return redirect()->to('/page-login');
            }
        }else{
            $session->setFlashdata('error', 'Username does not exist.');
            return redirect()->to('/page-login');
        }
    }
}
