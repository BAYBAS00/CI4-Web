<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    /**
     * table name
     */
    protected $table = "tbarang";

    /**
     * allow field
     */
    protected $allowedFields = [
        'nama_barang', 'satuan', 'harga_jual', 'stok'
    ];
    protected $primaryKey       = 'id_barang';
}
