<?php

namespace App\Contracts\Tasks;

use App\Models\Task;

interface CreateTaskInterface
{
    public function createTask(array $data): Task;
    public function updateUserStatstics(Task  $task): void;
}