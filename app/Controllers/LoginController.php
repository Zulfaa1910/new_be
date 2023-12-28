<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Models\RegisterModel;

class LoginController extends BaseController
{
    use ResponseTrait;

    protected $format = 'json';

    public function loginn()
    {
        $loginModel = new RegisterModel();

        $data = [
            'email' => $this->request->getVar('email'),
            'password' => $this->request->getVar('password'),
        ];

        $loginn = $loginModel->where('email', $data['email'])->first();

        if (!$loginn || $data['password'] != $loginn['password']) {
            return $this->respond([
                'code' => 400,
                'status' => 'failed',
                'messages' => 'Login failed. Please check your username and password.',
                'values' => []
            ]);
        }

        return $this->respond([
            'code' => 200,
            'status' => 'success',
            'message' => 'Login successful',
            'values' => [$loginn]
        ]);
    }
}
