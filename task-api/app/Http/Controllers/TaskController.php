<?php

namespace App\Http\Controllers;

use App\Services\TaskService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TaskController extends Controller
{
    protected $taskService;

    // We "Inject" the Service here
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
        // Basic validation as requested
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $task = $this->taskService->createTask($validated);
        
        // Return JSON with "201 Created" status code
        return response()->json($task, Response::HTTP_CREATED);
    }
}