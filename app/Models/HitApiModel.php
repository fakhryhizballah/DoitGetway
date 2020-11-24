<?php

namespace App\Models;

use CodeIgniter\Model;


class HitApiModel extends Model
{
    protected $table            = 'api_hit';
    protected $useTimestamps    = true;
    protected $allowedFields    =
    [
        'IP',
        'LinkAPI',
        'NameAPI',
        'Respoun'
    ];
    public function search($keyword)
    {
        // $builder = $this->tabel('tb_card');
        // $builder->like('ID_User', $keyword);
        // return $builder;
        return $this->table('api_hit')->like('LinkAPI', $keyword)->orderBy('created_at', 'DESC')->findAll(1);
    }
}
