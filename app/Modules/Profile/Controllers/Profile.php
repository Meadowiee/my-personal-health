<?php

namespace App\Modules\Profile\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Modules\Profile\Models\ProfileModel;

class Profile extends ResourceController
{
    protected $model;
    public function __construct()
    {
        $this->model = new ProfileModel();
    }

    public function index()
    {
        $session = session();
        $id = $session->get('user_id');
        $getData = $this->model->getDataById($id);

        $data = [
            'title'     => 'Profile',
            'content'   => 'App\Modules\Profile\Views\view_profile',
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
        $validationRules = [
            'name'              => 'required|min_length[3]',
            'date_of_birth'     => 'permit_empty|valid_date',
            'blood_type'        => 'permit_empty|max_length[2]',
            'gender'            => 'permit_empty',
            'no_bpjs'           => 'permit_empty',
            'diagnose'          => 'permit_empty',
            'allergy'           => 'permit_empty',
        ];
        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }
        if ($this->model->insert($data)) {
            return $this->respondCreated($data);
        }
        return $this->failValidationErrors('Gagal menambahkan data');
    }
    
    public function update($id = null)
    {
        $data = $this->request->getPost();
        $validationRules = [
            'name'              => 'required|min_length[3]',
            'date_of_birth'     => 'permit_empty|valid_date',
            'blood_type'        => 'permit_empty|max_length[2]',
            'gender'            => 'permit_empty',
            'no_bpjs'           => 'permit_empty',
            'diagnose'          => 'permit_empty',
            'allergy'           => 'permit_empty',
        ];
        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }
        if ($this->model->update($id, $data)) {
            return redirect()->to('/profile')->with('success', 'Profile updated!');
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
            'content'       => 'App\Modules\Profile\Views\view_edit_profile',
            'getData'       => $getData,
            'parent'        => 'Profile',
            'parent_url'    => '/profile',
        ];
        return view('view_default', $data);
    }
}
