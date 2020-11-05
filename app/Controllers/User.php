<?php

namespace App\Controllers;

class User extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home - DoIt by Spairum',
            'validation' => \Config\Services::validation()
        ];
        return view('User/Home', $data);
    }
    public function card()
    {
        $data = [
            'title' => 'My Card - DoIt by Spairum',
            'validation' => \Config\Services::validation()
        ];
        return view('User/card', $data);
    }
    public function riwayat()
    {
        $data = [
            'title' => 'Riwayat - DoIt by Spairum',
            'validation' => \Config\Services::validation()
        ];
        return view('User/riwayat', $data);
    }


    //--------------------------------------------------------------------

}
