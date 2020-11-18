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

    public function cek_login($nama)
    {
        return $this->db->table('tb_user')
            ->where(array('Username' => $nama))
            ->orWhere(array('Email' => $nama))
            ->orWhere(array('Telp' => $nama))
            ->get()->getRowArray();
    }
    public function updateSaldo($id_user)
    {
        return $this->db->table('tb_user')
            ->where(array('id_user' => $id_user))
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
