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
        $keyword =  $akun['ID_User'];
        $myCard = $this->CardModel->search($keyword);
        $myCard = $this->CardModel->orderBy('created_at', 'DESC')->findAll();
        $saldo = $this->CardModel->Total($keyword);
        $total = 0;
        $card = 0;
        foreach ($saldo as $row) {
            $total += $row['Saldo'];
            $card++;
        }
        // dd($total);

        // dd($myCard['0']['Saldo']);

        $data = [
            'title' => 'Home - DoIt by Spairum',
            'validation' => \Config\Services::validation(),
            'akun' => $akun,
            'myCard' => $myCard,
            'SaldoCard' => $total,
            'SumCard' => $card,
        ];
        return view('User/home', $data);
    }
    public function scanLayout()
    {
        $data = [
            'title' => 'Home - DoIt by Spairum',
        ];
        return view('Layout/scanLayout', $data);
    }

    public function exchange()
    {
        if (session()->get('ID_User') == '') {
            session()->setFlashdata('Error', 'Login dulu');
            return redirect()->to('/login');
        }
        $nama = session()->get('Username');
        $akun = $this->UserModel->cek_login($nama);
        $dari = $this->request->getVar('dari');
        $tujuan = $this->request->getVar('tujuan');
        $jumlah = $this->request->getVar('jumlah');

        if ($dari == $tujuan) {
            session()->setFlashdata('Error', 'Dari dan Tujuan tidak boleh sama');
            return redirect()->to('/');
        }
        $dariCard = $this->CardModel->Cari($dari);
        $tujuanCard = $this->CardModel->Cari($tujuan);

        if (empty($dariCard)) {
            $saldo = $akun['Saldo'];
            if ($saldo >= $jumlah) {
                $sisa = $saldo - $jumlah;
                $this->UserModel->save([
                    'id' => $akun['id'],
                    'Saldo' => $sisa,
                ]);

                $terima = $tujuanCard['Saldo'] + $jumlah;
                $this->CardModel->save([
                    'id' => $tujuanCard['id'],
                    'Saldo' => $terima,
                ]);
                session()->setFlashdata('flash', 'Saldo telah dipindah');
                return redirect()->to('/');
            } else {
                session()->setFlashdata('Error2', 'Saldo kurang');
                return redirect()->to('/');
            }
        };

        if ($dariCard['Saldo'] >= $jumlah) {
            $sisa = $dariCard['Saldo'] - $jumlah;
            $this->CardModel->save([
                'id' => $dariCard['id'],
                'Saldo' => $sisa,
            ]);
            if (empty($tujuanCard)) {
                $terima = $akun['Saldo'] + $jumlah;
                $this->UserModel->save([
                    'id' => $akun['id'],
                    'Saldo' => $terima
                ]);
                session()->setFlashdata('flash', 'Saldo telah dipindah');
                return redirect()->to('/');
            } else {
                $terima = $tujuanCard['Saldo'] + $jumlah;
                $this->CardModel->save([
                    'id' => $tujuanCard['id'],
                    'Saldo' => $terima
                ]);
                session()->setFlashdata('flash', 'Saldo telah dipindah');
                return redirect()->to('/');
            }
        } else {
            session()->setFlashdata('Error2', 'Saldo kurang');
            return redirect()->to('/');
        }
    }

    public function exch()
    {
        $dari = $this->request->isAJAX();
        if (session()->get('ID_User') == '') {
            session()->setFlashdata('Error', 'Login dulu');
            return redirect()->to('/login');
        }
        $nama = session()->get('Username');
        $akun = $this->UserModel->cek_login($nama);
        $dari = $this->request->getVar('dari');
        $tujuan = $this->request->getVar('tujuan');
        $jumlah = $this->request->getVar('jumlah');
        $msg = [
            'sukses' => "dari $jumlah"
        ];
        echo json_encode($msg);
    }

    public function bayar()
    {
        if (session()->get('ID_User') == '') {
            session()->setFlashdata('Error', 'Login dulu');
            return redirect()->to('/login');
        }
        $nama = session()->get('Username');
        $akun = $this->UserModel->cek_login($nama);

        $dari = $this->request->getVar('dari');
        $tujuan = $this->request->getVar('tujuan');
        $nominal = $this->request->getVar('nominal');

        $dariCard = $this->CardModel->Cari($dari);

        if (empty($dariCard)) {
            if ($akun['Saldo'] >= $nominal) {
                $sisa = $akun['Saldo'] - $nominal;
                $penerima = $this->UserModel->cek_login($tujuan);
                if (empty($penerima)) {
                    session()->setFlashdata('Error2', 'Nomor tujuan tidak ada');
                    return redirect()->to('/');
                } else {
                    $this->UserModel->save([
                        'id' => $akun['id'],
                        'Saldo' => $sisa,
                    ]);

                    $saldoAdd = $penerima['Saldo'] + $nominal;
                    $this->UserModel->save([
                        'id' => $penerima['id'],
                        'Saldo' => $saldoAdd,
                    ]);
                    session()->setFlashdata('flash', 'Saldo berhasil di kirim');
                    return redirect()->to('/');
                }
            } else {
                session()->setFlashdata('Error2', 'Saldo kurang');
                return redirect()->to('/');
            }
        } else {
            if ($dariCard['Saldo'] >= $nominal) {
                $sisa = $dariCard['Saldo'] - $nominal;
                $penerima = $this->UserModel->cek_login($tujuan);
                if (empty($penerima)) {
                    session()->setFlashdata('Error2', 'Nomor tujuan tidak ada');
                    return redirect()->to('/');
                } else {
                    $this->CardModel->save([
                        'id' => $dariCard['id'],
                        'Saldo' => $sisa
                    ]);
                    $saldoAdd = $penerima['Saldo'] + $nominal;
                    $this->UserModel->save([
                        'id' => $penerima['id'],
                        'Saldo' => $saldoAdd,
                    ]);
                    session()->setFlashdata('flash', 'Saldo berhasil di kirim');
                    return redirect()->to('/');
                }
            } else {
                session()->setFlashdata('Error2', 'Saldo kurang');
                return redirect()->to('/');
            }
        }
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
        $myCard = $this->CardModel->orderBy('created_at', 'DESC')->findAll();

        $data = [
            'title' => 'My Card - DoIt by Spairum',
            'validation' => \Config\Services::validation(),
            'akun' => $akun,
            'myCard' => $myCard
        ];
        return view('User/card', $data);
    }
    public function removeCard($id)
    {
        if (session()->get('ID_User') == '') {
            session()->setFlashdata('Error', 'Login dulu');
            return redirect()->to('/login');
        }
        $myCard = $this->CardModel->Cari($id);
        if (empty($myCard)) {
            return redirect()->to('/');
        };
        $this->CardModel->save([
            'id' => $myCard['id'],
            'Status' => 'Tidak Terdaftar',
            'ID_User' => null
        ]);
        session()->setFlashdata('flash', 'Card telah di hapus');
        return redirect()->to('/mycard');
    }
    public function editCard($id)
    {
        if (session()->get('ID_User') == '') {
            session()->setFlashdata('Error', 'Login dulu');
            return redirect()->to('/login');
        }
        $myCard = $this->CardModel->Cari($id);
        if (empty($myCard)) {
            return redirect()->to('/');
        };
        $jenis = $this->request->getVar('jenis');
        $ket = $this->request->getVar('Ket');
        $Warna = $this->request->getVar('warna');
        $this->CardModel->save([
            'id' => $myCard['id'],
            'Jenis' => $jenis,
            'Ket' => $ket,
            'Warna' => $Warna,
        ]);
        session()->setFlashdata('flash', 'Card telah di Edit');
        return redirect()->to('/mycard');
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

    public function addCard1()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'tampil' => 'hallo'
            ];
            $msg = [
                'data' => view('User/addCard')
            ];
            echo json_encode($msg);
        } else {
            exit('sorrys');
        }
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
