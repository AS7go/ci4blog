<?php

namespace App\Controllers;

use App\Entities\Task;
use App\Models\TasksModel;

class Tasks extends BaseController
{
    private $model;
    
    public function __construct()
    {
        $this->model = new TasksModel();
    }

    public function index()
    {
        $data = $this->model->findAll();

        return view('Tasks/index', [
            'tasks' => $data,
            'title' => 'Project Tasks Listing',
            // 'title' => 'Листинг задач проекта',
        ]);
    }

    public function show($id)
    {
        $task = $this->getTaskOr404($id);
       
        return view('Tasks/show', [
            'task' => $task,
            'title' => 'View Task: '.$task->title,
            // 'title' => 'Просмотр задачи: '.$task->title,
        ]);
    }

    public function new()
    {
        return view('Tasks/new', [
            'title' => 'Add Task',
            // 'title' => 'Добавить задачу',
        ]);
    }

    public function store()
    {
        $task = new Task($this->request->getPost());

        if($this->model->insert($task)){
            return redirect()
                ->to('/tasks')
                ->with('success', 'Task created')
                ->with('data', $task);
        }else{
            return redirect()
                ->back()
                ->withInput($task)
                ->with('errors', $this->model->errors());
        }
    }

    public function edit($id)
    {
        $task = $this->getTaskOr404($id);

        if ($task === null) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Task with ID $id not found");
        }

        return view('Tasks/edit', [
            'task' => $task, 
            'title' => 'Edit: '.$task->title,
            // 'title' => 'Редактирование: '.$task->title,
        ]);
    }

    public function update($id)
    {
        $task = $this->getTaskOr404($id);
    
        $data = $this->request->getPost();
    
        // Исключаем `created_at`, чтобы избежать ложного изменения
        unset($data['created_at']);
    
        $task->fill($data);
    
        if (!$task->hasChanged()) {
            return redirect()
                ->back()
                ->with('warning', 'Nothing to update');
        }
    
        if ($this->model->save($task)) {
            return redirect()
                ->to('/tasks')
                ->with('success', 'Task updated')
                ->with('data', $task);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with('errors', $this->model->errors());
        }
    }

    public function delete($id)
    {
        $task = $this->getTaskOr404($id);

        if ($this->model->delete($id)) {
            return redirect()
                ->to('/tasks')
                ->with('success', 'Task deleted');
        } else {
            return redirect()
                ->back()
                ->with('errors', 'Failed to delete task');
        }
    }


    public function getTaskOr404($id)
    {
        $task = $this->model->find($id);
        
        if ($task === null) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Task with ID $id not found");
        }
        
        return $task;
    }
    
}