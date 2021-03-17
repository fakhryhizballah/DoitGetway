<?php

namespace App\Controllers;

use App\Models\OtpModel;
use App\Models\UserModel;
use App\Models\IplogModel;

class Auth extends BaseController
{
    public function __construct()
    {
        $this->OtpModel = new OtpModel();
        $this->UserModel = new UserModel();
        $this->IplogModel = new IplogModel();
        $this->email = \Config\Services::email();
    }
    public function index()
    {
        // dd($_SERVER['SERVER_NAME']);
        // dd($_SERVER['HTTP_USER_AGENT']);
        // dd($_SERVER['REMOTE_ADDR']);
        // dd($_SERVER['REMOTE_ADDR']);
        // dd($request->getIPAddress());
        if (session()->get('ID_User') == '') {
            $data = [
                'title' => 'Login - DoIt by Spairum',
                'validation' => \Config\Services::validation()
            ];
            return view('Auth/Login', $data);
        } else {
            return redirect()->to('/user');
        }
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

            return redirect()->to('/user')->withInput()->with('validation', $validation);
        }
        $cek = $this->UserModel->cek_login($email);
        if (empty($cek)) {
            session()->setFlashdata('Error', 'Akun tidak terdaftar');
            $this->IplogModel->save([
                'IP_ADDR' => $_SERVER['REMOTE_ADDR'],
                'ID_HOST' => ($_SERVER['HTTP_USER_AGENT']),
                'User' => ($email),
                'Command' => 'Tidak Ada Akun',
            ]);
            return redirect()->to('/user');
        }
        $password = password_verify($password, ($cek['Password']));

