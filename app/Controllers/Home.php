<?php

namespace App\Controllers;
use App\Models\TaskModel;

class Home extends BaseController
{
    public function index(): string
    {
      $taskModel = new TaskModel();

$today = date('Y-m-d');

$data['title'] = 'Tasks for Today';
$data['today'] = $today;
$data['tasks'] = $taskModel
    ->where('task_date', $today)
    ->orderBy('created_at', 'ASC')
    ->findAll();

return view('welcome/index', $data);
    }
}
