<?php

namespace App\Http\Resources\Users\Statistics;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserStatisticsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'user_name'     => $this->user?->name,
            'tasks_count'   => $this->task_count,
            'updated_at'    => $this->updated_at
        ];
    }
}