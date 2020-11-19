<?php

namespace App\Models;

use CodeIgniter\Model;

class IplogModel extends Model
{
    protected $table      = 'tb_ip_log';
    // Uncomment below if you want add primary key
    // protected $primaryKey = 'id';
    protected $useTimestamps    = true;

    protected $allowedFields    =
    [
        'IP_ADDR',
        'ID_HOST',
        'User',
        'Command',
    ];
}
