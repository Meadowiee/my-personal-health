<?php

namespace App\Modules\CheckUp\Models;

use CodeIgniter\Model;

class CheckUpLogsModel extends Model
{
    protected $table = 'check_up_logs';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'date', 'icd_id', 'symptoms', 'treatment', 'notes', 'related_files', 'doctor', 'hospital_clinic'];

    public function getDataById($id)
    {
        return $this->where('id', $id)->first();
    }
}
