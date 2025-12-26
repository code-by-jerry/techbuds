<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // Optimize query - only select needed fields and cache for 15 minutes
    $blogs = cache()->remember('homepage_blogs', 900, function () {
        return \App\Models\Blog::where('is_published', true)
            ->select(['id', 'title', 'slug', 'excerpt', 'featured_image', 'category', 'reading_time', 'signals', 'is_featured', 'published_date'])
            ->orderBy('is_featured', 'desc')
            ->orderBy('published_date', 'desc')
            ->limit(6)
            ->get();
    });
    return view('welcome', compact('blogs'));
});

Route::get('/portfolio', function () {
    return view('portfolio');
});

Route::get('/services', function () {
    return view('services');
})->name('services');

Route::get('/locations', function () {
    $locations = collect(config('locations', []))
        ->filter(fn ($loc) => ($loc['priority'] ?? null) === 'high' && ($loc['seo_index'] ?? false))
        ->all();

    $services = config('service_pages', []);

    return view('locations', compact('locations', 'services'));
})->name('locations');

use App\Http\Controllers\ServiceController;

// Individual service pages - MUST come first to prevent location route from matching
Route::get('/services/{slug}', [ServiceController::class, 'show'])
    ->where('slug', '[a-z0-9-]+')
    ->name('services.show');

// Location-based service pages - comes after single slug route
// Only match known location slugs (short names like 'india', 'usa') to prevent conflicts with long service slugs
Route::get('/services/{service}/{location}', [ServiceController::class, 'location'])
    ->where([
        'service' => '[a-z0-9-]+',
        'location' => 'india|usa|uk|canada|australia|uae|singapore|germany|france|netherlands|spain|italy|japan|south-korea|sweden|norway|switzerland|south-africa|nigeria|brazil|mexico|qatar|saudi-arabia'
    ])
    ->name('services.location');

use App\Http\Controllers\BlogController;

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])
    ->where('slug', '[a-z0-9-]+')
    ->name('blog.show');

use App\Http\Controllers\DevToolsController;

Route::get('/devtools', [DevToolsController::class, 'index'])->name('devtools.index');

