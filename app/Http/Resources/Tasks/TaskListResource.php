<?php

namespace App\Http\Resources\Tasks;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'            => $this->id,
            'title'         => $this->title,
            'assigned_by'   => $this->assignedBy?->name, // used this instead of when loaded because i dont want the code breaks in blade
            'assigned_to'   => $this->assignedTo?->name, // used this instead of when loaded because i dont want the code breaks in blade
            'created_at'    => $this->created_at
        ];
    }
}