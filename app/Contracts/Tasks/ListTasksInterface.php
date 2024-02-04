<?php

namespace App\Contracts\Tasks;

use App\Http\Resources\Tasks\TaskListCollection;
use Illuminate\Http\Request;

interface ListTasksInterface
{
    public function index(Request $request): TaskListCollection;
    public function paginate($limit): int;
}