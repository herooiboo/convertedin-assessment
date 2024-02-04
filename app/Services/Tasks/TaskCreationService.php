<?php

namespace App\Services\Tasks;

use App\Contracts\Tasks\CreateTaskInterface;
use App\Events\Tasks\TaskCreated;
use App\Models\Task;


class TaskCreationService implements CreateTaskInterface
{
    public function createTask(array $data): Task
    {
        $task = Task::create($data);
        if ($task)
            $this->updateUserStatstics($task);
        return $task;
    }
    public function updateUserStatstics(Task $task): void
    {
        event(new TaskCreated($task)); // Event Fires to Update statistics, Will use queues for background process.
    }
}