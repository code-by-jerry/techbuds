# 🚀 CRM System - Quick Start Guide

This guide will help you start implementing the CRM system step by step.

---

## Step 1: Create Migrations

Run these commands to create all migration files:

```bash
php artisan make:migration create_clients_table
php artisan make:migration create_projects_table
php artisan make:migration create_requirements_table
php artisan make:migration create_project_updates_table
php artisan make:migration create_tasks_table
php artisan make:migration create_milestones_table
php artisan make:migration create_documents_table
php artisan make:migration create_invoices_table
php artisan make:migration create_invoice_payments_table
php artisan make:migration create_activity_logs_table
php artisan make:migration create_project_team_members_table
```

---

## Step 2: Create Models

```bash
php artisan make:model Client
php artisan make:model Project
php artisan make:model Requirement
php artisan make:model ProjectUpdate
php artisan make:model Task
php artisan make:model Milestone
php artisan make:model Document
php artisan make:model Invoice
php artisan make:model InvoicePayment
php artisan make:model ActivityLog
```

---

## Step 3: Create Controllers

```bash
php artisan make:controller Admin/ClientController --resource
php artisan make:controller Admin/ProjectController --resource
php artisan make:controller Admin/RequirementController --resource
php artisan make:controller Admin/TaskController --resource
php artisan make:controller Admin/MilestoneController --resource
php artisan make:controller Admin/DocumentController --resource
php artisan make:controller Admin/InvoiceController --resource
php artisan make:controller Admin/InvoicePaymentController --resource
php artisan make:controller Admin/ProjectUpdateController --resource
php artisan make:controller Admin/ActivityLogController
php artisan make:controller Admin/DashboardController
```

---

## Step 4: Update Permissions

Edit `database/seeders/RolesAndPermissionsSeeder.php`:

```php
$modules = [
    'blogs', 
    'contacts', 
    'admins', 
    'notifications',
    'tool-categories',
    'tool-links',
    // Add CRM modules
    'clients',
    'projects',
    'requirements',
    'tasks',
    'milestones',
    'documents',
    'invoices',
    'project-updates',
];
```

Then run:
```bash
php artisan db:seed --class=RolesAndPermissionsSeeder
```

---

## Step 5: Create Activity Log Helper

Create `app/Helpers/ActivityLogHelper.php`:

```php
<?php

namespace App\Helpers;

use App\Models\ActivityLog;

class ActivityLogHelper
{
    public static function log($action, $description, $projectId = null, $clientId = null, $metadata = null)
    {
        return ActivityLog::create([
            'user_id' => auth()->guard('admin')->id(),
            'project_id' => $projectId,
            'client_id' => $clientId,
            'action' => $action,
            'description' => $description,
            'metadata' => $metadata,
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);
    }
}
```

---

## Step 6: File Storage Setup

In `config/filesystems.php`, ensure you have:

```php
'disks' => [
    'local' => [
        'driver' => 'local',
        'root' => storage_path('app'),
    ],

    'public' => [
        'driver' => 'local',
        'root' => storage_path('app/public'),
        'url' => env('APP_URL').'/storage',
        'visibility' => 'public',
    ],

    // Add for documents
    'documents' => [
        'driver' => 'local',
        'root' => storage_path('app/documents'),
        'url' => env('APP_URL').'/storage/documents',
        'visibility' => 'private',
    ],

    'invoices' => [
        'driver' => 'local',
        'root' => storage_path('app/invoices'),
        'url' => env('APP_URL').'/storage/invoices',
        'visibility' => 'private',
    ],
],
```

Create directories:
```bash
mkdir -p storage/app/documents
mkdir -p storage/app/invoices
php artisan storage:link
```

---

## Step 7: Add Routes

Add to `routes/web.php` in the admin middleware group:

