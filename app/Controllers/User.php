<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\OtpModel;

class User extends BaseController
{
    public function __construct()
    {
        $this->OtpModel = new OtpModel();
        $this->UserModel = new UserModel();
        $this->email = \Config\Services::email();
    }

    public function index()
    {
        if (session()->get('ID_User') == '') {
            session()->setFlashdata('Error', 'Login dulu');
            return redirect()->to('/login');
        }
        $nama = session()->get('Username');
        $akun = $this->UserModel->cek_login($nama);
        // dd($akun);
        $data = [
            'title' => 'Home - DoIt by Spairum',
            'validation' => \Config\Services::validation(),
            'akun' => $akun,
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
