<?php

namespace App\Http\Controllers\Admin;

use App\Events\PaymentReceived;
use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\InvoicePayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InvoicePaymentController extends Controller
{
    /**
     * Display a listing of payments for an invoice.
     */
    public function index(Invoice $invoice)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('invoices.list')) {
            abort(403, 'You do not have permission to view payments.');
        }

        $invoice->load(['project', 'payments.recordedBy']);
        $project = $invoice->project;

        return view('admin.projects.invoices.payments.index', compact('project', 'invoice'));
    }

    /**
     * Show the form for creating a new payment.
     */
    public function create(Invoice $invoice)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('invoices.update')) {
            abort(403, 'You do not have permission to record payments.');
        }

        $invoice->load('project');
        $project = $invoice->project;
        $remainingAmount = $invoice->remaining_amount;

        return view('admin.projects.invoices.payments.create', compact('project', 'invoice', 'remainingAmount'));
    }

    /**
     * Store a newly created payment in storage.
     */
    public function store(Request $request, Invoice $invoice)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('invoices.update')) {
            abort(403, 'You do not have permission to record payments.');
        }

        $validated = $request->validate([
            'amount' => 'required|numeric|min:0.01',
            'payment_date' => 'required|date',
            'payment_method' => 'required|in:bank_transfer,upi,credit_card,debit_card,cash,cheque,other',
            'transaction_id' => 'nullable|string|max:255',
            'payment_receipt' => 'nullable|file|max:5120', // 5MB max
            'notes' => 'nullable|string',
        ]);

        // Check if payment amount exceeds remaining amount
        $remainingAmount = $invoice->remaining_amount;
        if ($validated['amount'] > $remainingAmount) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['amount' => 'Payment amount cannot exceed remaining invoice amount.']);
        }

        // Handle receipt upload
        $receiptPath = null;
        if ($request->hasFile('payment_receipt')) {
            $receiptPath = $request->file('payment_receipt')->store('payment-receipts', 'public');
        }

        $payment = InvoicePayment::create([
            'invoice_id' => $invoice->id,
            'amount' => $validated['amount'],
            'payment_date' => $validated['payment_date'],
            'payment_method' => $validated['payment_method'],
            'transaction_id' => $validated['transaction_id'] ?? null,
            'payment_receipt_path' => $receiptPath,
            'notes' => $validated['notes'] ?? null,
            'recorded_by' => $admin->id,
        ]);

        // Update invoice status based on payments
        $this->updateInvoiceStatus($invoice);

        // Log activity
        $this->logActivity($invoice->project, 'payment_recorded', "Payment of {$validated['amount']} recorded for invoice '{$invoice->invoice_number}'");

        $invoice->loadMissing('project.client', 'payments');
        event(new PaymentReceived($invoice, $payment));

        return redirect()->route('admin.invoices.show', $invoice)
            ->with('success', 'Payment recorded successfully.');
    }

    /**
     * Display the specified payment.
     */
    public function show(InvoicePayment $payment)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('invoices.list')) {
            abort(403, 'You do not have permission to view payments.');
        }

        $payment->load(['invoice.project', 'recordedBy']);
        $invoice = $payment->invoice;
        $project = $invoice->project;

        return view('admin.projects.invoices.payments.show', compact('project', 'invoice', 'payment'));
    }

    /**
     * Show the form for editing the specified payment.
     */
    public function edit(InvoicePayment $payment)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('invoices.update')) {
            abort(403, 'You do not have permission to edit payments.');
        }

        $payment->load(['invoice.project', 'recordedBy']);
        $invoice = $payment->invoice;
        $project = $invoice->project;

        return view('admin.projects.invoices.payments.edit', compact('project', 'invoice', 'payment'));
    }

    /**
     * Update the specified payment in storage.
     */
    public function update(Request $request, InvoicePayment $payment)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('invoices.update')) {
            abort(403, 'You do not have permission to update payments.');
        }

        $validated = $request->validate([
            'amount' => 'required|numeric|min:0.01',
            'payment_date' => 'required|date',
            'payment_method' => 'required|in:bank_transfer,upi,credit_card,debit_card,cash,cheque,other',
            'transaction_id' => 'nullable|string|max:255',
            'payment_receipt' => 'nullable|file|max:5120', // 5MB max
            'notes' => 'nullable|string',
        ]);

        $payment->load('invoice');
        $invoice = $payment->invoice;

        // Check if payment amount exceeds remaining amount (excluding this payment)
        $remainingAmount = $invoice->remaining_amount + $payment->amount;
        if ($validated['amount'] > $remainingAmount) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['amount' => 'Payment amount cannot exceed remaining invoice amount.']);
        }

        // Handle receipt upload
        if ($request->hasFile('payment_receipt')) {
            // Delete old receipt if exists
            if ($payment->payment_receipt_path && Storage::disk('public')->exists($payment->payment_receipt_path)) {
                Storage::disk('public')->delete($payment->payment_receipt_path);
            }
            $receiptPath = $request->file('payment_receipt')->store('payment-receipts', 'public');
            $validated['payment_receipt_path'] = $receiptPath;
        }

        $payment->update($validated);

        // Update invoice status based on payments
        $this->updateInvoiceStatus($invoice);

        // Log activity
        $this->logActivity($invoice->project, 'payment_updated', "Payment updated for invoice '{$invoice->invoice_number}'");

        return redirect()->route('admin.invoices.show', $invoice)
            ->with('success', 'Payment updated successfully.');
    }

    /**
     * Remove the specified payment from storage.
     */
    public function destroy(InvoicePayment $payment)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('invoices.delete')) {
            abort(403, 'You do not have permission to delete payments.');
        }

        $payment->load('invoice');
        $invoice = $payment->invoice;
        $project = $invoice->project;

        // Delete receipt file if exists
        if ($payment->payment_receipt_path && Storage::disk('public')->exists($payment->payment_receipt_path)) {
            Storage::disk('public')->delete($payment->payment_receipt_path);
        }

        $payment->delete();

        // Update invoice status based on payments
        $this->updateInvoiceStatus($invoice);

        // Log activity
        $this->logActivity($project, 'payment_deleted', "Payment deleted for invoice '{$invoice->invoice_number}'");

        return redirect()->route('admin.invoices.show', $invoice)
            ->with('success', 'Payment deleted successfully.');
    }

    /**
     * Download payment receipt.
     */
    public function downloadReceipt(InvoicePayment $payment)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('invoices.list')) {
            abort(403, 'You do not have permission to download receipts.');
        }

        $receiptPath = $payment->payment_receipt_path;

        if (!$receiptPath || !Storage::disk('public')->exists($receiptPath)) {
            abort(404, 'Receipt not found.');
        }

        return Storage::disk('public')->download($receiptPath, 'payment-receipt-' . $payment->id . '.' . pathinfo($receiptPath, PATHINFO_EXTENSION));
    }

    /**
     * Update invoice status based on payments.
     */
    private function updateInvoiceStatus(Invoice $invoice)
    {
        $totalPaid = $invoice->total_paid;
        $totalAmount = $invoice->total_amount;

        if ($totalPaid >= $totalAmount) {
            $invoice->update([
                'status' => 'paid',
                'paid_date' => $invoice->paid_date ?? now(),
            ]);
        } elseif ($totalPaid > 0) {
            $invoice->update([
                'status' => 'partial',
                'paid_date' => null,
            ]);
        } else {
            // Check if overdue
            if ($invoice->due_date < now() && $invoice->status !== 'cancelled') {
                $invoice->update(['status' => 'overdue']);
            } elseif ($invoice->status === 'overdue') {
                $invoice->update(['status' => 'sent']);
            }
        }
    }

    /**
     * Log activity for the project.
     */
    private function logActivity($project, string $action, string $description)
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
