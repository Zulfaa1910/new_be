<?php

namespace App\Models;

use CodeIgniter\Model;

class RegisterModel extends Model
{
    protected $table = 'registrasi';
    protected $primaryKey = 'id';
    protected $allowedFields = 
    [
        'name',
        'email',
        'password'
    ];

}