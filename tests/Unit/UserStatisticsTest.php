<?php

namespace Tests\Unit;

use App\Models\User;
use App\Models\Task;
use App\Models\UserStatistic;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserStatisticsTest extends TestCase
{

    /**
     * Test to confirm that the task counts in UserStatistic match the actual task counts.
     *
     * @return void
     */
    public function testTaskCountMatchesTasks()
    {
        $userStats = UserStatistic::get();
        $totalTasksInStats =  $userStats->sum('task_count');
        $userActualTasksCount = Task::whereIn('assigned_to_id', $userStats->pluck('user_id'))->count();
        // Assert: Confirm that the task counts are equal
        $this->assertEquals($totalTasksInStats, $userActualTasksCount, 'Task counts do not match.');
    }
}