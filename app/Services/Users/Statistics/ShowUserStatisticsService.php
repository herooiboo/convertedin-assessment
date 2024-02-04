<?php



namespace App\Services\Users\Statistics;

use App\Contracts\Users\Statistics\ShowUserStatisticsInterface;
use App\Http\Resources\Users\Statistics\UserStatisticsCollection;
use App\Models\Task;
use App\Models\UserStatistic;

class ShowUserStatisticsService implements ShowUserStatisticsInterface
{
    protected $with = [
        'user'
    ];
    public function listTop10TaskedUsers(): UserStatisticsCollection
    {
        $userStatistics = UserStatistic::with($this->with)
            ->orderByDesc('task_count')
            ->limit(10)
            ->get();
        return new UserStatisticsCollection($userStatistics);
    }
}