<?php

namespace App\Modules\User\Controllers;

use App\Controllers\BaseController;
use App\Modules\Profile\Models\ProfileModel;

class User extends BaseController
{
    protected $model;
    public function __construct()
    {
        $this->model = new ProfileModel();
    }

    public function index()
    {
        $perPage = 10;
        $getData = $this->model->paginate($perPage);
        $pager = $this->model->pager;

        $data = [
            'title'     => 'User Management',
            'content'   => 'App\Modules\User\Views\view_users',
            'data'      => $getData,
            'pager'     => $pager,
        ];
        return view('view_default', $data);
    }


    public function show($id = null)
    {
        $getData = $this->model->getDataById($id);
        $data = [
            'title'         => 'View User',
            'content'       => 'App\Modules\User\Views\view_the_user',
            'parent'        => 'User Management',
            'parent_url'    => '/user',
            'getData'       => $getData,
        ];
        return view('view_default', $data);
    }

    public function add()
    {
        helper('form');

        $data = [
            'title'         => 'Create User',
            'content'       => 'App\Modules\User\Views\view_edit_user',
            'parent'        => 'User Management',
            'parent_url'    => '/user',
            'getData'       => ['is_admin' => FALSE],
            'isEdit'        => false,
        ];
        return view('view_default', $data);
    }

    public function edit($id = null)
    {
        $getData = $this->model->getDataById($id);
        helper('form');

        $data = [
            'title'         => 'Edit User',
            'content'       => 'App\Modules\User\Views\view_edit_user',
            'parent'        => 'User Management',
            'parent_url'    => '/user',
            'getData'       => $getData,
            'isEdit'        => true,
        ];
        return view('view_default', $data);
    }

    public function create()
    {
        $data = $this->request->getPost();
        $validationRules = [
            'name'              => 'required|min_length[3]',
            'username'          => 'required|min_length[3]',
            'password'          => 'required|min_length[3]',
            'date_of_birth'     => 'permit_empty|valid_date',
            'blood_type'        => 'permit_empty|max_length[2]',
            'gender'            => 'permit_empty',
            'no_bpjs'           => 'permit_empty',
            'diagnose'          => 'permit_empty',
            'allergy'           => 'permit_empty',
            'is_admin'          => 'required',
        ];
        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }
        $data['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        if ($this->model->insert($data)) {
            return redirect()->to('/user')->with('success', 'User updated!');
        }
        return redirect()->back()->withInput()->with('error', 'Update failed.');
    }
    
    public function update($id = null)
    {
        $data = $this->request->getPost();
        $validationRules = [
            'name'              => 'required|min_length[3]',
            'username'          => 'required|min_length[3]',
            'date_of_birth'     => 'permit_empty|valid_date',
            'blood_type'        => 'permit_empty|max_length[2]',
            'gender'            => 'permit_empty',
            'no_bpjs'           => 'permit_empty',
            'diagnose'          => 'permit_empty',
            'allergy'           => 'permit_empty',
            'is_admin'          => 'required',
        ];
        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }
        if ($this->model->update($id, $data)) {
            return redirect()->to('/user')->with('success', 'User updated!');
        }
        return redirect()->back()->withInput()->with('error', 'Update failed.');
    }

    public function delete($id = null)
    {
        if ($this->model->delete($id)) {
            return redirect()->to('/user')->with('success', 'User deleted!');
        }
        return redirect()->back()->withInput()->with('error', 'Delete failed.');
    }
}
