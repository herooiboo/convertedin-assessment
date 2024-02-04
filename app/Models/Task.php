<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'assigned_to_id',
        'assigned_by_id',
    ];

    public function assignedTo()
    {
        return $this->belongsTo(User::class, 'assigned_to_id');
    }

    public function assignedBy()
    {
        return $this->belongsTo(Admin::class, 'assigned_by_id');
    }



    public function scopesearch($query, $search)
    {
        if ($search)
            return $query->where('title', 'like', "%$search%")
                ->orWhereHas('assignedTo', function ($subquery) use ($search) {
                    $subquery->search($search);
                })
                ->orWhereHas('assignedBy', function ($subquery) use ($search) {
                    $subquery->search($search);
                });
    }
}