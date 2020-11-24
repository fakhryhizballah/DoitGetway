<?php

namespace App\Models;

use CodeIgniter\Model;


class ReaderModel extends Model
{
    protected $table            = 'tb_reader';
    protected $useTimestamps    = true;
    protected $allowedFields    =
    [
        'ID_Reader',
        'ID_Card',
        'ID_User',
        'Info',
        'Command',
        'Nominal'
    ];

    public function getReader($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['ID_Reader' => $id])->getRowArray();
        }
    }

    public function updateReader($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['ID_Reader' => $id]);
    }

    public function cari($reader)
    {
        return $this->db->table('tb_reader')
            ->where(array('ID_Reader' => $reader))
            ->get()->getRowArray();
    }

    public function hit($dataLog)
    {
        return $this->db->table('api_hit')->insert($dataLog);
    }

    public function sea($keyword)
    {
        // return $this->db->table('api_hit')->getWhere(['NameAPI' => $keyword])->getLastRow();
        return $this->db->table('api_hit')->where(array('NameAPI' => $keyword))->get()->getLastRow();
    }
}
