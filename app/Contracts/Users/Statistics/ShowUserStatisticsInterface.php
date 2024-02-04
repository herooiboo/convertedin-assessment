<?php

namespace App\Contracts\Users\Statistics;

use App\Http\Resources\Users\Statistics\UserStatisticsCollection;

interface ShowUserStatisticsInterface
{
    public function listTop10TaskedUsers(): UserStatisticsCollection;
}