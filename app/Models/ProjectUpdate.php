<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectUpdate extends Model
{
    protected $fillable = [
        'project_id', 'type', 'message', 'created_by',
        'is_important', 'attachments'
    ];

    protected $casts = [
        'is_important' => 'boolean',
        'attachments' => 'array',
    ];

    // Relationships
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }
}
