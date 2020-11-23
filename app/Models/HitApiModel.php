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
}
