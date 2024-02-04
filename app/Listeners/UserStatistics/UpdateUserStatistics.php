<?php

namespace App\Listeners\UserStatistics;

use App\Events\Tasks\TaskCreated;
use App\Events\UserStatstics\StatisticsUpdate;
use App\Services\Users\Statistics\UserStatisticsService;
use Illuminate\Contracts\Queue\ShouldQueue;


class UpdateUserStatistics implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct(private UserStatisticsService $userStatisticsService)
    {
    }

    /**
     * Handle the event.
     */
    public function handle(TaskCreated $event): void
    {
        $this->userStatisticsService->updateStatisticsOnTaskCreate($event->task->assigned_to_id);
    }
}