        if (($cek['Password'] == $password)) {
            //dd($cek);
            session()->set('Username', $cek['Username']);
            session()->set('ID_User', $cek['ID_User']);
            $this->IplogModel->save([
                'IP_ADDR' => ($_SERVER['REMOTE_ADDR']),
                'ID_HOST' => $_SERVER['HTTP_USER_AGENT'],
                'User' => ($email),
                'Command' => 'Berhasil Masuk',
            ]);
            return redirect()->to('/user');
        } else {
            session()->setFlashdata('Error', 'Username atau Password salah');
            $this->IplogModel->save([
                'IP_ADDR' => ($_SERVER['REMOTE_ADDR']),
                'ID_HOST' => $_SERVER['HTTP_USER_AGENT'],
                'User' => ($email),
                'Command' => 'Password Salah',
            ]);
            return redirect()->to('/user');
        }
    }



    public function registrasi()
    {
        if (session()->get('ID_User') == '') {
            $data = [
                'title' => 'Daftar - DoIt by Spairum',
                'validation' => \Config\Services::validation()
            ];

            return view('Auth/Register', $data);
        } else {
            return redirect()->to('/user');
        }
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
        $this->IplogModel->save([
            'IP_ADDR' => ($_SERVER['REMOTE_ADDR']),
            'ID_HOST' => $_SERVER['HTTP_USER_AGENT'],
            'User' => ($email),
            'Command' => 'Daftar',
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
        return redirect()->to('/');
    }
    //--------------------------------------------------------------------
    public function otp($link)
    {
        $cek = $this->OtpModel->cek($link);
        if (empty($cek)) {
            session()->setFlashdata('Error', 'Akun sudah di verifikasi');
            return redirect()->to('/');
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

        $this->IplogModel->save([
            'IP_ADDR' => ($_SERVER['REMOTE_ADDR']),
            'ID_HOST' => $_SERVER['HTTP_USER_AGENT'],
            'User' => $cek['Email'],
            'Command' => 'Verivikasi',
        ]);
        session()->setFlashdata('Berhasil', 'Registration success silahkan login.');
        return redirect()->to('/');
    }
    public function logout()
    {
        // $array_items = ['nama', 'id_driver', 'id_user'];
        // $session->remove($array_items);
        $nama = session()->get('Username');
        $akun = $this->UserModel->cek_login($nama);
        $this->IplogModel->save([
            'IP_ADDR' => ($_SERVER['REMOTE_ADDR']),
            'ID_HOST' => $_SERVER['HTTP_USER_AGENT'],
            'User' => $akun['Email'],
            'Command' => 'Logout',
        ]);
        session()->setFlashdata('Berhasil', 'Berhasil Logout');
        session_destroy();
        return redirect()->to('/');
    }
    public function lupapas()
    {
        if (session()->get('ID_User') == '') {
            $data = [
                'title' => 'Lupa Password - DoIt by Spairum',
                'validation' => \Config\Services::validation()
            ];

            return view('Auth/Lupapas', $data);
        } else {
            return redirect()->to('/');
        }
    }

    public function sendemail()
    {
        if (!$this->validate([
            'email' => [
                'rules'  => 'required|valid_email',
                'errors' => [
                    'required' => '{field} wajid di isi',
                    'valid_email' => 'alamat email tidak benar',
                ]
            ]

        ])) {
            $validation = \config\Services::validation();
            // dd($this->request->getVar());
            return redirect()->to('/lupapassword')->withInput()->with('validation', $validation);
        }
        helper('text');
        $token = random_string('alnum', 29);
        $email = $this->request->getVar('email');
        $cek = $this->UserModel->cek_login($email);

        if (empty($cek)) {
            session()->setFlashdata('Error', 'Akun tidak terdaftar');
            $this->IplogModel->save([
                'IP_ADDR' => $_SERVER['REMOTE_ADDR'],
                'ID_HOST' => ($_SERVER['HTTP_USER_AGENT']),
                'User' => ($email),
                'Command' => 'Lupa password|Tidak Ada Akun',
            ]);
            return redirect()->to('/');
        }
        $this->OtpModel->save([
            'id' => $cek['id'],
            'Link' =>  $token,
            'Status' => 'Lupa Password',
        ]);
        $nama_depan = $cek['Nama_Depan'];
        $nama_belakang = $cek['Nama_Belakang'];

        $this->IplogModel->save([
            'IP_ADDR' => $_SERVER['REMOTE_ADDR'],
            'ID_HOST' => ($_SERVER['HTTP_USER_AGENT']),
            'User' => ($email),
            'Command' => 'Mengganti akun',
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
                            Spairum Pay IS Email Untuk mengganti password akun
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
                        <a href='https://pay.spairum.com/otplupapass/$token' style='display:block;width:115px;height:25px;background:#0008ff;padding:10px;text-align:center;border-radius:5px;color:white;font-weight:bold'> Ganti Password sekarang</a>
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
        session()->setFlashdata('Berhasil', 'Silakan cek kotak masuk email atau spam untuk verifikasi ganti password akun.');
        return redirect()->to('/');
    }

    public function otplupapass($link)
    {
        $cek = $this->OtpModel->cek($link);
        if (empty($cek)) {
            session()->setFlashdata('Error', 'Anda salah alamat');
            return redirect()->to('/');
        }

        $cek_user = $this->UserModel->cek_login($cek['Email']);
        $data = [
            'title' => 'Login - DoIt by Spairum',
            'validation' => \Config\Services::validation()
        ];
        $setSession = [
            'ID_Userakun' => $cek_user['id'],
            'ID_otp' => $cek['id'],
            'email' => $cek_user['Email'],
            'token' => $link
        ];
        // session()->set('ID_Userakun', $cek_user['id']);
        // session()->set('ID_otp', $cek['id']);
        // session()->set('email', $cek_user['Email']);
        session()->set($setSession);
        return view('Auth/GantiPass', $data);
    }

    public function gantipassword()
    {
        //validasi
        if (!$this->validate([
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
            $token = session()->get('token');
            return redirect()->to("/otplupapass/$token")->withInput()->with('validation', $validation);
        }
        helper('text');
        $token = random_string('alnum', 29);

        $this->UserModel->save([
            'id' => session()->get('ID_Userakun'),
            'Password' => password_hash($this->request->getVar('password1'), PASSWORD_BCRYPT),
        ]);
        $this->OtpModel->save([
            'id' => session()->get('ID_otp'),
            'Link' => substr(sha1($token), 0, 10),
            'Status' => 'Password baru dari email',
        ]);

        $this->IplogModel->save([
            'IP_ADDR' => ($_SERVER['REMOTE_ADDR']),
            'ID_HOST' => $_SERVER['HTTP_USER_AGENT'],
            'User' => session()->get('email'),
            'Command' => 'Verivikasi',
        ]);
        session_destroy();
        session()->setFlashdata('Berhasil', 'Passwod anda berhasil di perbahrui.');
        return redirect()->to('/');
    }
}
