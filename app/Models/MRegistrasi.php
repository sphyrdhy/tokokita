<?php

namespace App\Models;

use CodeIgniter\Model;

class MRegistrasi extends Model
{
    protected $table            = 'member';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    
    // Sesuaikan nama kolom berikut dengan kolom yang ada di database phpMyAdmin
    protected $allowedFields    = ['nama', 'email', 'password'];
}