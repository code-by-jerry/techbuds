<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'project_id', 'title', 'description', 'status', 'assigned_to',
        'due_date', 'priority', 'progress_percentage', 'internal_comments',
        'milestone_id', 'order'
    ];

    protected $casts = [
        'due_date' => 'date',
        'priority' => 'integer',
        'progress_percentage' => 'integer',
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

    public function milestone()
    {
        return $this->belongsTo(Milestone::class);
    }
}
