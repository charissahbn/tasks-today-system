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
     ->where('is_archived', 0)
     ->orderBy('task_date', 'ASC')
     ->orderBy('created_at', 'ASC')
     ->findAll();

     return view('tasks/index', $data);
    }
    public function new()
{
    $data = [
        'title'      => 'New Task',
        'validation' => session('validation'),
    ];

    return view('tasks/new', $data);
}
public function create()
{
    $rules = [
        'title'     => 'required|max_length[150]',
        'status'    => 'required|in_list[pending,completed]',
        'task_date' => 'required|valid_date[Y-m-d]',
    ];

    if (! $this->validate($rules)) {
        return redirect()
            ->back()
            ->withInput()
            ->with('validation', $this->validator);
    }

    $taskModel = new TaskModel();

    $taskModel->insert([
        'title'       => $this->request->getPost('title'),
        'status'      => $this->request->getPost('status'),
        'task_date'   => $this->request->getPost('task_date'),
        'is_archived' => 0,
        'created_at'  => date('Y-m-d H:i:s'),
    ]);

    return redirect()
        ->to('/tasks')
        ->with('success', 'Task added successfully.');
}
public function edit($id)
{
    $taskModel = new TaskModel();

    $task = $taskModel
        ->where('id', $id)
        ->where('is_archived', 0)
        ->first();

    if ($task === null) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
            'Task not found.'
        );
    }

    $data = [
        'title'      => 'Edit Task',
        'task'       => $task,
        'validation' => session('validation'),
    ];

    return view('tasks/edit', $data);
}
public function update($id)
{
    $taskModel = new TaskModel();

    $task = $taskModel
        ->where('id', $id)
        ->where('is_archived', 0)
        ->first();

    if ($task === null) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
            'Task not found.'
        );
    }

    $rules = [
        'title'     => 'required|max_length[150]',
        'status'    => 'required|in_list[pending,completed]',
        'task_date' => 'required|valid_date[Y-m-d]',
    ];

    if (! $this->validate($rules)) {
        return redirect()
            ->back()
            ->withInput()
            ->with('validation', $this->validator);
    }

    $taskModel->update($id, [
        'title'     => $this->request->getPost('title'),
        'status'    => $this->request->getPost('status'),
        'task_date' => $this->request->getPost('task_date'),
    ]);

    return redirect()
        ->to('/tasks')
        ->with('success', 'Task updated successfully.');
}
public function archive($id)
    {
        $taskModel = new TaskModel();

        $task = $taskModel
            ->where('id', $id)
            ->where('is_archived', 0)
            ->first();

        if ($task === null) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                'Task not found.'
            );
        }

        $taskModel->update($id, [
            'is_archived' => 1,
        ]);

        return redirect()
            ->to('/tasks')
            ->with('success', 'Task archived successfully.');
    }

}
