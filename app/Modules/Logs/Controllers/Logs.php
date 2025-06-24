<?php

namespace App\Modules\Logs\Controllers;

use App\Controllers\BaseController;
use App\Modules\Logs\Models\PersonalLogsModel;

class Logs extends BaseController
{
    protected $model;
    public function __construct()
    {
        $this->model = new PersonalLogsModel();
    }

    public function index()
    {
        $perPage = 10;
        $getData = $this->model->paginate($perPage);
        $pager = $this->model->pager;

        $data = [
            'title'     => 'Personal Logs',
            'content'   => 'App\Modules\Logs\Views\view_logs',
            'data'      => $getData,
            'pager'     => $pager,
        ];
        return view('view_default', $data);
    }


    public function show($id = null)
    {
        $getData = $this->model->getDataById($id);
        $data = [
            'title'         => 'View Personal Log',
            'content'       => 'App\Modules\logs\Views\view_my_logs',
            'parent'        => 'Personal Log',
            'parent_url'    => '/logs',
            'getData'       => $getData,
        ];
        return view('view_default', $data);
    }

    public function add()
    {
        helper('form');

        $data = [
            'title'         => 'Create Personal Log',
            'content'       => 'App\Modules\logs\Views\view_edit_logs',
            'parent'        => 'Personal Log',
            'parent_url'    => '/logs',
            'getData'       => ['date' => date('Y-m-d')],
            'isEdit'        => false,
        ];
        return view('view_default', $data);
    }

    public function edit($id = null)
    {
        $getData = $this->model->getDataById($id);
        helper('form');

        $data = [
            'title'         => 'Edit Personal Log',
            'content'       => 'App\Modules\logs\Views\view_edit_logs',
            'parent'        => 'Personal Log',
            'parent_url'    => '/logs',
            'getData'       => $getData,
            'isEdit'        => true,
        ];
        return view('view_default', $data);
    }

    public function create()
    {
        $id = session()->get('user_id');
        $data = $this->request->getPost();

        $validationRules = [
            'date'            => 'required|valid_date',
            'title'            => 'required',
            'symptoms'        => 'required',
            'treatment'       => 'required',
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
            $file->move(FCPATH . 'uploads/logs', $newName);
            $data['related_files'] = json_encode([$newName]);
        }
        if ($this->model->insert($data)) {
            return redirect()->to('/logs')->with('success', 'Personal log updated!');
        }
        return redirect()->back()->withInput()->with('error', 'Update failed.');
    }

    public function update($id = null)
    {
        $data = $this->request->getPost();

        $validationRules = [
            'date'            => 'required|valid_date',
            'title'            => 'required',
            'symptoms'        => 'required',
            'treatment'       => 'required',
            'related_files'   => 'permit_empty|max_size[related_files,2048]|ext_in[related_files,jpg,jpeg,png,pdf,docx]',
        ];
        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $file = $this->request->getFile('related_files');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $timestamp = date('YmdHis');
            $newName = $timestamp . '_' . $file->getRandomName();
            $file->move(FCPATH . 'uploads/logs', $newName);
            $data['related_files'] = json_encode([$newName]);
        }
        if ($this->model->update($id, $data)) {
            return redirect()->to('/logs')->with('success', 'Personal log updated!');
        }
        return redirect()->back()->withInput()->with('error', 'Update failed.');
    }


    public function delete($id = null)
    {
        if ($this->model->delete($id)) {
            return redirect()->to('/checkup')->with('success', 'Personal log deleted!');
        }
        return redirect()->back()->withInput()->with('error', 'Delete failed.');
    }
}
