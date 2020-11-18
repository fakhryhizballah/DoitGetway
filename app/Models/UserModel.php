<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'tb_user';
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
        'Password',
        'Telp',
        'Saldo',
        'Poto',
    ];

    public function cek_login($email)
    {
        return $this->db->table('tb_user')
            ->where(array('Username' => $email))
            ->orWhere(array('Email' => $email))
            ->orWhere(array('Telp' => $email))
            ->get()->getRowArray();
    }
    public function updateSaldo($ID_User)
    {
        return $this->db->table('tb_user')
            ->where(array('ID_User' => $ID_User))
            ->get()->getRowArray();
    }

    public function updateprofile($data, $id)
    {
        return $this->db->table('tb_user')
            ->where('id', $id)
            ->update($data);
    }

    public function updateemail($data, $id)
    {
        return $this->db->table('tb_user')
            ->where('id', $id)
            ->update($data);
    }
}
