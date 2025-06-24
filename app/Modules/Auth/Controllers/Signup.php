<?php

namespace App\Modules\Auth\Controllers;

use App\Controllers\BaseController;
use App\Modules\Auth\Models\AuthModel;

class Signup extends BaseController
{
    public function index() {
        helper('form');
        return view('\App\Modules\Auth\Views\signup');
    }

    public function auth()
    {
        $model = new AuthModel();
        $validation = \Config\Services::validation();
        $rules = [
            'username' => 'required',
            'password' => 'required',
        ];

        $existingUser = $model->where('username', $this->request->getPost('username'))->first();
        if ($existingUser) {
            $data = ['error' => 'Username sudah digunakan'];
            return view('\App\Modules\Auth\Views\signup', $data);
        }
        
        if ($this->validate($rules)) {

            $data = [
                'username' => $this->request->getPost('username'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            ];

            $result = $model->insertData($data);
            if ($result) {
                return redirect()->to('/login');
            } else {
                $data = ['error' => 'Data gagal tersimpan'];
            }
        } else {
            $data = ['error' => $validation->listErrors()];
            return view('\App\Modules\Auth\Views\signup', $data);
        }
    }
}