```php
// Clients
Route::resource('clients', Admin\ClientController::class);
Route::post('clients/{client}/update-status', [Admin\ClientController::class, 'updateStatus'])->name('clients.update-status');

// Projects
Route::resource('projects', Admin\ProjectController::class);
Route::post('projects/{project}/update-status', [Admin\ProjectController::class, 'updateStatus'])->name('projects.update-status');

// Requirements
Route::resource('projects.requirements', Admin\RequirementController::class)->shallow();

// Tasks
Route::resource('projects.tasks', Admin\TaskController::class)->shallow();

// Milestones
Route::resource('projects.milestones', Admin\MilestoneController::class)->shallow();

// Documents
Route::resource('projects.documents', Admin\DocumentController::class)->shallow();

// Invoices
Route::resource('projects.invoices', Admin\InvoiceController::class)->shallow();

// Project Updates
Route::resource('projects.project-updates', Admin\ProjectUpdateController::class)->shallow();

// Dashboard
Route::get('dashboard', [Admin\DashboardController::class, 'index'])->name('dashboard');
Route::get('pipeline', [Admin\DashboardController::class, 'pipeline'])->name('pipeline');
```

---

## Step 8: Update Sidebar

Add to `resources/views/admin/partials/sidebar.blade.php`:

```blade
<!-- CRM Section -->
<h3 class="mb-4 text-xs uppercase leading-[20px] text-[#088395]/60 transition-opacity duration-300">
    CRM & Projects
</h3>

<ul class="flex flex-col gap-2">
    <!-- Dashboard -->
    <li class="relative">
        <a href="{{ route('admin.dashboard') }}" class="menu-item group flex items-center rounded-lg text-sm font-medium transition-all relative">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
            </svg>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Clients -->
    <li class="relative">
        <a href="{{ route('admin.clients.index') }}" class="menu-item group flex items-center rounded-lg text-sm font-medium transition-all relative">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
            <span>Clients</span>
        </a>
    </li>

    <!-- Projects -->
    <li class="relative">
        <a href="{{ route('admin.projects.index') }}" class="menu-item group flex items-center rounded-lg text-sm font-medium transition-all relative">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
            </svg>
            <span>Projects</span>
        </a>
    </li>

    <!-- Pipeline -->
    <li class="relative">
        <a href="{{ route('admin.pipeline') }}" class="menu-item group flex items-center rounded-lg text-sm font-medium transition-all relative">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2" />
            </svg>
            <span>Pipeline</span>
        </a>
    </li>

    <!-- Invoices -->
    <li class="relative">
        <a href="{{ route('admin.invoices.index') }}" class="menu-item group flex items-center rounded-lg text-sm font-medium transition-all relative">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
            <span>Invoices</span>
        </a>
    </li>
</ul>
```

---

## Step 9: Implementation Order

1. ✅ **Clients Module** (Start here)
   - Migrations
   - Model
   - Controller
   - Views (index, create, edit, show)
   - Test

2. ✅ **Projects Module**
   - Migrations
   - Model
   - Controller
   - Views (index, create, edit, show with tabs)
   - Test

3. ✅ **Requirements Module**
   - Migrations
   - Model
   - Controller
   - Integrate into Project show view
   - Test

4. ✅ Continue with other modules following the same pattern

---

## Step 10: Testing Checklist

After each module:

- [ ] Can create a new record
- [ ] Can view list
- [ ] Can view details
- [ ] Can update record
- [ ] Can delete record
- [ ] Permissions are working
- [ ] Activity logs are created
- [ ] Status changes work
- [ ] Relationships work correctly

---

## Common Patterns

### Status Update Pattern

```php
public function updateStatus(Request $request, Project $project)
{
    $oldStatus = $project->status;
    
    $project->update(['status' => $request->status]);
    
    // Log activity
    ActivityLogHelper::log(
        'project_status_changed',
        "Project status changed from {$oldStatus} to {$request->status}",
        $project->id
    );
    
    return redirect()->back()->with('success', 'Status updated successfully.');
}
```

### Permission Check Pattern

```php
public function index()
{
    $admin = auth()->guard('admin')->user();
    if ($admin->email !== 'admin@techbuds.online' && !$admin->can('clients.list')) {
        abort(403, 'You do not have permission to view clients.');
    }
    
    // Your code here
}
```

---

## Next Steps

1. Start with Step 1 (Migrations)
2. Follow the implementation order
3. Test as you go
4. Refer to `CRM_IMPLEMENTATION_PLAN.md` for detailed specifications

**Happy Coding! 🚀**

