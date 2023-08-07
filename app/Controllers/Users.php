<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Users extends ResourceController
{

    protected $modelName  = 'App\Models\UserModel';
    protected $format = 'json';

    public function index()
    {
        // dd($this->model);
        return $this->respond($this->model->findAll());
    }

    public function create()
    {
        helper('form');
        $post = $this->request->getVar();
        $data = [
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'password' => $this->request->getVar('password')
        ];

        // return $this->respond(['method' => $post]);
        if (!$this->model->insert($post)) {
            return $this->failValidationErrors(['message' => 'error']);
        }

        $data = [
            'message' => 'succesfull create User'
        ];

        return $this->respondCreated($data);
    }

    public function show($id = null)
    {
        $record = $this->model->find($id);

        if (!$record) {
            $error = [
                'message' => 'users with id ' . $id . ' not found'
            ];
            return $this->fail($error);
        }

        return $this->respond($record);
    }

    public function update($id = null)
    {
        $data = [
            'id_user' => $id,
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'password' => $this->request->getVar('password')
        ];

        $this->model->save($data);

        return $this->respond(['message' => "Succesfull Update"], 202);
    }

    public function delete($id = null)
    {
        $this->model->delete($id);
        return $this->respondDeleted(['id_user' => $id, 'message' => 'User Deleted'], 'User Deleted');
    }
}
