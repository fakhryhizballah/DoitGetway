<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Login - DoIt by Spairum',
            'validation' => \Config\Services::validation()
        ];
        return view('Auth/Login', $data);
    }

    public function registrasi()
    {
        $data = [
            'title' => 'Daftar - DoIt by Spairum',
            'validation' => \Config\Services::validation()
        ];
        return view('Auth/Register', $data);
    }

    //--------------------------------------------------------------------

}
