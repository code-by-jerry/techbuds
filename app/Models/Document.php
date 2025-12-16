<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Document extends Model
{
    protected $fillable = [
        'project_id', 'name', 'category', 'file_path', 'file_name',
        'file_size', 'mime_type', 'description', 'uploaded_by'
    ];

    // Relationships
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function uploadedBy()
    {
        return $this->belongsTo(Admin::class, 'uploaded_by');
    }

    // Accessors
    public function getFileUrlAttribute()
    {
        return Storage::url($this->file_path);
    }
}
