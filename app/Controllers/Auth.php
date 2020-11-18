<?php

namespace App\Controllers;

use App\Models\OtpModel;
use App\Models\UserModel;

class Auth extends BaseController
{
    public function __construct()
    {
        $this->OtpModel = new OtpModel();
        $this->UserModel = new UserModel();
        $this->email = \Config\Services::email();
    }
    public function index()
    {
        $data = [
            'title' => 'Login - DoIt by Spairum',
            'validation' => \Config\Services::validation()
        ];
        return view('Auth/Login', $data);
    }

    public function login()
    {
        // dd($this->request->getVar());
        $email = $this->request->getVar('email');
        // $password = password_verify($this->request->getVar('password'), PASSWORD_BCRYPT);
        $password = ($this->request->getVar('password'));
        //validasi
        if (!$this->validate([
            'email' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} wajid di isi'
                ]
            ],
            'password' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} wajid di isi'
                ]
            ]

        ])) {
            $validation = \config\Services::validation();

            return redirect()->to('/login')->withInput()->with('validation', $validation);
        }

        $cek = $this->UserModel->cek_login($email);
        if (empty($cek)) {
            session()->setFlashdata('Error', 'Akun tidak terdaftar');
            return redirect()->to('/login');
        }
        $password = password_verify($password, ($cek['Password']));

        if (($cek['Password'] == $password)) {
            //dd($cek);
            session()->set('Username', $cek['Username']);
            session()->set('ID_User', $cek['ID_User']);
            return redirect()->to('/');
        } else {
            session()->setFlashdata('Error', 'Username atau Password salah');
            return redirect()->to('/login');
        }
    }



    public function registrasi()
    {
        $data = [
            'title' => 'Daftar - DoIt by Spairum',
            'validation' => \Config\Services::validation()
        ];

        return view('Auth/Register', $data);
    }

    public function otpregis()
    {
        //validasi
        if (!$this->validate([
            'username' => [
                'rules'  => 'required|alpha_dash|is_unique[otp.Username]',
                'errors' => [
                    'required' => '{field} wajid di isi',
                    'alpha_dash' => 'Tidak boleh mengunakan spasi',
                    'is_unique' => '{field} sudah terdaftar'
                ]
            ],
            'nama_depan' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukan Nama depan anda',
                ]
            ],
            'nama_belakang' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'wajid di isi',
                ]
            ],
            'email' => [
                'rules'  => 'required|valid_email|is_unique[otp.Email]',
                'errors' => [
                    'required' => '{field} wajid di isi',
                    'valid_email' => 'alamat email tidak benar',
                    'is_unique' => '{field} sudah terdaftar'
                ]
            ],
            'telp' => [
                'rules'  => 'required|is_natural|min_length[10]|is_unique[otp.Telp]',
                'errors' => [
                    'required' => 'nomor telpon wajid di isi',
                    'is_natural' => 'nomor telpon tidak benar',
                    'min_length' => 'nomor telpon tidak valid',
                    'is_unique' => 'nomor telp sudah terdaftar'
                ]
            ],
            'password1' => [
                'rules'  => 'required|min_length[6]',
                'errors' => [
                    'required' => '{field} wajid di isi',
                    'min_length[8]' => '{field} Minimal 8 karakter'
                ]
            ],
            'password2' => [
                'rules'  => 'required|matches[password1]',
                'errors' => [
                    'required' => 'password wajid di isi',
                    'matches' => 'password tidak sama'
                ]
            ]

        ])) {
            $validation = \config\Services::validation();
            // dd($this->request->getVar());
            return redirect()->to('/daftar')->withInput()->with('validation', $validation);
        }
        // dd($this->request->getVar());

        $Username = $this->request->getVar('username');
        $id_user = substr(sha1($Username), 0, 8);
        helper('text');
        $token = random_string('alnum', 28);
        $email = $this->request->getVar('email');
        $nama_depan = ucwords($this->request->getVar('nama_depan'));
        $nama_belakang = ucwords($this->request->getVar('nama_belakang'));
        $this->OtpModel->save([
            'ID_User' => strtoupper($id_user),
            'Username' => $Username,
            'Email' => $email,
            'Nama_Depan' => $nama_depan,
            'Nama_Belakang' => $nama_belakang,
            'Telp' => $this->request->getVar('telp'),
            'password' => password_hash($this->request->getVar('password1'), PASSWORD_BCRYPT),
            'Saldo' => '0',
            'Link' => $token,
            'Status' => 'Belum Verivikasi',
        ]);
        $this->email->setFrom('support@spairum.com', 'noreply-spairum');
        $this->email->setTo($email);
        $this->email->setSubject('OTP Verification Akun');
        $this->email->setMessage(
            "   
            <table align='center' cellpadding='0' cellspacing='0' border='0' width='100%' bgcolor='#f0f0f0'>
            <tr>
            <td style='padding: 30px 30px 20px 30px;'>
                <table cellpadding='0' cellspacing='0' border='0' width='100%' bgcolor='#ffffff' style='max-width: 650px; margin: auto;'>
                <tr>
                    <td colspan='2' align='center' style='background-color: #0d8eff; padding: 40px;'>
                        <a href='http://spairum.com/' target='_blank'><img src='https://spairum.com/Asset/img/spairum.png' width='50%' border='0' /></a>
                    </td>
                </tr>
                <tr>
                    <td colspan='2' align='center' style='padding: 50px 50px 0px 50px;'>
                        <h1 style='padding-right: 0em; margin: 0; line-height: 40px; font-weight:300; font-family: 'Nunito Sans', Arial, Verdana, Helvetica, sans-serif; color: #666; text-align: left; padding-bottom: 1em;'>
                            Spairum Pay IS Email OTP
                        </h1>
                    </td>
                </tr>
                <tr>
                    <td style='text-align: left; padding: 0px 50px;' valign='top'>
                        <p style='font-size: 18px; margin: 0; line-height: 24px; font-family: 'Nunito Sans', Arial, Verdana, Helvetica, sans-serif; color: #666; text-align: left; padding-bottom: 3%;'>
                            Hi $nama_depan $nama_belakang,
                        </p>
                        <p style='font-size: 18px; margin: 0; line-height: 24px; font-family: 'Nunito Sans', Arial, Verdana, Helvetica, sans-serif; color: #666; text-align: left; padding-bottom: 3%;'>
                        Terimakasih telah mendaftar silahkan melakukan verifikasi pada tautan dibawah :
                        </p>
                        <a href='https://pay.spairum.com/otp/$token' style='display:block;width:115px;height:25px;background:#0008ff;padding:10px;text-align:center;border-radius:5px;color:white;font-weight:bold'> Verivikasi</a>
                        <p style='font-size: 18px; margin: 0; line-height: 24px; font-family: 'Nunito Sans', Arial, Verdana, Helvetica, sans-serif; color: #666; text-align: left; padding-bottom: 3%;'><br/>Selanjutnya anda dapat melakukan login ke apps.spairum.com sebagai user</p>
                    </td>
                </tr>
                <tr>
                    <td style='text-align: left; padding: 30px 50px 50px 50px' valign='top'>
                        <p style='font-size: 18px; margin: 0; line-height: 24px; font-family: 'Nunito Sans', Arial, Verdana, Helvetica, sans-serif; color: #505050; text-align: left;'>
                            Thanks,<br/>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan='2' align='center' style='padding: 20px 40px 40px 40px;' bgcolor='#f0f0f0'>
                        <p style='font-size: 12px; margin: 0; line-height: 24px; font-family: 'Nunito Sans', Arial, Verdana, Helvetica, sans-serif; color: #777;'>
                            &copy; 2020
                            <a href='https://spairum.com/about' target='_blank' style='color: #777; text-decoration: none'>Spairum-Pay</a>
                            <br>
                            Jl.Merdeka, Pontianak - Kalimantan Barat
                            <br>
                            Indonesia
                        </p>
                    </td>
                </tr>
                </table>
            </td>
            </tr>
            </table>
            "
        );
        $this->email->send();
        session()->setFlashdata('Berhasil', 'Silakan cek kotak masuk email atau spam untuk verifikasi akun.');
        return redirect()->to('/login');
    }
    //--------------------------------------------------------------------
    public function otp($link)
    {
        $cek = $this->OtpModel->cek($link);
        if (empty($cek)) {
            session()->setFlashdata('Error', 'Akun sudah di verifikasi');
            return redirect()->to('/login');
        }

        $this->UserModel->save([
            'ID_User' => $cek['ID_User'],
            'Username' => $cek['Username'],
            'Email' => $cek['Email'],
            'Nama_Depan' => $cek['Nama_Depan'],
            'Nama_Belakang' => $cek['Nama_Belakang'],
            'Password' => $cek['Password'],
            'Telp' => $cek['Telp'],
            'Saldo' => '0',
            'Poto' => 'user.png',
        ]);
        $this->OtpModel->save([
            'id' => $cek['id'],
            'Link' => substr(sha1($cek['Link']), 0, 10),
            'Status' => 'Tercerivikasi',
        ]);
        session()->setFlashdata('Berhasil', 'Registration success silahkan login.');
        return redirect()->to('/login');
    }
}
