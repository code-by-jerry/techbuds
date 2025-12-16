# 🚀 Techbuds CRM & Delivery System - Full Implementation Plan

**Version:** 1.0  
**Date:** 2025-11-17  
**Status:** Planning Phase

---

## 📋 Table of Contents

1. [Executive Summary](#executive-summary)
2. [System Architecture](#system-architecture)
3. [Database Schema](#database-schema)
4. [Implementation Phases](#implementation-phases)
5. [Models & Relationships](#models--relationships)
6. [Controllers Structure](#controllers-structure)
7. [Views Structure](#views-structure)
8. [Routes Structure](#routes-structure)
9. [UI/UX Guidelines](#uiux-guidelines)
10. [Features Breakdown](#features-breakdown)
11. [Permissions & Roles](#permissions--roles)
12. [API Endpoints](#api-endpoints)
13. [Automation & Notifications](#automation--notifications)
14. [Testing Strategy](#testing-strategy)
15. [Deployment Guide](#deployment-guide)

---

## 🎯 Executive Summary

### Purpose
Build an internal CRM + Project Management + Onboarding + Billing system for Techbuds that manages the complete client lifecycle from discovery to offboarding.

### Key Features
- Client Pipeline Management (Discovery → Proposal → Onboarding → Development → Invoice → Offboarding)
- Project Tracking with Status Management
- Requirements & Features Tracking
- Communication Log
- Document Management
- Invoice & Payment Tracking
- Task & Milestone Management
- Activity Logging
- Kanban Pipeline View
- Dashboard with KPIs

### Technology Stack
- **Backend:** Laravel 12.x
- **Frontend:** Blade Templates + Alpine.js + Tailwind CSS
- **Database:** MySQL
- **File Storage:** Laravel Filesystem.
- **Permissions:** Spatie Laravel Permission
- **Optional:** Livewire (for reactive components)

### Timeline Estimate
- **Phase 1:** Foundation (Database, Models, Basic CRUD) - 2 weeks
- **Phase 2:** Core Features (Clients, Projects, Requirements) - 2 weeks
- **Phase 3:** Advanced Features (Tasks, Documents, Invoices) - 2 weeks
- **Phase 4:** Pipeline & Dashboard - 1 week
- **Phase 5:** Automation & Polish - 1 week
- **Total:** ~8 weeks

---

## 🏗️ System Architecture

### Module Breakdown

```
CRM System
├── Clients Module
│   ├── Client CRUD
│   ├── Client Status Management
│   └── Client Projects View
├── Projects Module
│   ├── Project CRUD
│   ├── Project Status Management
│   ├── Project Tabs (Overview, Requirements, Tasks, Communication, Documents, Invoices, Activity)
│   └── Project Assignment
├── Requirements Module
│   ├── Requirements CRUD
│   ├── Priority Management
│   └── Status Tracking
├── Tasks Module
│   ├── Task CRUD
│   ├── Task Assignment
│   └── Task Progress Tracking
├── Milestones Module
│   ├── Milestone CRUD
│   └── Milestone Status Tracking
├── Communication Module
│   ├── Project Updates (Client Messages, Internal Notes, Change Requests)
│   └── Attachments
├── Documents Module
│   ├── Document Upload
│   ├── Document Categories (NDA, Proposal, Invoice, Final Delivery)
│   └── Document Management
├── Invoices Module
│   ├── Invoice Generation
│   ├── Invoice Status Tracking
│   ├── Payment Links
│   └── Payment Receipts
├── Activity Log Module
│   └── Activity Tracking
├── Dashboard Module
│   ├── KPI Cards
│   ├── Pipeline Kanban
│   └── Recent Activity
└── Pipeline Module
    ├── Kanban View
    └── Drag & Drop Status Updates
```

---

## 🗃️ Database Schema

### Migration Files Structure

```bash
database/migrations/
├── 2025_XX_XX_XXXXXX_create_clients_table.php
├── 2025_XX_XX_XXXXXX_create_projects_table.php
├── 2025_XX_XX_XXXXXX_create_requirements_table.php
├── 2025_XX_XX_XXXXXX_create_project_updates_table.php
├── 2025_XX_XX_XXXXXX_create_tasks_table.php
├── 2025_XX_XX_XXXXXX_create_milestones_table.php
├── 2025_XX_XX_XXXXXX_create_documents_table.php
├── 2025_XX_XX_XXXXXX_create_invoices_table.php
├── 2025_XX_XX_XXXXXX_create_invoice_payments_table.php
├── 2025_XX_XX_XXXXXX_create_activity_logs_table.php
└── 2025_XX_XX_XXXXXX_create_project_team_members_table.php
```

### Detailed Schema

#### 1. `clients` Table

```php
Schema::create('clients', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('email')->unique();
    $table->string('phone')->nullable();
    $table->string('company')->nullable();
    $table->enum('status', [
        'discovery',
        'proposal_sent',
        'proposal_accepted',
        'onboarding',
        'project_started',
        'in_development',
        'in_testing',
        'invoice_sent',
        'paid',
        'offboarding',
        'completed',
        'archived'
    ])->default('discovery');
    $table->text('notes')->nullable();
    $table->string('address')->nullable();
    $table->string('city')->nullable();
    $table->string('state')->nullable();
    $table->string('country')->nullable();
    $table->string('postal_code')->nullable();
    $table->string('website')->nullable();
    $table->foreignId('created_by')->nullable()->constrained('admins')->nullOnDelete();
    $table->timestamps();
    $table->softDeletes();

    $table->index('status');
    $table->index('email');
});
```

**Status Values:**
- `discovery` - Initial contact
- `proposal_sent` - Proposal sent to client
- `proposal_accepted` - Client accepted proposal
- `onboarding` - Onboarding in progress
- `project_started` - Project has started
- `in_development` - Project in development
- `in_testing` - Project in testing phase
- `invoice_sent` - Invoice sent to client
- `paid` - Payment received
- `offboarding` - Offboarding process
- `completed` - Project completed
- `archived` - Archived (inactive)

#### 2. `projects` Table

```php
Schema::create('projects', function (Blueprint $table) {
    $table->id();
    $table->foreignId('client_id')->constrained('clients')->cascadeOnDelete();
    $table->string('title');
    $table->text('description')->nullable();
    $table->enum('status', [
        'planning',
        'ui_ux',
        'development',
        'testing',
        'deployment',
        'handover',
        'maintenance',
        'completed',
        'cancelled'
    ])->default('planning');
    $table->date('start_date')->nullable();
    $table->date('end_date')->nullable();
    $table->date('actual_end_date')->nullable();
    $table->decimal('budget', 15, 2)->nullable();
    $table->enum('payment_status', ['pending', 'partial', 'paid', 'overdue'])->default('pending');
    $table->string('payment_structure')->nullable(); // e.g., "50% upfront, 50% on completion"
    $table->foreignId('assigned_to')->nullable()->constrained('admins')->nullOnDelete();
    $table->integer('progress_percentage')->default(0);
    $table->text('internal_notes')->nullable();
    $table->timestamps();
    $table->softDeletes();

    $table->index('status');
    $table->index('client_id');
    $table->index('assigned_to');
});
```

**Status Values:**
- `planning` - Project planning phase
- `ui_ux` - UI/UX design phase
- `development` - Development phase
- `testing` - Testing phase
- `deployment` - Deployment phase
- `handover` - Handover to client
- `maintenance` - Maintenance phase
- `completed` - Project completed
- `cancelled` - Project cancelled

#### 3. `requirements` Table

```php
Schema::create('requirements', function (Blueprint $table) {
    $table->id();
    $table->foreignId('project_id')->constrained('projects')->cascadeOnDelete();
    $table->string('title');
    $table->text('description')->nullable();
    $table->enum('priority', ['low', 'medium', 'high', 'critical'])->default('medium');
    $table->enum('status', ['pending', 'in_progress', 'completed', 'on_hold', 'cancelled'])->default('pending');
    $table->integer('estimated_hours')->nullable();
    $table->integer('actual_hours')->nullable();
    $table->text('notes')->nullable();
    $table->foreignId('assigned_to')->nullable()->constrained('admins')->nullOnDelete();
    $table->date('due_date')->nullable();
    $table->integer('order')->default(0);
    $table->timestamps();

    $table->index('project_id');
    $table->index('status');
    $table->index('priority');
});
```

#### 4. `project_updates` Table

```php
Schema::create('project_updates', function (Blueprint $table) {
    $table->id();
    $table->foreignId('project_id')->constrained('projects')->cascadeOnDelete();
    $table->enum('type', ['client_message', 'internal_note', 'change_request', 'meeting_note', 'decision'])->default('internal_note');
    $table->text('message');
    $table->foreignId('created_by')->constrained('admins');
    $table->boolean('is_important')->default(false);
    $table->json('attachments')->nullable(); // Array of file paths
    $table->timestamps();

    $table->index('project_id');
    $table->index('type');
    $table->index('created_at');
});
```

#### 5. `tasks` Table

```php
Schema::create('tasks', function (Blueprint $table) {
    $table->id();
    $table->foreignId('project_id')->constrained('projects')->cascadeOnDelete();
    $table->string('title');
    $table->text('description')->nullable();
    $table->enum('status', ['todo', 'in_progress', 'review', 'completed', 'blocked'])->default('todo');
    $table->foreignId('assigned_to')->nullable()->constrained('admins')->nullOnDelete();
    $table->date('due_date')->nullable();
    $table->integer('priority')->default(0); // 0 = low, 1 = medium, 2 = high, 3 = critical
    $table->integer('progress_percentage')->default(0);
    $table->text('internal_comments')->nullable();
    $table->foreignId('milestone_id')->nullable()->constrained('milestones')->nullOnDelete();
    $table->integer('order')->default(0);
    $table->timestamps();

    $table->index('project_id');
    $table->index('status');
    $table->index('assigned_to');
    $table->index('due_date');
});
```

#### 6. `milestones` Table

```php
Schema::create('milestones', function (Blueprint $table) {
    $table->id();
    $table->foreignId('project_id')->constrained('projects')->cascadeOnDelete();
    $table->string('title');
    $table->text('description')->nullable();
    $table->date('due_date')->nullable();
    $table->date('completed_date')->nullable();
    $table->enum('status', ['pending', 'in_progress', 'completed', 'overdue', 'cancelled'])->default('pending');
    $table->integer('progress_percentage')->default(0);
    $table->integer('order')->default(0);
    $table->timestamps();

    $table->index('project_id');
    $table->index('status');
    $table->index('due_date');
});
```

#### 7. `documents` Table

```php
Schema::create('documents', function (Blueprint $table) {
    $table->id();
    $table->foreignId('project_id')->constrained('projects')->cascadeOnDelete();
    $table->string('name');
    $table->enum('category', ['nda', 'proposal', 'quote', 'invoice', 'contract', 'final_delivery', 'offboarding', 'other'])->default('other');
    $table->string('file_path');
    $table->string('file_name');
    $table->string('file_size')->nullable();
    $table->string('mime_type')->nullable();
    $table->text('description')->nullable();
    $table->foreignId('uploaded_by')->constrained('admins');
    $table->timestamps();

    $table->index('project_id');
    $table->index('category');
});
```

#### 8. `invoices` Table

```php
Schema::create('invoices', function (Blueprint $table) {
    $table->id();
    $table->foreignId('project_id')->constrained('projects')->cascadeOnDelete();
    $table->string('invoice_number')->unique();
    $table->decimal('amount', 15, 2);
    $table->decimal('tax_amount', 15, 2)->default(0);
    $table->decimal('total_amount', 15, 2);
    $table->enum('status', ['draft', 'sent', 'paid', 'partial', 'overdue', 'cancelled'])->default('draft');
    $table->date('invoice_date');
    $table->date('due_date');
    $table->date('paid_date')->nullable();
    $table->text('description')->nullable();
    $table->text('notes')->nullable();
    $table->string('file_path')->nullable(); // PDF file path
    $table->string('payment_link')->nullable(); // UPI/Stripe link
    $table->string('payment_reference')->nullable();
    $table->foreignId('created_by')->constrained('admins');
    $table->timestamps();
    $table->softDeletes();

    $table->index('project_id');
    $table->index('status');
    $table->index('invoice_number');
    $table->index('due_date');
});
```

#### 9. `invoice_payments` Table

```php
Schema::create('invoice_payments', function (Blueprint $table) {
    $table->id();
    $table->foreignId('invoice_id')->constrained('invoices')->cascadeOnDelete();
    $table->decimal('amount', 15, 2);
    $table->date('payment_date');
    $table->enum('payment_method', ['bank_transfer', 'upi', 'credit_card', 'debit_card', 'cash', 'cheque', 'other'])->default('bank_transfer');
    $table->string('transaction_id')->nullable();
    $table->string('payment_receipt_path')->nullable();
    $table->text('notes')->nullable();
    $table->foreignId('recorded_by')->constrained('admins');
    $table->timestamps();

    $table->index('invoice_id');
    $table->index('payment_date');
});
```

#### 10. `activity_logs` Table

```php
Schema::create('activity_logs', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->nullable()->constrained('admins')->nullOnDelete();
    $table->foreignId('project_id')->nullable()->constrained('projects')->cascadeOnDelete();
    $table->foreignId('client_id')->nullable()->constrained('clients')->cascadeOnDelete();
    $table->string('action'); // e.g., "client_created", "project_status_changed", "invoice_sent"
    $table->text('description');
    $table->json('metadata')->nullable(); // Additional data
    $table->string('ip_address')->nullable();
    $table->string('user_agent')->nullable();
    $table->timestamps();

    $table->index('user_id');
    $table->index('project_id');
    $table->index('client_id');
    $table->index('action');
    $table->index('created_at');
});
```

#### 11. `project_team_members` Table (Many-to-Many)

```php
Schema::create('project_team_members', function (Blueprint $table) {
    $table->id();
    $table->foreignId('project_id')->constrained('projects')->cascadeOnDelete();
    $table->foreignId('admin_id')->constrained('admins')->cascadeOnDelete();
    $table->enum('role', ['lead', 'developer', 'designer', 'tester', 'manager'])->default('developer');
    $table->timestamps();

    $table->unique(['project_id', 'admin_id']);
    $table->index('project_id');
});
```

---

## 📦 Implementation Phases

### Phase 1: Foundation (Week 1-2)
**Goal:** Set up database structure and basic models

**Tasks:**
1. Create all migration files
2. Create all model files with relationships
3. Create seeders for initial data (status enums, sample data)
4. Update RolesAndPermissionsSeeder with CRM permissions
5. Set up file storage configuration
6. Basic testing of migrations and models

**Deliverables:**
- ✅ All tables created
- ✅ All models with relationships
- ✅ Seeders ready
- ✅ Permissions defined

### Phase 2: Core Features (Week 3-4)
**Goal:** Implement Clients and Projects modules

**Tasks:**
1. Client CRUD (Create, Read, Update, Delete)
2. Client listing with filters and search
3. Client detail page
4. Project CRUD
5. Project detail page (Overview tab only)
6. Project status management
7. Client-Project relationships

**Deliverables:**
- ✅ Clients management interface
- ✅ Projects management interface
- ✅ Client detail view
- ✅ Project detail view (basic)

### Phase 3: Requirements & Communication (Week 5-6)
**Goal:** Implement Requirements and Communication modules

**Tasks:**
1. Requirements CRUD
2. Requirements list in project view
3. Priority and status management
4. Project Updates (Communication log)
5. Project Updates CRUD
6. Attachments handling
7. Activity logging system

**Deliverables:**
- ✅ Requirements management
- ✅ Communication log
- ✅ Activity logging

### Phase 4: Tasks, Milestones & Documents (Week 7-8)
**Goal:** Implement Task, Milestone, and Document modules

**Tasks:**
1. Tasks CRUD
2. Task assignment and status tracking
3. Milestones CRUD
4. Milestone progress tracking
5. Documents upload and management
6. Document categories
7. File storage integration

**Deliverables:**
- ✅ Task management
- ✅ Milestone tracking
- ✅ Document management

### Phase 5: Invoices & Payments (Week 9-10)
**Goal:** Implement Invoice and Payment modules

**Tasks:**
1. Invoice CRUD
2. Invoice number generation
3. Invoice PDF generation (optional)
4. Payment recording
5. Payment status tracking
6. Payment links integration
7. Payment receipts

**Deliverables:**
- ✅ Invoice management
- ✅ Payment tracking

### Phase 6: Dashboard & Pipeline (Week 11-12)
**Goal:** Implement Dashboard and Pipeline views

**Tasks:**
1. Dashboard KPI cards
2. Dashboard charts (optional)
3. Pipeline Kanban view
4. Drag & drop functionality (Alpine.js or Livewire)
5. Quick stats
6. Recent activity feed
7. Upcoming deadlines widget

**Deliverables:**
- ✅ Dashboard with KPIs
- ✅ Pipeline Kanban view

### Phase 7: Automation & Polish (Week 13-14)
**Goal:** Add automation, notifications, and polish

**Tasks:**
1. Email notifications
2. Status change automations
3. Activity log automations
4. Form validation improvements
5. UI/UX polish
6. Performance optimization
7. Documentation

**Deliverables:**
- ✅ Email notifications
- ✅ Automations
- ✅ Polished UI

---

## 🎨 Models & Relationships

### Client Model

```php
class Client extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'email', 'phone', 'company', 'status', 'notes',
        'address', 'city', 'state', 'country', 'postal_code',
        'website', 'created_by'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    // Relationships
    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function creator()
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }

    public function activityLogs()
    {
        return $this->hasMany(ActivityLog::class);
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->whereNotIn('status', ['completed', 'archived']);
    }
}
```

### Project Model

```php
class Project extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'client_id', 'title', 'description', 'status', 'start_date',
        'end_date', 'actual_end_date', 'budget', 'payment_status',
        'payment_structure', 'assigned_to', 'progress_percentage',
        'internal_notes'
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'actual_end_date' => 'date',
        'budget' => 'decimal:2',
        'progress_percentage' => 'integer',
    ];

    // Relationships
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function assignedTo()
    {
        return $this->belongsTo(Admin::class, 'assigned_to');
    }

    public function requirements()
    {
        return $this->hasMany(Requirement::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function milestones()
    {
        return $this->hasMany(Milestone::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function projectUpdates()
    {
        return $this->hasMany(ProjectUpdate::class);
    }

    public function teamMembers()
    {
        return $this->belongsToMany(Admin::class, 'project_team_members')
            ->withPivot('role')
            ->withTimestamps();
    }

    public function activityLogs()
    {
        return $this->hasMany(ActivityLog::class);
    }

    // Computed properties
    public function getTotalInvoicedAttribute()
    {
        return $this->invoices()->sum('total_amount');
    }

    public function getTotalPaidAttribute()
    {
        return $this->invoices()->where('status', 'paid')->sum('total_amount');
    }

    public function getRemainingBudgetAttribute()
    {
        return $this->budget ? ($this->budget - $this->total_paid) : null;
    }
}
```

### Requirement Model

```php
class Requirement extends Model
{
    protected $fillable = [
        'project_id', 'title', 'description', 'priority', 'status',
        'estimated_hours', 'actual_hours', 'notes', 'assigned_to',
        'due_date', 'order'
    ];

    protected $casts = [
        'due_date' => 'date',
        'estimated_hours' => 'integer',
        'actual_hours' => 'integer',
        'order' => 'integer',
    ];

    // Relationships
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function assignedTo()
    {
        return $this->belongsTo(Admin::class, 'assigned_to');
    }
}
```

### Task Model

```php
class Task extends Model
{
    protected $fillable = [
        'project_id', 'title', 'description', 'status', 'assigned_to',
        'due_date', 'priority', 'progress_percentage', 'internal_comments',
        'milestone_id', 'order'
    ];

    protected $casts = [
        'due_date' => 'date',
        'priority' => 'integer',
        'progress_percentage' => 'integer',
        'order' => 'integer',
    ];

    // Relationships
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function assignedTo()
    {
        return $this->belongsTo(Admin::class, 'assigned_to');
    }

    public function milestone()
    {
        return $this->belongsTo(Milestone::class);
    }
}
```

### Milestone Model

```php
class Milestone extends Model
{
    protected $fillable = [
        'project_id', 'title', 'description', 'due_date', 'completed_date',
        'status', 'progress_percentage', 'order'
    ];

    protected $casts = [
        'due_date' => 'date',
        'completed_date' => 'date',
        'progress_percentage' => 'integer',
        'order' => 'integer',
    ];

    // Relationships
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    // Computed
    public function getTaskProgressAttribute()
    {
        $total = $this->tasks()->count();
        if ($total === 0) return 0;
        
        $completed = $this->tasks()->where('status', 'completed')->count();
        return round(($completed / $total) * 100);
    }
}
```

### Document Model

```php
class Document extends Model
{
    protected $fillable = [
        'project_id', 'name', 'category', 'file_path', 'file_name',
        'file_size', 'mime_type', 'description', 'uploaded_by'
    ];

    // Relationships
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function uploadedBy()
    {
        return $this->belongsTo(Admin::class, 'uploaded_by');
    }

    // Accessors
    public function getFileUrlAttribute()
    {
        return Storage::url($this->file_path);
    }
}
```

### Invoice Model

```php
class Invoice extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'project_id', 'invoice_number', 'amount', 'tax_amount', 'total_amount',
        'status', 'invoice_date', 'due_date', 'paid_date', 'description',
        'notes', 'file_path', 'payment_link', 'payment_reference', 'created_by'
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'tax_amount' => 'decimal:2',
        'total_amount' => 'decimal:2',
        'invoice_date' => 'date',
        'due_date' => 'date',
        'paid_date' => 'date',
    ];

    // Relationships
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function payments()
    {
        return $this->hasMany(InvoicePayment::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }

    // Computed
    public function getTotalPaidAttribute()
    {
        return $this->payments()->sum('amount');
    }

    public function getRemainingAmountAttribute()
    {
        return $this->total_amount - $this->total_paid;
    }
}
```

### ProjectUpdate Model

```php
class ProjectUpdate extends Model
{
    protected $fillable = [
        'project_id', 'type', 'message', 'created_by',
        'is_important', 'attachments'
    ];

    protected $casts = [
        'is_important' => 'boolean',
        'attachments' => 'array',
    ];

    // Relationships
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }
}
```

### ActivityLog Model

```php
class ActivityLog extends Model
{
    protected $fillable = [
        'user_id', 'project_id', 'client_id', 'action',
        'description', 'metadata', 'ip_address', 'user_agent'
    ];

    protected $casts = [
        'metadata' => 'array',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(Admin::class, 'user_id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
```

---

## 🎮 Controllers Structure

### Admin Controllers

```
app/Http/Controllers/Admin/
├── ClientController.php
├── ProjectController.php
├── RequirementController.php
├── TaskController.php
├── MilestoneController.php
├── DocumentController.php
├── InvoiceController.php
├── InvoicePaymentController.php
├── ProjectUpdateController.php
├── ActivityLogController.php
└── DashboardController.php
```

### Controller Methods Structure

#### ClientController
- `index()` - List all clients with filters
- `create()` - Show create form
- `store()` - Store new client
- `show()` - Show client details
- `edit()` - Show edit form
- `update()` - Update client
- `destroy()` - Delete client
- `updateStatus()` - Update client status

#### ProjectController
- `index()` - List all projects
- `create()` - Show create form
- `store()` - Store new project
- `show()` - Show project details (with tabs)
- `edit()` - Show edit form
- `update()` - Update project
- `destroy()` - Delete project
- `updateStatus()` - Update project status
- `updateProgress()` - Update project progress
- `assignTeam()` - Assign team members

#### DashboardController
- `index()` - Show dashboard with KPIs
- `pipeline()` - Show pipeline Kanban view
- `updatePipelineStatus()` - Update status via drag & drop

---

## 🎨 Views Structure

```
resources/views/admin/
├── clients/
│   ├── index.blade.php
│   ├── create.blade.php
│   ├── edit.blade.php
│   └── show.blade.php
├── projects/
│   ├── index.blade.php
│   ├── create.blade.php
│   ├── edit.blade.php
│   └── show.blade.php
│   │   ├── _overview.blade.php
│   │   ├── _requirements.blade.php
│   │   ├── _tasks.blade.php
│   │   ├── _communication.blade.php
│   │   ├── _documents.blade.php
│   │   ├── _invoices.blade.php
│   │   └── _activity.blade.php
├── dashboard/
│   ├── index.blade.php
│   └── pipeline.blade.php
└── components/
    ├── client-card.blade.php
    ├── project-card.blade.php
    ├── status-badge.blade.php
    └── kpi-card.blade.php
```

---

## 🛣️ Routes Structure

```php
// routes/web.php

Route::prefix('admin')->name('admin.')->middleware(['auth:admin'])->group(function () {
    
    // Dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('pipeline', [DashboardController::class, 'pipeline'])->name('pipeline');
    Route::post('pipeline/update-status', [DashboardController::class, 'updatePipelineStatus'])->name('pipeline.update-status');

    // Clients
    Route::resource('clients', ClientController::class);
    Route::post('clients/{client}/update-status', [ClientController::class, 'updateStatus'])->name('clients.update-status');

    // Projects
    Route::resource('projects', ProjectController::class);
    Route::post('projects/{project}/update-status', [ProjectController::class, 'updateStatus'])->name('projects.update-status');
    Route::post('projects/{project}/update-progress', [ProjectController::class, 'updateProgress'])->name('projects.update-progress');
    Route::post('projects/{project}/assign-team', [ProjectController::class, 'assignTeam'])->name('projects.assign-team');

    // Requirements
    Route::resource('projects.requirements', RequirementController::class)->shallow();

    // Tasks
    Route::resource('projects.tasks', TaskController::class)->shallow();

    // Milestones
    Route::resource('projects.milestones', MilestoneController::class)->shallow();

    // Documents
    Route::resource('projects.documents', DocumentController::class)->shallow();
    Route::post('projects/{project}/documents/{document}/download', [DocumentController::class, 'download'])->name('documents.download');

    // Invoices
    Route::resource('projects.invoices', InvoiceController::class)->shallow();
    Route::post('invoices/{invoice}/generate-pdf', [InvoiceController::class, 'generatePdf'])->name('invoices.generate-pdf');
    
    // Invoice Payments
    Route::resource('invoices.payments', InvoicePaymentController::class)->shallow();

    // Project Updates (Communication)
    Route::resource('projects.project-updates', ProjectUpdateController::class)->shallow();

    // Activity Logs
    Route::get('activity-logs', [ActivityLogController::class, 'index'])->name('activity-logs.index');
});
```

---

## 🎨 UI/UX Guidelines

### Color Scheme (Techbuds Theme)

```css
:root {
    --color-primary: #11224E;
    --color-secondary: #1f3b88;
    --color-accent: #088395;
    --color-accent-light: #37B7C3;
    --color-background: #FFFDF6;
}
```

### Status Colors

```php
'client_statuses' => [
    'discovery' => '#94a3b8',      // Gray
    'proposal_sent' => '#3b82f6',  // Blue
    'proposal_accepted' => '#10b981', // Green
    'onboarding' => '#f59e0b',     // Orange
    'project_started' => '#8b5cf6', // Purple
    'in_development' => '#6366f1',  // Indigo
    'in_testing' => '#ec4899',     // Pink
    'invoice_sent' => '#f97316',   // Orange
    'paid' => '#10b981',           // Green
    'offboarding' => '#06b6d4',    // Cyan
    'completed' => '#64748b',      // Slate
    'archived' => '#475569',       // Dark Slate
],

'project_statuses' => [
    'planning' => '#94a3b8',
    'ui_ux' => '#f59e0b',
    'development' => '#6366f1',
    'testing' => '#ec4899',
    'deployment' => '#8b5cf6',
    'handover' => '#06b6d4',
    'maintenance' => '#10b981',
    'completed' => '#64748b',
    'cancelled' => '#ef4444',
],
```

### Component Styles

- **Cards:** Rounded-2xl, border with accent color, shadow
- **Badges:** Rounded-full, small padding, status colors
- **Buttons:** Primary (accent color), Secondary (border), Danger (red)
- **Tables:** Clean, hover effects, zebra striping optional

---

## 🔐 Permissions & Roles

### Permission Structure

```php
// Add to RolesAndPermissionsSeeder.php

$modules = [
    'blogs', 
    'contacts', 
    'admins', 
    'notifications',
    'tool-categories',
    'tool-links',
    // CRM Modules
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

### Role Permissions

**Super Admin:**
- All permissions

**Admin:**
- All permissions except admin management

**Editor:**
- Clients: list, update
- Projects: list, update
- Requirements: list, update
- Tasks: list, update
- Documents: list, create
- Project Updates: list, create
- Invoices: list (read-only)
- No delete permissions

**Developer:**
- Clients: list
- Projects: list, update (assigned only)
- Requirements: list, update (assigned only)
- Tasks: list, create, update (assigned only)
- Milestones: list
- Documents: list
- Project Updates: list, create

---

## 📡 API Endpoints (Optional)

If you want to build a mobile app or API access:

```php
// routes/api.php

Route::prefix('v1')->middleware('auth:sanctum')->group(function () {
    Route::apiResource('clients', Api\ClientController::class);
    Route::apiResource('projects', Api\ProjectController::class);
    Route::apiResource('projects.tasks', Api\TaskController::class)->shallow();
    // ... etc
});
```

---

## 🤖 Automation & Notifications

### Event Listeners

```php
// app/Listeners/ProjectStatusChangedListener.php

class ProjectStatusChangedListener
{
    public function handle(ProjectStatusChanged $event)
    {
        // Log activity
        ActivityLog::create([
            'user_id' => auth()->id(),
            'project_id' => $event->project->id,
            'action' => 'project_status_changed',
            'description' => "Project status changed from {$event->oldStatus} to {$event->newStatus}",
        ]);

        // Send notification if status is 'completed'
        if ($event->newStatus === 'completed') {
            // Send email to client
            // Generate offboarding document
        }
    }
}
```

### Notification Types

1. **Email Notifications:**
   - Proposal sent
   - Invoice sent
   - Payment received
   - Project completed
   - Status change notifications

2. **In-App Notifications:**
   - New task assigned
   - Task due date approaching
   - Invoice overdue
   - New project update

---

## ✅ Testing Strategy

### Unit Tests
- Model relationships
- Model accessors/mutators
- Model scopes

### Feature Tests
- CRUD operations
- Permission checks
- Status updates
- File uploads

### Browser Tests (Optional)
- Kanban drag & drop
- Form submissions
- Navigation flows

---

## 🚀 Deployment Guide

### Pre-Deployment Checklist
1. ✅ All migrations run successfully
2. ✅ Seeders tested
3. ✅ Permissions configured
4. ✅ File storage configured (local/S3)
5. ✅ Environment variables set
6. ✅ Email configuration tested
7. ✅ Backup strategy in place

### Post-Deployment
1. Run migrations
2. Run seeders
3. Clear cache: `php artisan optimize:clear`
4. Set storage link: `php artisan storage:link`
5. Test all features

---

## 📝 Next Steps

1. **Review this plan** with your team
2. **Adjust timeline** based on resources
3. **Start with Phase 1** - Foundation
4. **Iterate and improve** as you build

---

## 📞 Support & Questions

For questions or clarifications during implementation, refer to:
- Laravel Documentation
- Spatie Permission Documentation
- This implementation plan

---

**Document Version:** 1.0  
**Last Updated:** 2025-11-17  
**Status:** Ready for Implementation

