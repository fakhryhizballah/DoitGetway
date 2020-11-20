<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\OtpModel;
use App\Models\CardModel;
use App\Models\ReaderModel;

class User extends BaseController
{
    public function __construct()
    {
        $this->OtpModel = new OtpModel();
        $this->UserModel = new UserModel();
        $this->CardModel = new CardModel();
        $this->ReaderModel = new ReaderModel();
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
        return view('User/home', $data);
    }
    public function card()
    {
        if (session()->get('ID_User') == '') {
            session()->setFlashdata('Error', 'Login dulu');
            return redirect()->to('/login');
        }
        $nama = session()->get('Username');
        $akun = $this->UserModel->cek_login($nama);
        $keyword =  $akun['ID_User'];

        $myCard = $this->CardModel->search($keyword);

        $data = [
            'title' => 'My Card - DoIt by Spairum',
            'validation' => \Config\Services::validation(),
            'akun' => $akun,
            'myCard' => $myCard
        ];
        return view('User/card', $data);
    }

    public function addcard()
    {
        if (session()->get('ID_User') == '') {
            session()->setFlashdata('Error', 'Login dulu');
            return redirect()->to('/login');
        }
        $nama = session()->get('Username');
        $akun = $this->UserModel->cek_login($nama);
        $reader =  $this->request->getVar('reader');
        // dd($akun['ID_User']);

        $myCard = $this->ReaderModel->cari($reader);
        if (empty($myCard)) {
            session()->setFlashdata('Error', 'Bukan QR Reader Spairum Pay');
            return redirect()->to('/');
        };
        $this->ReaderModel->save([
            'id' => $myCard['id'],
            'Info' => 'Tempel Kartu',
            'Command' => 'addCard',
            'ID_User' => $akun['ID_User'],
        ]);
        session()->setFlashdata('flash', 'Silahkan Tempel Kartu di Reader');
        return redirect()->to('/');
    }

    public function riwayat()
    {
        if (session()->get('ID_User') == '') {
            session()->setFlashdata('Error', 'Login dulu');
            return redirect()->to('/login');
        }
        $nama = session()->get('Username');
        $akun = $this->UserModel->cek_login($nama);

        $data = [
            'title' => 'Riwayat - DoIt by Spairum',
            'validation' => \Config\Services::validation(),
            'akun' => $akun
        ];
        return view('User/riwayat', $data);
    }


    //--------------------------------------------------------------------

}
