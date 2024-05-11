<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailTransaksiModel extends Model
{
    /**
     * table name
     */
    protected $table = "tjual_detil";

    /**
     * allow field
     */
    protected $allowedFields = [
        'id_jual', 'id_barang', 'qty', 'harga_jual', 'jumlah'
    ];
    protected $primaryKey       = 'id_jualdetil';
}
