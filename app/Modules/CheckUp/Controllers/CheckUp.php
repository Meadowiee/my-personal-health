<?php

namespace App\Modules\CheckUp\Controllers;

use App\Controllers\BaseController;
use App\Modules\CheckUp\Models\CheckUpLogsModel;
use App\Modules\CheckUp\Models\ICDSModel;

class CheckUp extends BaseController
{
    protected $model;
    public function __construct()
    {
        $this->model = new CheckUpLogsModel();
    }

    public function index()
    {
        $perPage = 10;
        $getData = $this->model->paginate($perPage);
        $pager = $this->model->pager;

        $data = [
            'title'     => 'Check-Up Logs',
            'content'   => 'App\Modules\CheckUp\Views\view_checkup',
            'data'      => $getData,
            'pager'     => $pager,
        ];
        return view('view_default', $data);
    }


    public function show($id = null)
    {
        $icdModel = new ICDSModel();
        $icds = $icdModel->findAll();
        $getData = $this->model->getDataById($id);
        $data = [
            'title'         => 'View Check-Up Log',
            'content'       => 'App\Modules\CheckUp\Views\view_my_checkup',
            'parent'        => 'Check-Up Log',
            'parent_url'    => '/checkup',
            'getData'       => $getData,
            'icds'          => $icds,
        ];
        return view('view_default', $data);
    }
    public function add()
    {
        $icdModel = new ICDSModel();
        $icds = $icdModel->findAll();
        helper('form');

        $data = [
            'title'         => 'Create Check-Up Log',
            'content'       => 'App\Modules\CheckUp\Views\view_edit_checkup',
            'parent'        => 'Check-Up Log',
            'parent_url'    => '/checkup',
            'getData'       => ['date' => date('Y-m-d')],
            'icds'          => $icds,
            'isEdit'        => true,
        ];
        return view('view_default', $data);
    }

    public function edit($id = null)
    {
        $icdModel = new ICDSModel();
        $getData = $this->model->getDataById($id);
        $icds = $icdModel->findAll();
        helper('form');

        $data = [
            'title'         => 'Edit Check-Up Log',
            'content'       => 'App\Modules\CheckUp\Views\view_edit_checkup',
            'parent'        => 'Check-Up Log',
            'parent_url'    => '/checkup',
            'getData'       => $getData,
            'icds'          => $icds,
            'isEdit'        => true,
        ];
        return view('view_default', $data);
    }

    public function create()
    {
        $id = session()->get('user_id');
        $data = $this->request->getPost();

        $validationRules = [
            'doctor'          => 'required|min_length[3]',
            'hospital_clinic' => 'required',
            'symptoms'        => 'required',
            'date'            => 'required|valid_date',
            'icd_id'          => 'permit_empty|numeric',
            'treatment'       => 'required',
            'notes'           => 'permit_empty',
            'related_files'   => 'permit_empty|max_size[related_files,2048]|ext_in[related_files,jpg,jpeg,png,pdf,docx]',
        ];
        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $data['user_id'] = $id;
        $file = $this->request->getFile('related_files');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $timestamp = date('YmdHis');
            $newName = $timestamp . '_' . $file->getRandomName();
            $file->move(FCPATH . 'uploads/checkup', $newName);
            $data['related_files'] = json_encode([$newName]);
        }
        if ($this->model->insert($data)) {
            return redirect()->to('/checkup')->with('success', 'Check up log updated!');
        }
        return redirect()->back()->withInput()->with('error', 'Update failed.');
    }

    public function update($id = null)
    {
        $data = $this->request->getPost();

        $validationRules = [
            'doctor'          => 'required|min_length[3]',
            'hospital_clinic' => 'required',
            'symptoms'        => 'required',
            'date'            => 'required|valid_date',
            'icd_id'          => 'permit_empty|numeric',
            'treatment'       => 'required',
            'notes'           => 'permit_empty',
            'related_files'   => 'permit_empty|max_size[related_files,2048]|ext_in[related_files,jpg,jpeg,png,pdf,docx]',
        ];
        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $file = $this->request->getFile('related_files');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $timestamp = date('YmdHis');
            $newName = $timestamp . '_' . $file->getRandomName();
            $file->move(FCPATH . 'uploads/checkup', $newName);
            $data['related_files'] = json_encode([$newName]);
        }
        if ($this->model->update($id, $data)) {
            return redirect()->to('/checkup')->with('success', 'Check up log updated!');
        }
        return redirect()->back()->withInput()->with('error', 'Update failed.');
    }


    public function delete($id = null)
    {
        if ($this->model->delete($id)) {
            return redirect()->to('/checkup')->with('success', 'Check up log deleted!');
        }
        return redirect()->back()->withInput()->with('error', 'Delete failed.');
    }
}
