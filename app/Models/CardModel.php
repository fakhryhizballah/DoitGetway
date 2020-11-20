<?php

namespace App\Models;

use CodeIgniter\Model;

class CardModel extends Model
{
    protected $table      = 'tb_card';
    // Uncomment below if you want add primary key
    // protected $primaryKey = 'id';
    protected $useTimestamps    = true;
    protected $allowedFields    =
    [
        'ID_Card',
        'ID_User',
        'Saldo',
        'Jenis',
        'Ket',
        'Warna',
        'Status'
    ];

    public function search($keyword)
    {
        // $builder = $this->tabel('tb_card');
        // $builder->like('ID_User', $keyword);
        // return $builder;
        return $this->table('tb_card')->like('ID_User', $keyword);
    }

    public function cari($ID_Card)
    {
        return $this->db->table('tb_card')
            ->where(array('ID_Card' => $ID_Card))
            ->get()->getRowArray();
    }
    public function total($ID_User)
    {
        return $this->db->table('tb_card')->like('ID_User', $ID_User)->get()->getResultArray();
    }
}
