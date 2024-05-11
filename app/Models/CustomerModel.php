<?php
namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    /**
     * table name
     */
    protected $table = "tcustomer";

    /**
     * allow field
     */
    protected $allowedFields = [
        'nama_cust',
        'alamat',
        'no_telp'
    ];
    protected $primaryKey       = 'id_cust';

}
