<?php

namespace App\Modules\Profile\Models;

use CodeIgniter\Model;

class ProfileModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'name', 'date_of_birth', 'blood_type', 'no_bpjs', 'diagnose', 'allergy', 'gender', 'is_admin', 'password'];

    public function getDataById($id)
    {
        return $this->where('id', $id)->first();
    }
}
