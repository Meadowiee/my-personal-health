<?php

namespace App\Modules\Auth\Controllers;

use App\Controllers\BaseController;
use App\Modules\Auth\Models\AuthModel;

class Login extends BaseController
{
    public function index() {
        helper('form');
        return view('\App\Modules\Auth\Views\login');
    }

    public function auth()
    {
        $session = session();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $model = new AuthModel();
        $user = $model->getUserByUsername($username);

        if ($user && password_verify($password, $user['password'])) {
            $sessdata = [
                'user_id' => $user['id'],
                'username' => $user['username'],
                'logged_in' => TRUE,
            ];
            $session->set($sessdata);
            return redirect()->to('/');
        } else {
            $session->setFlashdata('msg', 'Invalid username or password');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}