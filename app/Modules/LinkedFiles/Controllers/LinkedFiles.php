<?php

namespace App\Modules\LinkedFiles\Controllers;

use App\Controllers\BaseController;
use App\Modules\CheckUp\Models\CheckUpLogsModel;
use App\Modules\Logs\Models\PersonalLogsModel;

class LinkedFiles extends BaseController
{
    public function index()
    {
        $checkupModel = new CheckUpLogsModel();
        $personalModel = new PersonalLogsModel();
        $allFiles = [];

        $checkups = $checkupModel->findAll();
        foreach ($checkups as $log) {
            $files = json_decode($log['related_files'] ?? '[]', true);
            foreach ($files as $file) {
                $allFiles[] = [
                    'alias'     => 'Check-Up File',
                    'name'      => $file,
                    'date'      => $log['date'],
                    'path'      => base_url('uploads/checkup/' . $file),
                    'isImage'   => preg_match('/\.(jpg|jpeg|png|gif)$/i', $file)
                ];
            }
        }
        
        $logs = $personalModel->findAll();
        foreach ($logs as $log) {
            $files = json_decode($log['related_files'] ?? '[]', true);
            foreach ($files as $file) {
                $allFiles[] = [
                    'alias'     => 'Personal File',
                    'name'      => $file,
                    'date'      => $log['date'],
                    'path'      => base_url('uploads/logs/' . $file),
                    'isImage'   => preg_match('/\.(jpg|jpeg|png|gif)$/i', $file)
                ];
            }
        }

        $data = [
            'title'     => 'Linked Files',
            'content'   => 'App\Modules\LinkedFiles\Views\view_linked_files',
            'files'     => $allFiles,
        ];
        return view('view_default', $data);
    }
}
