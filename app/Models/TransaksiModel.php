<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    /**
     * table name
     */
    protected $table = "tjual";

    /**
     * allow field
     */
    protected $allowedFields = [
        'id_cust', 'tgl_jual', 'no_transaksi', 'total', 'diskon', 'ppn', 'grand_total'
    ];
    protected $primaryKey       = 'id_jual';
}
