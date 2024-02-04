<?php



namespace App\Services\Users\Statistics;

use App\Contracts\Users\Statistics\UpdateUserStatisticsInterface;
use App\Models\Task;
use App\Models\UserStatistic;

class UpdateUserStatisticsService implements UpdateUserStatisticsInterface
{
    public function updateStatisticsOnTaskCreate($user_id): void
    {
        UserStatistic::updateOrCreate(
            ['user_id' => $user_id],
            ['task_count' => $this->countUserTasks($user_id)]
        );
    }
    public function countUserTasks($user_id): int
    {
        return Task::where('assigned_to_id', $user_id)->count();
    }
}