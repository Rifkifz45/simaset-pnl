<?php

namespace App\Controllers\Approver;
use App\Controllers\BaseController;

class Approver extends BaseController
{
    public function __construct()
    {
       
    }

    public function index()
    {
        return view('approver/index');
    }

}
