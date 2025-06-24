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

    public function getLatestData($userId)
    {
        return $this->select('check_up_logs.*, icds.code AS icd_code, icds.name_en AS icd_name, icds.name_id AS icd_name_id')
            ->join('icds', 'icds.id = check_up_logs.icd_id', 'left')
            ->where('check_up_logs.user_id', $userId)
            ->orderBy('check_up_logs.date', 'DESC')
            ->limit(4)
            ->find();
    }
}
