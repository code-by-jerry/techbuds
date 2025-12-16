<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Carbon\Carbon;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        $markdownPath = base_path('seo_blog_articles_content.md');
        
        if (!file_exists($markdownPath)) {
            $this->command->error('Markdown file not found: ' . $markdownPath);
            return;
        }

        $content = file_get_contents($markdownPath);
        $articles = $this->parseArticles($content);

        foreach ($articles as $index => $article) {
            $slug = Str::slug($article['title']);

            Blog::updateOrCreate(
                ['slug' => $slug],
                [
                    'title' => $article['title'],
                    'meta_description' => $article['meta_description'],
                    'category' => $article['category'],
                    'excerpt' => $article['excerpt'],
                    'content' => $article['content'],
                    'featured_image' => $article['featured_image'],
                    'published_date' => Carbon::now()->subDays($index),
                    'reading_time' => $this->calculateReadingTime($article['content']),
                    'signals' => $article['signals'],
                    'is_featured' => $index === 0, // First article is featured
                    'is_published' => true,
                ]
            );
        }

        $this->command->info('Seeded ' . count($articles) . ' blog articles.');
    }

    private function parseArticles(string $content): array
    {
        $articles = [];
        $articlePattern = '/# \*\*ARTICLE \d+ — (.+?)\*\*\s+\*\*Meta Description:\*\*\s+(.+?)\s+---\s+(.+?)(?=# \*\*ARTICLE \d+ — |$)/s';
        
        preg_match_all($articlePattern, $content, $matches, PREG_SET_ORDER);

        $categoryMap = [
            'SEO' => 'Technical SEO',
            'Technical SEO' => 'Technical SEO',
            'Mobile' => 'Mobile',
            'Mobile-First' => 'Mobile',
            'App SEO' => 'Mobile',
            'ASO' => 'Mobile',
            'Web App' => 'Performance',
            'Web Application' => 'Performance',
            'UI/UX' => 'Analytics',
            'UX' => 'Analytics',
            'Design' => 'Content',
            'Graphic Design' => 'Content',
            'Branding' => 'Content',
            'DevOps' => 'DevOps',
            'Data Warehouse' => 'Analytics',
            'Data Warehousing' => 'Analytics',
            'Digital Marketing' => 'Content',
            'Marketing' => 'Content',
            'AI' => 'Content',
            'Landing Page' => 'Content',
            'Performance' => 'Performance',
        ];

        foreach ($matches as $match) {
            $title = trim($match[1]);
            $metaDescription = trim($match[2]);
            $fullContent = trim($match[3]);
            
            // Extract H1 for main title if different
            if (preg_match('/## \*\*H1: (.+?)\*\*/', $fullContent, $h1Match)) {
                $h1Title = trim($h1Match[1]);
                if (strlen($h1Title) > 0) {
                    $title = $h1Title;
                }
            }

            // Extract excerpt (first paragraph after H1, clean text only)
            $excerpt = '';
            $contentLines = explode("\n", $fullContent);
            $startCollecting = false;
            $foundFirstParagraph = false;
            
            foreach ($contentLines as $line) {
                $line = trim($line);
                
                // Skip H1 line
                if (strpos($line, '## **H1:') !== false || strpos($line, '## **H1') !== false) {
                    $startCollecting = true;
                    continue;
                }
                
                // Skip empty lines, headers, separators, and list items
                if (empty($line) || 
                    strpos($line, '##') === 0 || 
                    strpos($line, '---') === 0 ||
                    strpos($line, '*') === 0 ||
                    strpos($line, '**') === 0) {
                    continue;
                }
                
                if ($startCollecting && !$foundFirstParagraph) {
                    // Remove all markdown formatting
                    $cleanLine = preg_replace('/\*\*(.+?)\*\*/', '$1', $line);
                    $cleanLine = preg_replace('/#+\s*/', '', $cleanLine);
                    $cleanLine = preg_replace('/^\*\s*/', '', $cleanLine);
                    $cleanLine = preg_replace('/\[(.+?)\]\(.+?\)/', '$1', $cleanLine); // Remove links
                    $cleanLine = trim($cleanLine);
                    
                    // Only use lines that are actual paragraphs (not headers or list items)
                    if (strlen($cleanLine) > 30 && !preg_match('/^[A-Z][^.!?]*$/', $cleanLine)) {
                        $excerpt = mb_substr($cleanLine, 0, 200, 'UTF-8');
                        $foundFirstParagraph = true;
                        break;
                    }
                }
            }
            
            // Fallback: strip all markdown and get first meaningful text
            if (empty($excerpt)) {
                $cleanContent = $fullContent;
                // Remove markdown headers
                $cleanContent = preg_replace('/#+\s*\*\*(.+?)\*\*/', '', $cleanContent);
                $cleanContent = preg_replace('/#+\s*/', '', $cleanContent);
                // Remove bold
                $cleanContent = preg_replace('/\*\*(.+?)\*\*/', '$1', $cleanContent);
                // Remove list markers
                $cleanContent = preg_replace('/^\*\s*/m', '', $cleanContent);
                // Remove links
                $cleanContent = preg_replace('/\[(.+?)\]\(.+?\)/', '$1', $cleanContent);
                // Remove separators
                $cleanContent = preg_replace('/^---$/m', '', $cleanContent);
                // Get first meaningful paragraph
                $lines = explode("\n", $cleanContent);
                foreach ($lines as $line) {
                    $line = trim($line);
                    if (strlen($line) > 30) {
                        $excerpt = mb_substr($line, 0, 200, 'UTF-8');
                        break;
                    }
                }
            }
            
            // Clean and truncate excerpt properly
            $excerpt = trim($excerpt);
            // Remove any control characters but keep valid UTF-8 including em dashes
            $excerpt = preg_replace('/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]/u', '', $excerpt);
            
            // Ensure excerpt is not empty and is reasonable length
            if (empty($excerpt) || mb_strlen($excerpt, 'UTF-8') < 20) {
                $excerpt = mb_substr($metaDescription, 0, 200, 'UTF-8');
            }
            
            if (mb_strlen($excerpt, 'UTF-8') > 195) {
                $excerpt = mb_substr($excerpt, 0, 195, 'UTF-8');
                $lastSpace = mb_strrpos($excerpt, ' ', 0, 'UTF-8');
                if ($lastSpace !== false && $lastSpace > 50) {
                    $excerpt = mb_substr($excerpt, 0, $lastSpace, 'UTF-8');
                }
            }
            
            if (!empty($excerpt) && !str_ends_with($excerpt, '...')) {
                $excerpt = $excerpt . '...';
            }

            // Determine category
            $category = 'Technical SEO'; // default
            foreach ($categoryMap as $keyword => $cat) {
                if (stripos($title, $keyword) !== false) {
                    $category = $cat;
                    break;
                }
            }

            // Extract signals from content (look for patterns like "SERP wins +32%")
            $signals = [];
            if (preg_match_all('/(?:SERP|Core Web Vitals|TTFB|Bounce|Crash|Ratings|CTR|Calls|DR|Ref domains|Sessions|Leads|Deploy|Uptime|Conversion|Keyword|Attribution|GDPR)(?:\s+\+?\d+%?|\s+\d+\.\d+%?|\s+[A-Z]|Safe|ready)/i', $fullContent, $signalMatches)) {
                $signals = array_slice(array_unique($signalMatches[0]), 0, 2);
            }
            if (empty($signals)) {
                $signals = ['SEO Optimized', '2025 Guide'];
            }

            // Generate featured image URL (using Unsplash based on category)
            $featuredImage = $this->getFeaturedImage($category);

            $articles[] = [
                'title' => $title,
                'meta_description' => $metaDescription,
                'category' => $category,
                'excerpt' => $excerpt . '...',
                'content' => $fullContent,
                'featured_image' => $featuredImage,
                'signals' => $signals,
            ];
        }

        return $articles;
    }

    private function calculateReadingTime(string $content): string
    {
        $wordCount = str_word_count(strip_tags($content));
        $minutes = max(1, ceil($wordCount / 200));
        return $minutes . ' min';
    }

    private function getFeaturedImage(string $category): string
    {
        $images = [
            'Technical SEO' => 'https://images.unsplash.com/photo-1523475472560-d2df97ec485c?auto=format&fit=crop&w=1600&q=60',
            'Mobile' => 'https://images.unsplash.com/photo-1545239351-1141bd82e8a6?auto=format&fit=crop&w=1600&q=60',
            'Performance' => 'https://images.unsplash.com/photo-1517433456452-f9633a875f6f?auto=format&fit=crop&w=1600&q=60',
            'Analytics' => 'https://images.unsplash.com/photo-1520607162513-77705c0f0d4a?auto=format&fit=crop&w=1600&q=60',
            'DevOps' => 'https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=1600&q=60',
            'Content' => 'https://images.unsplash.com/photo-1551434678-e076c223a692?auto=format&fit=crop&w=1600&q=60',
        ];

        return $images[$category] ?? $images['Technical SEO'];
    }
}
