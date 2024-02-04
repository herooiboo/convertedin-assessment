<?php

namespace App\Contracts\Users\Statistics;

use Illuminate\Http\Request;

interface UpdateUserStatisticsInterface
{
    public function updateStatisticsOnTaskCreate($user_id): void;
    public function countUserTasks($user_id): int;
}