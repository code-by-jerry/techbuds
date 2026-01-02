<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Carbon\Carbon;

class BlogSeeder2 extends Seeder
{
    public function run(): void
    {
        $jsonPath = base_path('blogsnew.json');
        
        if (!file_exists($jsonPath)) {
            $this->command->error('JSON file not found: ' . $jsonPath);
            return;
        }

        $jsonContent = file_get_contents($jsonPath);
        $articles = json_decode($jsonContent, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            $this->command->error('Invalid JSON: ' . json_last_error_msg());
            return;
        }

        $this->command->info('Found ' . count($articles) . ' articles in blogsnew.json');

        foreach ($articles as $index => $article) {
            $slug = $article['slug'] ?? Str::slug($article['title']);

            Blog::updateOrCreate(
                ['slug' => $slug],
                [
                    'title' => $article['title'],
                    'meta_description' => $article['meta_description'] ?? null,
                    'category' => $article['category'] ?? 'General',
                    'excerpt' => $article['excerpt'] ?? null,
                    'content' => $article['content'],
                    'featured_image' => $article['featured_image'] ?? null,
                    'published_date' => isset($article['published_date']) 
                        ? Carbon::parse($article['published_date']) 
                        : Carbon::now()->subDays($index),
                    'reading_time' => $article['reading_time'] ?? $this->calculateReadingTime($article['content']),
                    'signals' => $article['signals'] ?? [],
                    'is_featured' => $article['is_featured'] ?? false,
                    'is_published' => $article['is_published'] ?? true,
                ]
            );
        }

        $this->command->info('Seeded ' . count($articles) . ' blog articles from blogsnew.json');
    }

    private function calculateReadingTime(string $content): string
    {
        $wordCount = str_word_count(strip_tags($content));
        $minutes = max(1, ceil($wordCount / 200));
        return $minutes . ' min';
    }
}

