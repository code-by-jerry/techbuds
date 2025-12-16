<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    protected $fillable = [
        'project_id', 'title', 'description', 'priority', 'status',
        'estimated_hours', 'actual_hours', 'notes', 'assigned_to',
        'due_date', 'order'
    ];

    protected $casts = [
        'due_date' => 'date',
        'estimated_hours' => 'integer',
        'actual_hours' => 'integer',
        'order' => 'integer',
    ];

    // Relationships
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function assignedTo()
    {
        return $this->belongsTo(Admin::class, 'assigned_to');
    }
}
