<?php

namespace App\Controllers;

class User extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Login - DoIt by Spairum',
            'validation' => \Config\Services::validation()
        ];
        return view('Auth/Login', $data);
    }


    //--------------------------------------------------------------------

}
