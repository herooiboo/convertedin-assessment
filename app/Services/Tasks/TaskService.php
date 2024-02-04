<?php



namespace App\Services\Tasks;

use App\Http\Resources\Tasks\TaskListCollection;
use Illuminate\Http\Request;

class TaskService
{


    public function __construct(
        private TaskCreationService $createTaskService,
        private TaskListService $listTaskService
    ) { // PHP 8 Dependency Injection
    }

    public function createTask(array $data)
    {
        return $this->createTaskService->createTask($data);
    }

    public function index(Request $request)
    {
        return $this->listTaskService->index($request);
    }
}