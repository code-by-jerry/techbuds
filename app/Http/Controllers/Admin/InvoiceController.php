<?php

namespace App\Http\Controllers\Admin;

use App\Events\InvoiceSent;
use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Project;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the invoices for a project.
     */
    public function index(Project $project)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('invoices.list')) {
            abort(403, 'You do not have permission to view invoices.');
        }

        $invoices = $project->invoices()
            ->with(['createdBy', 'payments'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.projects.invoices.index', compact('project', 'invoices'));
    }

    /**
     * Show the form for creating a new invoice.
     */
    public function create(Project $project)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('invoices.create')) {
            abort(403, 'You do not have permission to create invoices.');
        }

        return view('admin.projects.invoices.create', compact('project'));
    }

    /**
     * Store a newly created invoice in storage.
     */
    public function store(Request $request, Project $project)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('invoices.create')) {
            abort(403, 'You do not have permission to create invoices.');
        }

        $validated = $request->validate([
            'amount' => 'required|numeric|min:0',
            'tax_amount' => 'nullable|numeric|min:0',
            'status' => 'required|in:draft,sent,paid,partial,overdue,cancelled',
            'invoice_date' => 'required|date',
            'due_date' => 'required|date|after_or_equal:invoice_date',
            'description' => 'nullable|string',
            'notes' => 'nullable|string',
            'payment_link' => 'nullable|url|max:255',
            'payment_reference' => 'nullable|string|max:255',
        ]);

        // Generate invoice number
        $invoiceNumber = $this->generateInvoiceNumber();

        // Calculate total amount
        $taxAmount = $validated['tax_amount'] ?? 0;
        $totalAmount = $validated['amount'] + $taxAmount;

        $invoice = Invoice::create([
            'project_id' => $project->id,
            'invoice_number' => $invoiceNumber,
            'amount' => $validated['amount'],
            'tax_amount' => $taxAmount,
            'total_amount' => $totalAmount,
            'status' => $validated['status'],
            'invoice_date' => $validated['invoice_date'],
            'due_date' => $validated['due_date'],
            'description' => $validated['description'] ?? null,
            'notes' => $validated['notes'] ?? null,
            'payment_link' => $validated['payment_link'] ?? null,
            'payment_reference' => $validated['payment_reference'] ?? null,
            'created_by' => $admin->id,
        ]);

        // Log activity
        $this->logActivity($project, 'invoice_created', "Invoice '{$invoiceNumber}' created for amount {$totalAmount}");

        if ($invoice->status === 'sent') {
            $invoice->loadMissing('project.client');
            event(new InvoiceSent($invoice));
        }

        return redirect()->route('admin.projects.show', $project)
            ->with('success', 'Invoice created successfully.');
    }

    /**
     * Display the specified invoice.
     */
    public function show(Invoice $invoice)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('invoices.list')) {
            abort(403, 'You do not have permission to view invoices.');
        }

        $invoice->load(['project.client', 'createdBy', 'payments.recordedBy']);
        $project = $invoice->project;

        return view('admin.projects.invoices.show', compact('project', 'invoice'));
    }

    /**
     * Show the form for editing the specified invoice.
     */
    public function edit(Invoice $invoice)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('invoices.update')) {
            abort(403, 'You do not have permission to edit invoices.');
        }

        $invoice->load('project');
        $project = $invoice->project;

        return view('admin.projects.invoices.edit', compact('project', 'invoice'));
    }

    /**
     * Update the specified invoice in storage.
     */
    public function update(Request $request, Invoice $invoice)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('invoices.update')) {
            abort(403, 'You do not have permission to update invoices.');
        }

        $validated = $request->validate([
            'amount' => 'required|numeric|min:0',
            'tax_amount' => 'nullable|numeric|min:0',
            'status' => 'required|in:draft,sent,paid,partial,overdue,cancelled',
            'invoice_date' => 'required|date',
            'due_date' => 'required|date|after_or_equal:invoice_date',
            'description' => 'nullable|string',
            'notes' => 'nullable|string',
            'payment_link' => 'nullable|url|max:255',
            'payment_reference' => 'nullable|string|max:255',
        ]);

        $invoice->load('project');
        $project = $invoice->project;
        $oldStatus = $invoice->status;

        // Calculate total amount
        $taxAmount = $validated['tax_amount'] ?? 0;
        $totalAmount = $validated['amount'] + $taxAmount;

        $invoice->update([
            'amount' => $validated['amount'],
            'tax_amount' => $taxAmount,
            'total_amount' => $totalAmount,
            'status' => $validated['status'],
            'invoice_date' => $validated['invoice_date'],
            'due_date' => $validated['due_date'],
            'description' => $validated['description'] ?? null,
            'notes' => $validated['notes'] ?? null,
            'payment_link' => $validated['payment_link'] ?? null,
            'payment_reference' => $validated['payment_reference'] ?? null,
        ]);

        // Auto-update paid_date based on status
        if ($invoice->status === 'paid' && !$invoice->paid_date) {
            $invoice->update(['paid_date' => now()]);
        } elseif ($invoice->status !== 'paid' && $invoice->paid_date) {
            $invoice->update(['paid_date' => null]);
        }

        // Log activity if status changed
        if ($oldStatus !== $invoice->status) {
            $this->logActivity($project, 'invoice_status_changed', "Invoice '{$invoice->invoice_number}' status changed from " . ucfirst($oldStatus) . " to " . ucfirst($invoice->status));

            if ($invoice->status === 'sent') {
                $invoice->loadMissing('project.client');
                event(new InvoiceSent($invoice));
            }
        } else {
            $this->logActivity($project, 'invoice_updated', "Invoice '{$invoice->invoice_number}' updated");
        }

        return redirect()->route('admin.projects.show', $project)
            ->with('success', 'Invoice updated successfully.');
    }

    /**
     * Remove the specified invoice from storage.
     */
    public function destroy(Invoice $invoice)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('invoices.delete')) {
            abort(403, 'You do not have permission to delete invoices.');
        }

        $invoice->load('project');
        $project = $invoice->project;
        $invoiceNumber = $invoice->invoice_number;
        $invoice->delete();

        // Log activity
        $this->logActivity($project, 'invoice_deleted', "Invoice '{$invoiceNumber}' deleted");

        return redirect()->route('admin.projects.show', $project)
            ->with('success', 'Invoice deleted successfully.');
    }

    /**
     * Generate a unique invoice number.
     */
    private function generateInvoiceNumber()
    {
        $year = date('Y');
        $month = date('m');
        
        // Get the last invoice number for this month
        $lastInvoice = Invoice::whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->orderBy('id', 'desc')
            ->first();

        if ($lastInvoice) {
            // Extract the sequence number from the last invoice
            $parts = explode('-', $lastInvoice->invoice_number);
            $sequence = (int) end($parts) + 1;
        } else {
            $sequence = 1;
        }

        // Format: INV-YYYY-MM-001
        return sprintf('INV-%s-%s-%03d', $year, $month, $sequence);
    }

    /**
     * Generate and download invoice PDF.
     */
    public function downloadPdf(Invoice $invoice)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('invoices.list')) {
            abort(403, 'You do not have permission to download invoices.');
        }

        $invoice->load(['project.client', 'payments', 'createdBy']);

        $pdf = Pdf::loadView('admin.projects.invoices.pdf', [
            'invoice' => $invoice,
            'project' => $invoice->project,
            'client' => $invoice->project->client,
        ]);

        $filename = 'Invoice-' . $invoice->invoice_number . '.pdf';

        return $pdf->download($filename);
    }

    /**
     * Log activity for the project.
     */
    private function logActivity(Project $project, string $action, string $description)
    {
        \App\Models\ActivityLog::create([
            'user_id' => auth()->guard('admin')->id(),
            'project_id' => $project->id,
            'client_id' => $project->client_id,
            'action' => $action,
            'description' => $description,
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);
    }
}
