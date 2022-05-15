<?php

namespace App\Controllers;
use App\Models\Admin\MUserLogin;

class UserLogin extends BaseController
{
    public function __construct()
    {
        $this->MUserLogin = new MUserLogin();
    }

    public function index()
    {
       return view('index');
    }

    public function pagelogin()
    {
        return view('login');
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
                    'id' => $data['id'],
                    'nama_user' => $data['nama_user'],
                    'email' => $data['email'],
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
                $session->setFlashdata('msg', 'Password is incorrect.');
                return redirect()->to('/page-login');
            }
        }else{
            $session->setFlashdata('msg', 'Username does not exist.');
            return redirect()->to('/page-login');
        }
    }
}
