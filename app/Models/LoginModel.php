<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table = 'pelanggan';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'password'];

    // Tambahkan method atau fungsi lain jika diperlukan
}