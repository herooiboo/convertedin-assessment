<?php

namespace App\Http\Controllers;

use App\Http\Requests\Tasks\TaskStoreRequest;
use App\Http\Resources\Tasks\TaskListCollection;
use App\Models\Task;
use App\Services\Tasks\TaskService;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct(private TaskService $taskService)
    {
    }

    public function index(Request $request)
    {
        $tasks = $this->taskService->index($request);
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(TaskStoreRequest $request)
    {
        $task = $this->taskService->createTask($request->validated());
        return successFailResponse([
            'on_success_variable'       => $task,
            'success_redirect_route'    => route('tasks.index'),
            'success_message'           => 'Task Created Successfully',
            'error_redirect_route'      => null,
            'error_message'             => 'Faild To Create the Task',
        ]);
    }
}