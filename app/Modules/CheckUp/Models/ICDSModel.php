<?php

namespace App\Modules\CheckUp\Models;

use CodeIgniter\Model;

class ICDSModel extends Model
{
    protected $table = 'icds';
    protected $primaryKey = 'id';
    protected $allowedFields = ['code', 'name_en', 'name_id'];

    public function getDataById($id)
    {
        return $this->where('id', $id)->first();
    }
}
