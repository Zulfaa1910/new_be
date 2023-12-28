<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class RegistrasiController extends ResourceController
{
    protected $format = 'json';

    public function index()
    {
        $registerModel = new \App\Models\registerModel();
        $data = $registerModel->findAll();

        if (!empty($data)) {
            $response = [
                'status' => 'success',
                'message' => 'Data retrieved successfully',
                'data' => $data
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'No data found',
                'data' => []
            ];
        }

        return $this->respond($response);
    }

    public function create()
    {
        $data = [
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
            'password' => $this->request->getVar('password'),
        ];
        $registerModel = new \App\Models\registerModel();
        $registerModel->save($data);
        $response = [
            'status' => 200,
            'messages' => 'Data berhasil ditambahkan',
            'data' => $data,
        ];
        return $this->respond($response);
    }

// function untuk mengedit data
public function update($id = null)
{
    $registerModel = new \App\Models\registerModel();
    $mahasiswa = $registerModel->find($id);

    if (!$mahasiswa) {
        return $this->failNotFound('Data tidak ditemukan');
    }

    $data = [
        'id' => $id,
        'name' => $this->request->getVar('name'),
        'email' => $this->request->getVar('email'),
        'password' => $this->request->getVar('password'),
    ];

    // Ganti bagian ini untuk menggunakan update
    $proses = $registerModel->update($id, $data);

    if ($proses) {
        $response = [
            'status' => 200,
            'messages' => 'Data berhasil diubah',
            'data' => $data
        ];
    } else {
        $response = [
            'status' => 402,
            'messages' => 'Gagal diubah',
        ];
    }

    return $this->respond($response);
}

    // function untuk menghapus data
    public function delete($id = null)
    {
        $registerModel = new \App\Models\registerModel();
        $mahasiswa = $registerModel->find($id);
        if ($mahasiswa) {
            $proses = $registerModel->delete($id);
            if ($proses) {
                $response = [
                    'status' => 200,
                    'messages' => 'Data berhasil dihapus',
                ];
            } else {
                $response = [
                    'status' => 402,
                    'messages' => 'Gagal menghapus data',
                ];
            }
            return $this->respond($response);
        } else {
            return $this->failNotFound('Data tidak ditemukan');
        }
    }
}