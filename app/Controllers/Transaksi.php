<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\TransaksiModel;

class Transaksi extends ResourceController
{
    use ResponseTrait;

    // Retrieve all transactions
    public function index()
    {
        $model = new TransaksiModel();
        $data = $model->findAll();
        return $this->respond($data);
    }

    // Retrieve a single transaction by ID
    public function show($id = null)
    {
        $model = new TransaksiModel();
        $data = $model->find($id);

        if (!$data) {
            return $this->failNotFound('No Data Found');
        }

        return $this->respond($data);
    }

    // Create a new transaction
    public function create()
    {
        $model = new TransaksiModel();

        // Validate input
        $validation = \Config\Services::validation();
        $rules = [
            'nama' => 'required',
            'no_tlp' => 'required',
            'alamat' => 'required',
            'metode_pembayaran' => 'required',
        ];

        if (!$this->validate($rules)) {
            return $this->fail($validation->getErrors());
        }

        $data = [
            'nama' => $this->request->getVar('nama'),
            'no_tlp' => $this->request->getVar('no_tlp'),
            'alamat' => $this->request->getVar('alamat'),
            'metode_pembayaran' => $this->request->getVar('metode_pembayaran'),
            // Add other fields as needed
        ];

        $model->save($data);

        $response = [
            'status' => 201,
            'error' => null,
            'messages' => [
                'success' => 'Data Inserted'
            ]
        ];

        return $this->respondCreated($response);
    }

    // Update a transaction by ID
    public function update($id = null)
    {
        $model = new TransaksiModel();

        // Validate input
        $validation = \Config\Services::validation();
        $rules = [
            'nama' => 'required',
            'no_tlp' => 'required',
            'alamat' => 'required',
            'metode_pembayaran' => 'required',
        ];

        if (!$this->validate($rules)) {
            return $this->fail($validation->getErrors());
        }

        $data = [
            'nama' => $this->request->getVar('nama'),
            'no_tlp' => $this->request->getVar('no_tlp'),
            'alamat' => $this->request->getVar('alamat'),
            'metode_pembayaran' => $this->request->getVar('metode_pembayaran'),
            // Add other fields as needed
        ];

        $model->update($id, $data);

        $response = [
            'status' => 200,
            'error' => null,
            'messages' => [
                'success' => 'Data Updated'
            ]
        ];

        return $this->respond($response);
    }

    // Delete a transaction by ID
    public function delete($id = null)
    {
        $model = new TransaksiModel();
        $model->delete($id);

        $response = [
            'status' => 200,
            'error' => null,
            'messages' => [
                'success' => 'Data Deleted'
            ]
        ];

        return $this->respond($response);
    }
}
