<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        echo "Halaman Home";
    }

    public function tambah(){
        addNumber(1,4);
    }
}
