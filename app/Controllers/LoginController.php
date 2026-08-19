<?php

namespace App\Controllers;

use App\Models\MRegistrasi;
use CodeIgniter\RESTful\ResourceController;

class LoginController extends ResourceController
{
    protected $format = 'json';

    public function login()
    {
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $model = new MRegistrasi();
        $member = $model->where('email', $email)->first();

        // 1. Cek Email
        if (!$member) {
            return $this->respond([
                'code' => 400,
                'status' => false,
                'data' => 'Email tidak ditemukan'
            ], 400);
        }

        // 2. Cek Password
        if (!password_verify($password, $member['password'])) {
            return $this->respond([
                'code' => 400,
                'status' => false,
                'data' => 'Password salah'
            ], 400);
        }

        // 3. Response Berhasil (Disesuaikan dengan Flutter Login Model)
        return $this->respond([
            'code' => 200,
            'status' => true,
            'data' => [
                'token' => 'token_' . $member['id'] . '_' . time(),
                'user' => [
                    'id' => (int)$member['id'],
                    'email' => $member['email']
                ]
            ]
        ], 200);
    }
}