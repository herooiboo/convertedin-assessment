<?php



namespace App\Services\Users\Statistics;


use Illuminate\Http\Request;

class UserStatisticsService
{

    public function __construct(
        private UpdateUserStatisticsService $UpdateUserStatistics,
        private ShowUserStatisticsService $showUserStatistics
    ) {
    }
    public function listTop10TaskedUsers()
    {
        return $this->showUserStatistics->listTop10TaskedUsers();
    }
    public function updateStatisticsOnTaskCreate($user_id)
    {
        $this->UpdateUserStatistics->updateStatisticsOnTaskCreate($user_id);
    }
}