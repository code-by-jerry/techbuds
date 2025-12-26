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
            // Ensure slug is always lowercase for SEO consistency
            $blog->slug = strtolower($blog->slug);
        });

        static::updating(function ($blog) {
            // Ensure slug is always lowercase when updating
            if ($blog->isDirty('slug') && !empty($blog->slug)) {
                $blog->slug = strtolower($blog->slug);
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
        
        // Auto-link key phrases to relevant service pages (safe, limited)
        $serviceKeywordMap = [
            // SEO & Digital Marketing
            'technical seo' => 'seo-digital-marketing',
            'seo strategy' => 'seo-digital-marketing',
            'digital marketing' => 'seo-digital-marketing',
            'content marketing' => 'seo-digital-marketing',
            'local seo' => 'seo-digital-marketing',

            // Web & performance
            'web app' => 'web-development',
            'web application' => 'web-development',
            'website performance' => 'web-development',

            // Mobile
            'mobile app' => 'mobile-app-development',
            'app marketing' => 'mobile-app-development',

            // UI/UX & design
            'ui ux design' => 'ui-ux-design',
            'ui/ux design' => 'ui-ux-design',
            'product design' => 'ui-ux-design',

            // DevOps & cloud
            'devops' => 'devops-cloud',
            'ci/cd' => 'devops-cloud',
            'cloud deployment' => 'devops-cloud',

            // Data & warehousing
            'data warehouse' => 'database-data-warehousing',
            'data warehousing' => 'database-data-warehousing',

            // API & System Integration
            'api development' => 'api-development-system-integration',
            'api integration' => 'api-development-system-integration',
            'system integration' => 'api-development-system-integration',
            'rest api' => 'api-development-system-integration',

            // Custom IT / landing pages
            'landing page' => 'custom-it-solutions',
            'custom it solution' => 'custom-it-solutions',
            'custom it solutions' => 'custom-it-solutions',
        ];

        foreach ($serviceKeywordMap as $keyword => $slug) {
            $url = url("/services/{$slug}");

            // Case-insensitive, first occurrence only, word boundary-ish match
            $pattern = '~(?i)\b(' . preg_quote($keyword, '~') . ')\b~';
            $replacement = '<a href="' . $url . '" class="blog-service-link">$1</a>';

            $newContent = preg_replace($pattern, $replacement, $content, 1);

            if ($newContent !== null) {
                $content = $newContent;
            }
        }

        return $content;
    }
}
