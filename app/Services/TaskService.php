<?php

namespace App\Services;

use App\Models\Task;

class TaskService
{
    public function getAllTasks()
    {
        return Task::all();
    }

    public function createTask(array $data)
    {
        return Task::create($data);
    }
}