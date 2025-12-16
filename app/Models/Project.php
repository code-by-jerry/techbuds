<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'client_id', 'title', 'description', 'status', 'start_date',
        'end_date', 'actual_end_date', 'budget', 'payment_status',
        'payment_structure', 'assigned_to', 'progress_percentage',
        'internal_notes'
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'actual_end_date' => 'date',
        'budget' => 'decimal:2',
        'progress_percentage' => 'integer',
    ];

    // Relationships
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function assignedTo()
    {
        return $this->belongsTo(Admin::class, 'assigned_to');
    }

    public function requirements()
    {
        return $this->hasMany(Requirement::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function milestones()
    {
        return $this->hasMany(Milestone::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function projectUpdates()
    {
        return $this->hasMany(ProjectUpdate::class);
    }

    public function teamMembers()
    {
        return $this->belongsToMany(Admin::class, 'project_team_members')
            ->withPivot('role')
            ->withTimestamps();
    }

    public function activityLogs()
    {
        return $this->hasMany(ActivityLog::class);
    }

    // Computed properties
    public function getTotalInvoicedAttribute()
    {
        return $this->invoices()->sum('total_amount');
    }

    public function getTotalPaidAttribute()
    {
        return $this->invoices()->where('status', 'paid')->sum('total_amount');
    }

    public function getRemainingBudgetAttribute()
    {
        return $this->budget ? ($this->budget - $this->total_paid) : null;
    }
}
