<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Milestone extends Model
{
    protected $fillable = [
        'project_id', 'title', 'description', 'due_date', 'completed_date',
        'status', 'progress_percentage', 'order'
    ];

    protected $casts = [
        'due_date' => 'date',
        'completed_date' => 'date',
        'progress_percentage' => 'integer',
        'order' => 'integer',
    ];

    // Relationships
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    // Computed
    public function getTaskProgressAttribute()
    {
        $total = $this->tasks()->count();
        if ($total === 0) return 0;
        
        $completed = $this->tasks()->where('status', 'completed')->count();
        return round(($completed / $total) * 100);
    }
}
