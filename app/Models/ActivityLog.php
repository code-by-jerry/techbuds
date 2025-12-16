<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    protected $fillable = [
        'user_id', 'project_id', 'client_id', 'action',
        'description', 'metadata', 'ip_address', 'user_agent'
    ];

    protected $casts = [
        'metadata' => 'array',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(Admin::class, 'user_id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
