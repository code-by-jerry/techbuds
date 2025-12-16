<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Template extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'template_category_id',
        'title',
        'type',
        'description',
        'file_path',
        'external_url',
        'metadata',
        'is_active',
        'created_by',
    ];

    protected $casts = [
        'metadata' => 'array',
        'is_active' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(TemplateCategory::class, 'template_category_id');
    }
}

