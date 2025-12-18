<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $blogs = \App\Models\Blog::where('is_published', true)
        ->orderBy('is_featured', 'desc')
        ->orderBy('published_date', 'desc')
        ->limit(6)
        ->get();
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

Route::get('/services/{service}/{location}', [ServiceController::class, 'location'])->name('services.location');
Route::get('/services/{slug}', [ServiceController::class, 'show'])->name('services.show');

use App\Http\Controllers\BlogController;

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

use App\Http\Controllers\DevToolsController;

Route::get('/devtools', [DevToolsController::class, 'index'])->name('devtools.index');

use App\Http\Controllers\ContactController;

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Sitemap
Route::get('/sitemap.xml', function () {
    $sitemap = \Spatie\Sitemap\Sitemap::create();
    
    // Home page
    $sitemap->add(url('/'));
    
    // Services page
    $sitemap->add(url('/services'));
    
    // Individual service pages (global)
    $serviceSlugs = array_keys(config('service_pages', []));
    foreach ($serviceSlugs as $slug) {
        $sitemap->add(url('/services/' . $slug));
    }

    // High-priority location pages per service
    $locations = collect(config('locations', []))
        ->filter(fn ($loc) => ($loc['priority'] ?? null) === 'high' && ($loc['seo_index'] ?? false));

    foreach ($serviceSlugs as $serviceSlug) {
        foreach ($locations as $locationSlug => $loc) {
            $sitemap->add(url("/services/{$serviceSlug}/{$locationSlug}"));
        }
    }
    
    // Portfolio page
    $sitemap->add(url('/portfolio'));
    
    // Contact page
    $sitemap->add(url('/contact'));
    
    // Blog index
    $sitemap->add(url('/blog'));
    
    // Individual blog posts
    $blogs = \App\Models\Blog::where('is_published', true)->get();
    foreach ($blogs as $blog) {
        $sitemap->add(url('/blog/' . $blog->slug));
    }
    
    // DevTools page
    $sitemap->add(url('/devtools'));
    
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