use App\Http\Controllers\ContactController;

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Robots.txt (Dynamic - generates with current domain)
Route::get('/robots.txt', function () {
    $sitemapUrl = url('/sitemap.xml');
    
    $content = "# Robots.txt for Techbuds
# Updated: 2025

# Allow all search engines to crawl the site
User-agent: *
Allow: /

# Disallow admin and private areas
Disallow: /admin/
Disallow: /api/
Disallow: /storage/
Disallow: /vendor/
Disallow: /bootstrap/
Disallow: /config/
Disallow: /database/
Disallow: /resources/
Disallow: /routes/
Disallow: /tests/

# Allow important public pages
Allow: /
Allow: /about
Allow: /contact
Allow: /services
Allow: /services/
Allow: /portfolio
Allow: /locations
Allow: /blog
Allow: /blog/
Allow: /devtools

# Allow service pages (dynamic routes)
Allow: /services/*

# Allow location-based service pages
Allow: /services/*/*

# Allow blog posts (dynamic routes)
Allow: /blog/*

# Specific rules for major search engines
User-agent: Googlebot
Allow: /
Disallow: /admin/
Disallow: /api/
Disallow: /storage/
Disallow: /vendor/

User-agent: Bingbot
Allow: /
Disallow: /admin/
Disallow: /api/
Disallow: /storage/
Disallow: /vendor/

# Sitemap location
Sitemap: {$sitemapUrl}
";
    
    return response($content, 200)
        ->header('Content-Type', 'text/plain');
})->name('robots');

// Sitemap
Route::get('/sitemap.xml', function () {
    $sitemap = \Spatie\Sitemap\Sitemap::create();
    $now = now();
    
    // Home page (Highest priority)
    $sitemap->add(
        \Spatie\Sitemap\Tags\Url::create(url('/'))
            ->setPriority(1.0)
            ->setChangeFrequency(\Spatie\Sitemap\Tags\Url::CHANGE_FREQUENCY_WEEKLY)
            ->setLastModificationDate($now)
    );
    
    // Main pages (High priority)
    $mainPages = [
        ['url' => '/services', 'priority' => 0.9, 'freq' => \Spatie\Sitemap\Tags\Url::CHANGE_FREQUENCY_WEEKLY],
        ['url' => '/about', 'priority' => 0.8, 'freq' => \Spatie\Sitemap\Tags\Url::CHANGE_FREQUENCY_MONTHLY],
        ['url' => '/portfolio', 'priority' => 0.8, 'freq' => \Spatie\Sitemap\Tags\Url::CHANGE_FREQUENCY_WEEKLY],
        ['url' => '/contact', 'priority' => 0.7, 'freq' => \Spatie\Sitemap\Tags\Url::CHANGE_FREQUENCY_MONTHLY],
        ['url' => '/locations', 'priority' => 0.7, 'freq' => \Spatie\Sitemap\Tags\Url::CHANGE_FREQUENCY_MONTHLY],
        ['url' => '/blog', 'priority' => 0.9, 'freq' => \Spatie\Sitemap\Tags\Url::CHANGE_FREQUENCY_DAILY],
    ];
    
    foreach ($mainPages as $page) {
        $sitemap->add(
            \Spatie\Sitemap\Tags\Url::create(url($page['url']))
                ->setPriority($page['priority'])
                ->setChangeFrequency($page['freq'])
                ->setLastModificationDate($now)
        );
    }
    
    // Individual service pages (High priority - main services)
    $serviceSlugs = array_keys(config('service_pages', []));
    foreach ($serviceSlugs as $slug) {
        $sitemap->add(
            \Spatie\Sitemap\Tags\Url::create(url('/services/' . $slug))
                ->setPriority(0.8)
                ->setChangeFrequency(\Spatie\Sitemap\Tags\Url::CHANGE_FREQUENCY_MONTHLY)
                ->setLastModificationDate($now)
        );
    }

    // High-priority location pages per service (Medium priority)
    $locations = collect(config('locations', []))
        ->filter(fn ($loc) => ($loc['priority'] ?? null) === 'high' && ($loc['seo_index'] ?? false));

    foreach ($serviceSlugs as $serviceSlug) {
        foreach ($locations as $locationSlug => $loc) {
            $sitemap->add(
                \Spatie\Sitemap\Tags\Url::create(url("/services/{$serviceSlug}/{$locationSlug}"))
                    ->setPriority(0.6)
                    ->setChangeFrequency(\Spatie\Sitemap\Tags\Url::CHANGE_FREQUENCY_MONTHLY)
                    ->setLastModificationDate($now)
            );
        }
    }
    
    // Individual blog posts (Medium-high priority, based on recency)
    $blogs = \App\Models\Blog::where('is_published', true)
        ->orderBy('published_date', 'desc')
        ->get();
    
    foreach ($blogs as $blog) {
        // Recent posts (last 30 days) get higher priority
        $isRecent = $blog->published_date && $blog->published_date->isAfter(now()->subDays(30));
        $priority = $isRecent ? 0.7 : 0.6;
        $lastmod = $blog->updated_at ?? $blog->published_date ?? $now;
        
        $sitemap->add(
            \Spatie\Sitemap\Tags\Url::create(url('/blog/' . $blog->slug))
                ->setPriority($priority)
                ->setChangeFrequency(\Spatie\Sitemap\Tags\Url::CHANGE_FREQUENCY_WEEKLY)
                ->setLastModificationDate($lastmod)
        );
    }
    
    // DevTools page (Lower priority)
    $sitemap->add(
        \Spatie\Sitemap\Tags\Url::create(url('/devtools'))
            ->setPriority(0.5)
            ->setChangeFrequency(\Spatie\Sitemap\Tags\Url::CHANGE_FREQUENCY_MONTHLY)
            ->setLastModificationDate($now)
    );
    
    return $sitemap->render();
})->name('sitemap');

use App\Http\Controllers\Admin\Auth\LoginController;

// Admin auth & dashboard
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('login.post');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    // Password Reset Routes
    Route::get('password/reset', [\App\Http\Controllers\Admin\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('password/email', [\App\Http\Controllers\Admin\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('password/reset/{token}', [\App\Http\Controllers\Admin\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/reset', [\App\Http\Controllers\Admin\Auth\ResetPasswordController::class, 'reset'])->name('password.update');

    Route::middleware(['auth:admin'])->group(function () {
        // Dashboard
        Route::get('dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
        Route::get('pipeline', [\App\Http\Controllers\Admin\DashboardController::class, 'pipeline'])->name('pipeline');

        // Blog CRUD routes
        Route::resource('blogs', \App\Http\Controllers\Admin\BlogController::class);

        // Contact routes
        Route::get('contacts', [\App\Http\Controllers\Admin\ContactController::class, 'index'])->name('contacts.index');
        Route::get('contacts/{contact}', [\App\Http\Controllers\Admin\ContactController::class, 'show'])->name('contacts.show');

        // Notification routes
        Route::get('notifications', [\App\Http\Controllers\Admin\NotificationController::class, 'index'])->name('notifications.index');
        Route::post('notifications/{notification}/read', [\App\Http\Controllers\Admin\NotificationController::class, 'markAsRead'])->name('notifications.mark-read');
        Route::post('notifications/mark-all-read', [\App\Http\Controllers\Admin\NotificationController::class, 'markAllAsRead'])->name('notifications.mark-all-read');

        // Profile routes
        Route::get('profile', [\App\Http\Controllers\Admin\ProfileController::class, 'show'])->name('profile.show');
        Route::post('profile', [\App\Http\Controllers\Admin\ProfileController::class, 'update'])->name('profile.update');
        Route::post('profile/disable', [\App\Http\Controllers\Admin\ProfileController::class, 'disable'])->name('profile.disable');
        Route::post('profile/delete', [\App\Http\Controllers\Admin\ProfileController::class, 'delete'])->name('profile.delete');

        // Admin Management routes (only accessible by super admin)
        Route::resource('admins', \App\Http\Controllers\Admin\AdminController::class);
        Route::post('admins/{admin}/toggle-status', [\App\Http\Controllers\Admin\AdminController::class, 'toggleStatus'])->name('admins.toggle-status');

        // Role Management routes (only accessible by super admin)
        Route::resource('roles', \App\Http\Controllers\Admin\RoleController::class);

        // DevTools Management routes
        Route::resource('tool-categories', \App\Http\Controllers\Admin\ToolCategoryController::class);
        Route::resource('tool-links', \App\Http\Controllers\Admin\ToolLinkController::class);
        Route::resource('template-categories', \App\Http\Controllers\Admin\TemplateCategoryController::class)->except(['show']);
        Route::resource('templates', \App\Http\Controllers\Admin\TemplateController::class)->except(['show']);
        Route::get('templates/{template}/download', [\App\Http\Controllers\Admin\TemplateController::class, 'download'])->name('templates.download');

        // CRM Routes
        Route::resource('clients', \App\Http\Controllers\Admin\ClientController::class);
        Route::post('clients/{client}/update-status', [\App\Http\Controllers\Admin\ClientController::class, 'updateStatus'])->name('clients.update-status');
        
        Route::resource('projects', \App\Http\Controllers\Admin\ProjectController::class);
        Route::post('projects/{project}/update-status', [\App\Http\Controllers\Admin\ProjectController::class, 'updateStatus'])->name('projects.update-status');
        Route::post('projects/{project}/update-progress', [\App\Http\Controllers\Admin\ProjectController::class, 'updateProgress'])->name('projects.update-progress');
        Route::post('projects/{project}/assign-team', [\App\Http\Controllers\Admin\ProjectController::class, 'assignTeam'])->name('projects.assign-team');
        
        // Requirements (nested under projects)
        Route::resource('projects.requirements', \App\Http\Controllers\Admin\RequirementController::class)->shallow();
        
        // Project Updates / Communication (nested under projects)
        Route::resource('projects.project-updates', \App\Http\Controllers\Admin\ProjectUpdateController::class)->shallow();
        Route::get('project-updates/{projectUpdate}/attachment/{attachmentIndex}', [\App\Http\Controllers\Admin\ProjectUpdateController::class, 'downloadAttachment'])->name('project-updates.download-attachment');
        
        // Tasks (nested under projects)
        Route::resource('projects.tasks', \App\Http\Controllers\Admin\TaskController::class)->shallow();
        
        // Milestones (nested under projects)
        Route::resource('projects.milestones', \App\Http\Controllers\Admin\MilestoneController::class)->shallow();
        
        // Documents (nested under projects)
        Route::resource('projects.documents', \App\Http\Controllers\Admin\DocumentController::class)->shallow();
        Route::get('documents/{document}/download', [\App\Http\Controllers\Admin\DocumentController::class, 'download'])->name('documents.download');
        
        // Invoices (nested under projects)
        Route::resource('projects.invoices', \App\Http\Controllers\Admin\InvoiceController::class)->shallow();
        Route::get('invoices/{invoice}/download-pdf', [\App\Http\Controllers\Admin\InvoiceController::class, 'downloadPdf'])->name('invoices.download-pdf');
        
        // Invoice Payments (nested under invoices)
        Route::resource('invoices.payments', \App\Http\Controllers\Admin\InvoicePaymentController::class)->shallow();
        Route::get('invoice-payments/{payment}/receipt', [\App\Http\Controllers\Admin\InvoicePaymentController::class, 'downloadReceipt'])->name('invoice-payments.download-receipt');
    });
});
