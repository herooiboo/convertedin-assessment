<?php

namespace App\Http\Controllers;

use App\Services\Users\Statistics\UserStatisticsService;
use Illuminate\Http\Request;

class UserStatisticsController extends Controller
{
    function __construct(private UserStatisticsService $UserStatisticsService)
    {
    }
    public function showUserTaskStatistics()
    {
        $statistics =  $this->UserStatisticsService->listTop10TaskedUsers();
        return view('users.statistics.topTaskedUsers', compact('statistics'));
    }
}