<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;
use CodeIgniter\RESTful\ResourceController;

class CardAPI extends ResourceController
{
    protected $format = 'json';
    protected $modelName = 'App\Models\CardModel';

    public function index()
    {
        return $this->respond($this->model->findAll());
    }


    public function addCard()
    {
        $valid = $this->validate([
            'ID_User' => [
                'label' => 'ID_User',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Wajib di isi'
                ]
            ],
            'ID_Card' => [
                'label' => 'ID_Card',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Wajib di isi'
                ]
            ],
        ]);
        if (!$valid) {
            $response = [
                'status' => 500,
                'error' => true,
                'data' => \config\Services::validation()->getErrors(),
            ];
            return $this->respond($response, 500);
        } else {
            $ID_User = $this->request->getVar('ID_User');
            $ID_Card = $this->request->getVar('ID_Card');
            $updated_at = Time::now('Asia/Jakarta');

            $myCard = $this->model->cari($ID_Card);
            if (empty($myCard)) {
                $this->model->save([
                    'ID_Card' => $ID_Card,
                    'ID_User' => $ID_User,
                    'Saldo' => '0',
                    'Jenis' => null,
                    'Status' => 'Terdaftar',
                ]);
                $msg = [
                    'massage' => 'Kartu Baru berhasil di Simpan',
                    'info' => 'Berhasil'
                ];
                $response = [
                    'status' => 200,
                    'error' => false,
                    'data' => $msg,
                ];
                return $this->respond($response, 200);
            };
            if ($myCard['Status'] == 'Terdaftar') {
                $msg = [
                    'massage' => 'Kartu Sudah Ada yang Punya',
                    'info' => 'Tidak Bisa'
                ];
                $response = [
                    'status' => 200,
                    'error' => false,
                    'data' => $msg,
                ];
                return $this->respond($response, 200);
            } else {
                $this->model->save([
                    'id' => $myCard['id'],
                    'ID_User' => $ID_User,
                    'Status' => 'Terdaftar',
                ]);
                $msg = [
                    'massage' => 'Kartu berhasil didaftarkan',
                    'info' => 'Berhasil'
                ];
                $response = [
                    'status' => 200,
                    'error' => false,
                    'data' => $msg,
                ];
                return $this->respond($response, 200);
            }
        }
    }
}
