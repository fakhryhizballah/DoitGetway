<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;
use CodeIgniter\RESTful\ResourceController;


class ReaderAPI extends ResourceController
{
    protected $format = 'json';
    protected $modelName = 'App\Models\ReaderModel';


    public function index()
    {
        // return $this->respond($this->model->findAll());
    }

    public function status($id = NULL)
    {
        $get = $this->model->getReader($id);
        $time = Time::now('Asia/Jakarta');
        $keyword = "Status Reader $id";
        // $status  = $this->model->sea($keyword);
        // $sebelum = $status->Respoun;
        // $status  = $this->model->orderBy('created_at', 'DESC')->findAll(1);
        // $sekarang = $time->getTimestamp();
        // $selisih = $sekarang - $sebelum;
        // dd($selisih);
        $dataLog = [
            'IP' => gethostbyaddr($_SERVER['REMOTE_ADDR']),
            'LinkAPI' => "/ReaderAPI/status/$id",
            'NameAPI' => "Status Reader $id",
            'Respoun' => "200",
            'updated_at' => $time,
            'created_at' => $time
        ];
        $edit = $this->model->hit($dataLog);
        if ($get) {
            $msg = [
                'NameAPI' => $get['ID_Reader'],
                'Command' => $get['Command'],
                'Info' => $get['Info'],
                'Bat' => $get['Bat'],
            ];
            $response = [
                'status' => 200,
                'error' => false,
                'data' => $msg,
            ];
            return $this->respond($response, 200);
        } else {
            $dataLog = [
                'IP' => gethostbyaddr($_SERVER['REMOTE_ADDR']),
                'LinkAPI' => "/ReaderAPI/status/$id",
                'NameAPI' => "Status Reader $id",
                'Respoun' => '500',
                'updated_at' => $time,
                'created_at' => $time
            ];
            $edit = $this->model->hit($dataLog);
            $response = [
                'status' => 500,
                'error' => false,
                'data' => 'Anda salah sasaran',
            ];
            return $this->respond($response, 200);
        }
    }

    public function addCard($id = null)
    {
        $valid = $this->validate([
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
            $time = Time::now('Asia/Jakarta');
            $dataLog = [
                'IP' => gethostbyaddr($_SERVER['REMOTE_ADDR']),
                'LinkAPI' => "/ReaderAPI/addCard/$id",
                'NameAPI' => "Add Card $id",
                'Respoun' => '500',
                'updated_at' => $time,
                'created_at' => $time
            ];
            $log = $this->model->hit($dataLog);
            return $this->respond($response, 500);
        } else {
            $ID_Card = $this->request->getVar('ID_Card');
            $updated_at = Time::now('Asia/Jakarta');
            $data = [
                'ID_Card' => $ID_Card,
                'Command' => 'Standby',
                'Info' => 'Oke',
                'updated_at' => $updated_at,
            ];
            $edit = $this->model->updateReader($data, $id);

            $time = Time::now('Asia/Jakarta');
            $dataLog = [
                'IP' => gethostbyaddr($_SERVER['REMOTE_ADDR']),
                'LinkAPI' => "/ReaderAPI/addCard/$id",
                'NameAPI' => "Add Card $id",
                'Respoun' => '200',
                'updated_at' => $time,
                'created_at' => $time
            ];
            $log = $this->model->hit($dataLog);
            $myCard = $this->model->cari($id);
            if ($edit) {
                $msg = [
                    'massage' => 'berhasil di tambah',
                    'ID_User' => $myCard['ID_User'],
                    'ID_Card' => $ID_Card,
                ];
                $response = [
                    'status' => 200,
                    'error' => false,
                    'data' => $msg,
                ];
                return $this->respond($response, 200);
            }
            // $myCard = $this->CardModel->search($id);

        }
    }

    public function bayar($id = null)
    {
        $valid = $this->validate([
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
            $isi = $this->request->getVar('isi');
            $indikator = $this->request->getVar('indikator');
            $updated_at = Time::now('Asia/Jakarta');
            $data = [
                'isi' => $isi,
                'indikator' => $indikator,
                'updated_at' => $updated_at,
            ];
            $edit = $this->model->updateStasiun($data, $id);
            if ($edit) {
                $msg = ['massage' => 'berhasil update'];
                $response = [
                    'status' => 200,
                    'error' => false,
                    'data' => $msg
                ];
                return $this->respond($response, 200);
            }
        }
    }
}
