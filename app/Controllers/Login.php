<?php

namespace App\Controllers;
use App\Models\Admin\UserModel;

class Login extends BaseController
{
    public function __construct()
    {
        $this->UserModel = new UserModel();
    }

    public function index()
    {
       return view('dashboard');
    }

    public function login()
    {
        return view('login');
    }

    public function proses(){
        $session    = session();
        $username   = $this->request->getVar('username');
        $password   = $this->request->getVar('password');
        
        $data = $this->UserModel->where('username', $username)->first();
        
        if($data){
            $pass = $data['password'];
            $authenticatePassword = md5($password);
            if($authenticatePassword == $pass){
                $ses_data = [
                    'idusers' => $data['idusers'],
                    'nama' => $data['nama'],
                    'email' => $data['email'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);

                if ($data['role'] == 1) {
                    return redirect()->to('/admin');
                }elseif ($data['role'] == 2) {
                    return redirect()->to('/approver');
                }elseif ($data['role'] == 3) {
                    return redirect()->to('/pic');
                }            
            }else{
                $session->setFlashdata('msg', 'Password is incorrect.');
                return redirect()->to('/user-login');
            }
        }else{
            $session->setFlashdata('msg', 'Username does not exist.');
            return redirect()->to('/user-login');
        }
    }
}
