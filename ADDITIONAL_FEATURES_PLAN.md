# 📋 Additional Features Implementation Plan

**Date:** 2025-11-17  
**Status:** Planning Phase

---

## 🎯 Overview

This document outlines the implementation plan for additional features that were identified as missing from the main CRM implementation plan.

---

## 1. Team Member Assignment Feature

### Current Status
- ✅ `project_team_members` table exists in database
- ✅ `Project` model has `teamMembers()` relationship
- ❌ `assignTeam()` method not implemented in ProjectController
- ❌ Team assignment UI not created

### Implementation Plan

#### Step 1: Update ProjectController
**File:** `app/Http/Controllers/Admin/ProjectController.php`

**Add Method:**
```php
/**
 * Assign team members to a project.
 */
public function assignTeam(Request $request, Project $project)
{
    // Check permission
    $admin = auth()->guard('admin')->user();
    if ($admin->email !== 'admin@techbuds.online' && !$admin->can('projects.update')) {
        abort(403, 'You do not have permission to assign team members.');
    }

    $validated = $request->validate([
        'team_members' => 'required|array',
        'team_members.*.admin_id' => 'required|exists:admins,id',
        'team_members.*.role' => 'required|in:lead,developer,designer,tester,manager',
    ]);

    // Sync team members
    $teamData = [];
    foreach ($validated['team_members'] as $member) {
        $teamData[$member['admin_id']] = ['role' => $member['role']];
    }
    $project->teamMembers()->sync($teamData);

    // Log activity
    $this->logActivity($project, 'team_assigned', 'Team members assigned to project');

    return redirect()->back()
        ->with('success', 'Team members assigned successfully.');
}
```

#### Step 2: Add Route
**File:** `routes/web.php`

```php
Route::post('projects/{project}/assign-team', [\App\Http\Controllers\Admin\ProjectController::class, 'assignTeam'])->name('projects.assign-team');
```

#### Step 3: Create Team Assignment View
**File:** `resources/views/admin/projects/_team.blade.php`

- Display current team members
- Add/remove team members form
- Role selection (lead, developer, designer, tester, manager)
- Integration into project show page

#### Step 4: Add Team Tab to Project Show Page
- Add "Team" tab to project show page
- Include team assignment partial

### Deliverables
- ✅ Team assignment functionality
- ✅ Team management UI
- ✅ Activity logging
- ✅ Permission checks

---

## 2. Invoice PDF Generation Feature

### Current Status
- ✅ Invoice model and controller exist
- ✅ Invoice data available
- ❌ PDF generation not implemented
- ❌ PDF download route not created

### Implementation Plan

#### Step 1: Install PDF Library
**Command:**
```bash
composer require barryvdh/laravel-dompdf
```

**Publish Config:**
```bash
php artisan vendor:publish --provider="Barryvdh\DomPDF\ServiceProvider"
```

#### Step 2: Create PDF View
**File:** `resources/views/admin/invoices/pdf.blade.php`

- Professional invoice template
- Company logo and details
- Client information
- Invoice items/description
- Amount breakdown (subtotal, tax, total)
- Payment information
- Terms and conditions

#### Step 3: Add PDF Generation Method
**File:** `app/Http/Controllers/Admin/InvoiceController.php`

**Add Method:**
```php
/**
 * Generate and download invoice PDF.
 */
public function generatePdf(Invoice $invoice)
{
    // Check permission
    $admin = auth()->guard('admin')->user();
    if ($admin->email !== 'admin@techbuds.online' && !$admin->can('invoices.list')) {
        abort(403, 'You do not have permission to generate invoices.');
    }

    $invoice->load(['project.client', 'payments', 'createdBy']);
    $project = $invoice->project;

    $pdf = PDF::loadView('admin.invoices.pdf', compact('invoice', 'project'));
    
    // Store PDF file
    $fileName = 'invoice-' . $invoice->invoice_number . '.pdf';
    $filePath = 'invoices/' . $fileName;
    Storage::disk('public')->put($filePath, $pdf->output());

    // Update invoice with PDF path
    $invoice->update(['file_path' => $filePath]);

    // Log activity
    $this->logActivity($project, 'invoice_pdf_generated', "PDF generated for invoice '{$invoice->invoice_number}'");

    return $pdf->download($fileName);
}
```

