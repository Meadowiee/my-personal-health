<?php

namespace App\Modules\Auth\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $table = 'user';

    public function insertData($data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        return $builder->insert($data);
    }

    public function getUserByUsername($username)
    {
        return $this->where('username', $username)->first();
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}
