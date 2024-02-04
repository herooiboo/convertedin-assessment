<?php

namespace App\Services\Tasks;


use App\Contracts\Tasks\ListTasksInterface;
use App\Http\Resources\Tasks\TaskListCollection;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskListService implements ListTasksInterface
{
    protected $with = ['assignedTo', 'assignedBy'];

    public function index(Request $request): TaskListCollection
    {

        $tasks = Task::with($this->with)
            ->search($request->search ?? null)
            ->paginate($this->paginate($request->limit ?? null));
        return  new TaskListCollection($tasks);
    }

    public function paginate($limit): int
    {
        if ($limit && is_numeric($limit)) return $limit;
        return 10;
    }
}