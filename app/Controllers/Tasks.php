<?php

namespace App\Controllers;
use App\Models\TaskModel;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Tasks extends BaseController
{
    public function index()
    {
        $taskModel = new TaskModel();

     $data['title'] = 'All Tasks';
     $data['tasks'] = $taskModel
     ->orderBy('task_date', 'ASC')
     ->orderBy('created_at', 'ASC')
     ->findAll();

     return view('tasks/index', $data);
    }
}
