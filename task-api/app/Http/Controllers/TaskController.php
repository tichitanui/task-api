<?php

namespace App\Http\Controllers;

use App\Services\TaskService;
use App\Models\Task; // This tells the controller where the Task model is
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TaskController extends Controller
{
    protected $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function index()
    {
        $tasks = $this->taskService->getAllTasks();
        return response()->json($tasks, Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $task = $this->taskService->createTask($validated);
        return response()->json($task, Response::HTTP_CREATED);
    }

    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'is_completed' => 'boolean',
        ]);

        $updatedTask = $this->taskService->updateTask($task, $validated);
        return response()->json($updatedTask, Response::HTTP_OK);
    }

    public function destroy(Task $task)
    {
        $this->taskService->deleteTask($task);
        return response()->json(null, Response::HTTP_NO_CONTENT); 
    }
}