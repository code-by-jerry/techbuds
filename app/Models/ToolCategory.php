<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ToolCategory extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($category) {
            if (empty($category->slug)) {
                $category->slug = Str::slug($category->name);
            }
        });
    }

    public function links()
    {
        return $this->hasMany(ToolLink::class)->where('is_active', true)->orderBy('order');
    }

    public function allLinks()
    {
        return $this->hasMany(ToolLink::class)->orderBy('order');
    }
}
