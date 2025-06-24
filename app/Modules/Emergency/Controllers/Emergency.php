<?php

namespace App\Modules\Emergency\Controllers;

use App\Controllers\BaseController;
use App\Modules\CheckUp\Models\CheckUpLogsModel;
use App\Modules\Logs\Models\PersonalLogsModel;
use App\Modules\Profile\Models\ProfileModel;

class Emergency extends BaseController
{
    public function index()
    {
        $id = session()->get('user_id');
        $model = new ProfileModel();
        $checkup = new CheckUpLogsModel();
        $getData = $model->getDataById($id);
        $getCheckup = $checkup->getLatestData($id);

        $icds = [];
        foreach ($getCheckup as $log) {
            $icds[] = [
                'code'  => $log['icd_code'],
                'name'  => $log['icd_name'],
            ];
        };

        $data = [
            'title'     => 'Emergency Card',
            'content'   => 'App\Modules\Emergency\Views\view_card',
            'data'      => $getData,
            'checkup'   => $getCheckup,
            'icds'      => $icds,
        ];
        return view('view_default', $data);
        
    }
    
    public function card($id = null) {
    }
}
