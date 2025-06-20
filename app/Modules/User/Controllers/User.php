<?php

namespace App\Modules\User\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Modules\User\Models\UserModel;

class User extends ResourceController
{
    protected $model;
    public function __construct()
    {
        $this->model = new UserModel();
    }

    public function index()
    {
        $session = session();
        $id = $session->get('user_id');
        $getData = $this->model->getDataById($id);

        $data = [
            'title'     => 'Profile',
            'content'   => 'App\Modules\User\Views\view_profile',
            'getData'   => $getData,
        ];
        return view('view_default', $data);
    }

    public function show($id = null)
    {
        $data = $this->model->getDataById($id);
        if ($data) return $this->respond($data);
        return $this->failNotFound('User dengan ID tersebut tidak ditemukan');
    }

    public function create()
    {
        $data = $this->request->getJSON(true);
        if ($this->model->insert($data)) {
            return $this->respondCreated($data);
        }
        return $this->failValidationErrors('Gagal menambahkan data');
    }

    public function update($id = null)
    {
        $data = $this->request->getPost();
        if ($this->model->update($id, $data)) {
            return redirect()->to('/user')->with('success', 'Profile updated!');
        }
        return redirect()->back()->withInput()->with('error', 'Failed to update profile');
    }

    public function edit($id = null)
    {
        $session = session();
        $id = $session->get('user_id');
        $getData = $this->model->getDataById($id);
        helper('form');

        $data = [
            'title'         => 'Edit Profile',
            'content'       => 'App\Modules\User\Views\view_edit_profile',
            'getData'       => $getData,
            'parent'        => 'Profile',
            'parent_url'    => '/user',
        ];
        return view('view_default', $data);
    }
}
