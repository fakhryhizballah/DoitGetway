<?php

namespace App\Models;

use CodeIgniter\Model;

class OtpModel extends Model
{
    protected $table      = 'otp';
    // Uncomment below if you want add primary key
    // protected $primaryKey = 'id';
    protected $useTimestamps    = true;
    protected $allowedFields    =
    [
        'ID_User',
        'Username',
        'Email',
        'Nama_Depan',
        'Nama_Belakang',
        'Telp',
        'password',
        'Saldo',
        'link',
        'Status',

    ];

    public function cek($link)
    {
        return $this->db->table('otp')
            ->where(array('link' => $link))
            ->get()->getRowArray();
    }
}
