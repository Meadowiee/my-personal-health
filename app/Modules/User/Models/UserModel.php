<?php

namespace App\Modules\User\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'name', 'date_of_birth', 'blood_type', 'no_bpjs', 'diagnose', 'allergy', 'gender'];
    protected $validationRules = [
        'name'           => 'required|min_length[3]|max_length[100]',
        'date_of_birth'  => 'required|valid_date[Y-m-d]',
        'blood_type'     => 'required|string|max_length[2]',
        'no_bpjs'        => 'required|numeric|min_length[13]|max_length[16]',
        'diagnose'       => 'permit_empty|string|max_length[255]',
        'allergy'        => 'permit_empty|string|max_length[255]',
        'gender'         => 'required|in_list[Laki-laki,Perempuan]',
    ];

    public function getDataById($id)
    {
        return $this->where('id', $id)->first();
    }
}
