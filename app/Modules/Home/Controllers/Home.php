<?php

namespace App\Modules\Home\Controllers;
use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Dashboard',
            'content' => '\App\Modules\Home\Views\view_landing-page',
        ];
        return view('view_default', $data);
    }

}
