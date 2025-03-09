<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Entities\Task;


class TasksModel extends Model
{
    protected $table = 'tasks';

    protected $allowedFields = ['title', 'description', 'created_at'];
    
    protected $returnType = Task::class;

    protected $useTimestamps = true;

    protected $useEntity = true;

    protected $validationRules = [
        'title' => 'required|min_length[3]'
    ];
    protected $validationMessages = [
        'title' => [
            'required' => '1 Please enter a title',
            // 'required' => '1 Введите title',
            'min_length' => '2 Title must be longer than 2 characters'
            // 'min_length' => '2 Количество символов должно быть больше 2'
            ]
        ];
}
