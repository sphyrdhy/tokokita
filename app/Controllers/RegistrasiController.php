<?php

namespace App\Controllers;

use App\Models\MRegistrasi;
use CodeIgniter\RESTful\ResourceController;

class RegistrasiController extends ResourceController
{
    protected $format = 'json';

    public function registrasi()
    {
        $nama = $this->request->getVar('nama');
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        if (!$nama || !$email || !$password) {
            return $this->respond([
                'code' => 400,
                'status' => false,
                'data' => 'Data tidak boleh kosong'
            ], 400);
        }

        $data = [
            'nama' => $nama,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ];

        $model = new MRegistrasi();
        $simpan = $model->save($data);

        if ($simpan) {
            return $this->respond([
                'code' => 200,
                'status' => true,
                'data' => 'Registrasi Berhasil'
            ], 200);
        }

        return $this->respond([
            'code' => 400,
            'status' => false,
            'data' => 'Registrasi Gagal'
        ], 400);
    }
}