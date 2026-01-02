<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\Blog;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate sitemap.xml file and save it to public directory';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Generating sitemap...');

        $sitemap = Sitemap::create();
        $now = now();
        
        // Base URL - Use production domain
        // Priority: 1. Explicit APP_URL env, 2. Production domain, 3. Config fallback
        $baseUrl = env('APP_URL') ?: 'https://techbuds.online';
        if (empty($baseUrl) || str_contains($baseUrl, 'localhost') || str_contains($baseUrl, '127.0.0.1')) {
            $baseUrl = 'https://techbuds.online';
        }
        // Ensure base URL doesn't have trailing slash
        $baseUrl = rtrim($baseUrl, '/');
        
        $this->info("Using base URL: {$baseUrl}");
        
        // Helper function to create full URL
        $fullUrl = function($path) use ($baseUrl) {
            $path = ltrim($path, '/');
            return $baseUrl . '/' . $path;
        };
        
        // Home page (Highest priority)
        $sitemap->add(
            Url::create($fullUrl('/'))
                ->setPriority(1.0)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                ->setLastModificationDate($now)
        );
        
        // Main pages (High priority)
        $mainPages = [
            ['url' => '/services', 'priority' => 0.9, 'freq' => Url::CHANGE_FREQUENCY_WEEKLY],
            ['url' => '/pricing', 'priority' => 0.9, 'freq' => Url::CHANGE_FREQUENCY_MONTHLY],
            ['url' => '/about', 'priority' => 0.8, 'freq' => Url::CHANGE_FREQUENCY_MONTHLY],
            ['url' => '/portfolio', 'priority' => 0.8, 'freq' => Url::CHANGE_FREQUENCY_WEEKLY],
            ['url' => '/contact', 'priority' => 0.7, 'freq' => Url::CHANGE_FREQUENCY_MONTHLY],
            ['url' => '/locations', 'priority' => 0.7, 'freq' => Url::CHANGE_FREQUENCY_MONTHLY],
            ['url' => '/blog', 'priority' => 0.9, 'freq' => Url::CHANGE_FREQUENCY_DAILY],
        ];
        
        foreach ($mainPages as $page) {
            $sitemap->add(
                Url::create($fullUrl($page['url']))
                    ->setPriority($page['priority'])
                    ->setChangeFrequency($page['freq'])
                    ->setLastModificationDate($now)
            );
        }
        
        $this->info('Added ' . count($mainPages) . ' main pages');
        
        // Individual service pages (High priority - main services)
        $serviceSlugs = array_keys(config('service_pages', []));
        foreach ($serviceSlugs as $slug) {
            $sitemap->add(
                Url::create($fullUrl('/services/' . $slug))
                    ->setPriority(0.8)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                    ->setLastModificationDate($now)
            );
        }
        
        $this->info('Added ' . count($serviceSlugs) . ' service pages');
        
        // Individual pricing pages (High priority)
        $pricingSlugs = array_keys(config('pricing', []));
        foreach ($pricingSlugs as $slug) {
            $sitemap->add(
                Url::create($fullUrl('/pricing/' . $slug))
                    ->setPriority(0.8)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                    ->setLastModificationDate($now)
            );
        }
        
        $this->info('Added ' . count($pricingSlugs) . ' pricing pages');
        
        // High-priority location pages per service (Medium priority)
        $locations = collect(config('locations', []))
            ->filter(fn ($loc) => ($loc['priority'] ?? null) === 'high' && ($loc['seo_index'] ?? false));
        
        $locationCount = 0;
        foreach ($serviceSlugs as $serviceSlug) {
            foreach ($locations as $locationSlug => $loc) {
                $sitemap->add(
                    Url::create($fullUrl("/services/{$serviceSlug}/{$locationSlug}"))
                        ->setPriority(0.6)
                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                        ->setLastModificationDate($now)
                );
                $locationCount++;
            }
        }
        
        if ($locationCount > 0) {
            $this->info("Added {$locationCount} location pages");
        }
        
        // Individual blog posts (Medium-high priority, based on recency)
        $blogs = Blog::where('is_published', true)
            ->orderBy('published_date', 'desc')
            ->get();
        
        foreach ($blogs as $blog) {
            // Recent posts (last 30 days) get higher priority
            $isRecent = $blog->published_date && $blog->published_date->isAfter(now()->subDays(30));
            $priority = $isRecent ? 0.7 : 0.6;
            $lastmod = $blog->updated_at ?? $blog->published_date ?? $now;
            
            $sitemap->add(
                Url::create($fullUrl('/blog/' . $blog->slug))
                    ->setPriority($priority)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                    ->setLastModificationDate($lastmod)
            );
        }
        
        $this->info('Added ' . $blogs->count() . ' blog posts');
        
        // DevTools page (Lower priority)
        $sitemap->add(
            Url::create($fullUrl('/devtools'))
                ->setPriority(0.5)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                ->setLastModificationDate($now)
        );
        
        // Write to public/sitemap.xml
        $sitemapPath = public_path('sitemap.xml');
        $sitemap->writeToFile($sitemapPath);
        
        $totalUrls = count($mainPages) + count($serviceSlugs) + count($pricingSlugs) + $locationCount + $blogs->count() + 2; // +2 for home and devtools
        
        $this->info("Sitemap generated successfully!");
        $this->info("Total URLs: {$totalUrls}");
        $this->info("Saved to: {$sitemapPath}");
        $this->info("Sitemap URL: {$baseUrl}/sitemap.xml");
        
        return Command::SUCCESS;
    }
}

