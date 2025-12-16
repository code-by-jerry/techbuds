<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'meta_description',
        'category',
        'excerpt',
        'content',
        'featured_image',
        'published_date',
        'reading_time',
        'signals',
        'is_featured',
        'is_published',
    ];

    protected $casts = [
        'signals' => 'array',
        'is_featured' => 'boolean',
        'is_published' => 'boolean',
        'published_date' => 'date',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($blog) {
            if (empty($blog->slug)) {
                $blog->slug = Str::slug($blog->title);
            }
        });
    }

    public function getFormattedContentAttribute(): string
    {
        $content = $this->content;
        
        // Remove H1 markers (we already have title)
        $content = preg_replace('/## \*\*H1: (.+?)\*\*/', '', $content);
        
        // Convert H2 headers
        $content = preg_replace('/## \*\*(.+?)\*\*/', '<h2>$1</h2>', $content);
        $content = preg_replace('/## (.+?)$/m', '<h2>$1</h2>', $content);
        
        // Convert H3 headers
        $content = preg_replace('/### \*\*(.+?)\*\*/', '<h3>$1</h3>', $content);
        
        // Convert bold text
        $content = preg_replace('/\*\*(.+?)\*\*/', '<strong>$1</strong>', $content);
        
        // Convert bullet lists
        $lines = explode("\n", $content);
        $inList = false;
        $formatted = [];
        
        foreach ($lines as $line) {
            $trimmed = trim($line);
            
            if (preg_match('/^\* (.+)$/', $trimmed, $matches)) {
                if (!$inList) {
                    $formatted[] = '<ul>';
                    $inList = true;
                }
                $formatted[] = '<li>' . $matches[1] . '</li>';
            } else {
                if ($inList) {
                    $formatted[] = '</ul>';
                    $inList = false;
                }
                if (!empty($trimmed) && !preg_match('/^<[h|u|s]/', $trimmed)) {
                    $formatted[] = '<p>' . $trimmed . '</p>';
                } elseif (!empty($trimmed)) {
                    $formatted[] = $trimmed;
                }
            }
        }
        
        if ($inList) {
            $formatted[] = '</ul>';
        }
        
        $content = implode("\n", $formatted);
        
        // Clean up empty paragraphs
        $content = preg_replace('/<p>\s*<\/p>/', '', $content);
        
        return $content;
    }
}
