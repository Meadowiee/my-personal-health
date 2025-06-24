<?php

namespace App\Modules\Logs\Models;

use CodeIgniter\Model;

class PersonalLogsModel extends Model
{
    protected $table = 'personal_logs';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'date', 'title', 'symptoms', 'treatment', 'related_files'];

    public function getDataById($id)
    {
        return $this->where('id', $id)->first();
    }
}
