<?php

namespace App\Models;

use CodeIgniter\Model;

class MProduk extends Model
{
    protected $table            = 'produk';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['kode_produk', 'nama_produk', 'harga'];
}