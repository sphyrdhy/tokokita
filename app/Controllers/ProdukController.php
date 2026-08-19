<?php

namespace App\Controllers;

use App\Models\MProduk;
use CodeIgniter\RESTful\ResourceController;

class ProdukController extends ResourceController
{
    protected $format = 'json';

    // Get List Produk
    public function list()
    {
        $model = new MProduk();
        $produk = $model->findAll();
        return $this->respond([
            'code' => 200,
            'status' => true,
            'data' => $produk
        ], 200);
    }

    // Get Detail Produk
    public function detail($id = null)
    {
        $model = new MProduk();
        $produk = $model->find($id);
        if (!$produk) {
            return $this->respond([
                'code' => 404,
                'status' => false,
                'data' => 'Produk tidak ditemukan'
            ], 404);
        }
        return $this->respond([
            'code' => 200,
            'status' => true,
            'data' => $produk
        ], 200);
    }

    // Tambah Produk
    public function create()
    {
        $data = [
            'kode_produk' => $this->request->getVar('kode_produk'),
            'nama_produk' => $this->request->getVar('nama_produk'),
            'harga'       => $this->request->getVar('harga'),
        ];

        $model = new MProduk();
        $simpan = $model->save($data);

        if ($simpan) {
            return $this->respond([
                'code' => 200,
                'status' => true,
                'data' => 'Produk berhasil ditambahkan'
            ], 200);
        }

        return $this->respond([
            'code' => 400,
            'status' => false,
            'data' => 'Gagal menambah produk'
        ], 400);
    }

    // Ubah Produk
    public function ubah($id = null)
    {
        $data = [
            'kode_produk' => $this->request->getVar('kode_produk'),
            'nama_produk' => $this->request->getVar('nama_produk'),
            'harga'       => $this->request->getVar('harga'),
        ];

        $model = new MProduk();
        $update = $model->update($id, $data);

        if ($update) {
            return $this->respond([
                'code' => 200,
                'status' => true,
                'data' => 'Produk berhasil diubah'
            ], 200);
        }

        return $this->respond([
            'code' => 400,
            'status' => false,
            'data' => 'Gagal mengubah produk'
        ], 400);
    }

    // Hapus Produk
    public function hapus($id = null)
    {
        $model = new MProduk();
        $hapus = $model->delete($id);

        if ($hapus) {
            return $this->respond([
                'code' => 200,
                'status' => true,
                'data' => 'Produk berhasil dihapus'
            ], 200);
        }

        return $this->respond([
            'code' => 400,
            'status' => false,
            'data' => 'Gagal menghapus produk'
        ], 400);
    }
}