#### Step 4: Add Download Route
**File:** `routes/web.php`

```php
Route::get('invoices/{invoice}/download-pdf', [\App\Http\Controllers\Admin\InvoiceController::class, 'generatePdf'])->name('invoices.download-pdf');
```

#### Step 5: Add PDF Download Button
**Files:**
- `resources/views/admin/projects/_invoices.blade.php`
- `resources/views/admin/projects/invoices/show.blade.php`

Add "Download PDF" button to invoice views.

### Deliverables
- ✅ PDF generation functionality
- ✅ Professional invoice template
- ✅ PDF download feature
- ✅ PDF file storage
- ✅ Activity logging

---

## 3. Email Notifications System

### Current Status
- ❌ Email notifications not implemented
- ❌ Event listeners not created
- ❌ Email templates not created

### Implementation Plan

#### Step 1: Create Events
**Files:**
- `app/Events/ClientStatusChanged.php`
- `app/Events/ProjectStatusChanged.php`
- `app/Events/InvoiceSent.php`
- `app/Events/PaymentReceived.php`
- `app/Events/TaskAssigned.php`

#### Step 2: Create Listeners
**Files:**
- `app/Listeners/SendClientStatusNotification.php`
- `app/Listeners/SendProjectStatusNotification.php`
- `app/Listeners/SendInvoiceNotification.php`
- `app/Listeners/SendPaymentNotification.php`
- `app/Listeners/SendTaskAssignmentNotification.php`

#### Step 3: Create Email Templates
**Files:**
- `resources/views/emails/client-status-changed.blade.php`
- `resources/views/emails/project-status-changed.blade.php`
- `resources/views/emails/invoice-sent.blade.php`
- `resources/views/emails/payment-received.blade.php`
- `resources/views/emails/task-assigned.blade.php`

#### Step 4: Register Events
**File:** `app/Providers/EventServiceProvider.php`

```php
protected $listen = [
    ClientStatusChanged::class => [
        SendClientStatusNotification::class,
    ],
    ProjectStatusChanged::class => [
        SendProjectStatusNotification::class,
    ],
    // ... etc
];
```

#### Step 5: Update Controllers
- Fire events when status changes occur
- Fire events when invoices are sent
- Fire events when payments are recorded

### Deliverables
- ✅ Email notification system
- ✅ Event-driven architecture
- ✅ Email templates
- ✅ Configurable notification preferences

---

## 4. Status Change Automations

### Current Status
- ❌ Automatic status updates not implemented
- ❌ Automation rules not defined

### Implementation Plan

#### Step 1: Create Automation Service
**File:** `app/Services/ProjectAutomationService.php`

**Features:**
- Auto-update project status based on milestones
- Auto-update client status based on project status
- Auto-mark invoices as overdue
- Auto-update task status based on completion

#### Step 2: Create Scheduled Tasks
**File:** `app/Console/Kernel.php`

```php
protected function schedule(Schedule $schedule)
{
    // Check for overdue invoices
    $schedule->call(function () {
        Invoice::where('due_date', '<', now())
            ->whereNotIn('status', ['paid', 'cancelled'])
            ->update(['status' => 'overdue']);
    })->daily();

    // Check for overdue tasks
    $schedule->call(function () {
        Task::where('due_date', '<', now())
            ->whereNotIn('status', ['completed', 'cancelled'])
            ->update(['status' => 'overdue']);
    })->daily();
}
```

#### Step 3: Create Automation Rules
- Define rules for automatic status changes
- Create configuration file for automation settings

### Deliverables
- ✅ Automatic status updates
- ✅ Scheduled tasks
- ✅ Automation rules
- ✅ Configurable automation settings

---

## 📊 Implementation Priority

### Priority 1 (High):
1. **Team Member Assignment** - Core functionality
2. **Invoice PDF Generation** - Client requirement

### Priority 2 (Medium):
3. **Email Notifications** - Important for communication
4. **Status Change Automations** - Efficiency improvement

---

## 🎯 Estimated Timeline

- **Team Member Assignment:** 1-2 days
- **Invoice PDF Generation:** 1-2 days
- **Email Notifications:** 2-3 days
- **Status Change Automations:** 1-2 days

**Total:** ~1 week

---

**Status:** Ready for Implementation

