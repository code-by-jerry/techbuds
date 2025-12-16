<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ToolLink extends Model
{
    protected $fillable = [
        'tool_category_id',
        'title',
        'url',
        'description',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    public function category()
    {
        return $this->belongsTo(ToolCategory::class);
    }
}
