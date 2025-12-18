@extends('admin.layouts.tailadmin')

@section('title', 'Invoice Details')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.projects.show', $project) }}" class="text-brand-primary hover:text-[var(--brand-soft)] transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                </a>
                <h2 class="text-2xl font-bold text-heading">Invoice {{ $invoice->invoice_number }}</h2>
            </div>
            <p class="text-sm text-brand-primary/70 mt-1">{{ $project->title }}</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.invoices.download-pdf', $invoice) }}" class="inline-flex items-center gap-2 rounded-lg border border-border-default px-4 py-2 text-sm font-medium text-brand-primary transition-colors hover:bg-brand-primary/5">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                Download PDF
            </a>
            <a href="{{ route('admin.invoices.edit', $invoice) }}" class="rounded-lg border border-border-default px-4 py-2 text-sm font-medium text-brand-primary transition-colors hover:bg-brand-primary/5">
                Edit
            </a>
            <a href="{{ route('admin.invoices.payments.create', $invoice) }}" class="rounded-lg bg-brand-primary px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-[var(--brand-soft)]">
                Record Payment
            </a>
        </div>
    </div>

    <!-- Invoice Details -->
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
        <!-- Main Invoice Info -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Invoice Information -->
            <div class="rounded-2xl border border-border-default bg-surface-1 p-6 shadow-sm">
                <h3 class="mb-4 text-lg font-semibold text-heading">Invoice Details</h3>
                <div class="space-y-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-sm text-brand-primary/70">Invoice Number</p>
                            <p class="mt-1 font-medium text-heading">{{ $invoice->invoice_number }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-brand-primary/70">Status</p>
                            @php
                                $statusColors = [
                                    'draft' => 'bg-surface-2 text-text-secondary',
                                    'sent' => 'bg-blue-50 text-brand-primary',
                                    'paid' => 'bg-green-50 text-green-600',
                                    'partial' => 'bg-yellow-50 text-yellow-600',
                                    'overdue' => 'bg-red-50 text-red-600',
                                    'cancelled' => 'bg-surface-2 text-text-secondary',
                                ];
                                $statusColor = $statusColors[$invoice->status] ?? 'bg-surface-2 text-text-secondary';
                            @endphp
                            <span class="mt-1 inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium {{ $statusColor }}">
                                {{ ucfirst($invoice->status) }}
                            </span>
                        </div>
                        <div>
                            <p class="text-sm text-brand-primary/70">Invoice Date</p>
                            <p class="mt-1 font-medium text-heading">{{ $invoice->invoice_date->format('M d, Y') }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-brand-primary/70">Due Date</p>
                            <p class="mt-1 font-medium text-heading">{{ $invoice->due_date->format('M d, Y') }}</p>
                        </div>
                    </div>

                    @if($invoice->description)
                    <div>
                        <p class="text-sm text-brand-primary/70">Description</p>
                        <p class="mt-1 text-sm text-heading whitespace-pre-wrap">{{ $invoice->description }}</p>
                    </div>
                    @endif

                    @if($invoice->notes)
                    <div>
                        <p class="text-sm text-brand-primary/70">Internal Notes</p>
                        <p class="mt-1 text-sm text-heading whitespace-pre-wrap">{{ $invoice->notes }}</p>
                    </div>
                    @endif

                    @if($invoice->payment_link)
                    <div>
                        <p class="text-sm text-brand-primary/70">Payment Link</p>
                        <a href="{{ $invoice->payment_link }}" target="_blank" class="mt-1 text-sm text-brand-primary hover:text-[var(--brand-soft)]">
                            {{ $invoice->payment_link }}
                        </a>
                    </div>
                    @endif

                    @if($invoice->payment_reference)
                    <div>
                        <p class="text-sm text-brand-primary/70">Payment Reference</p>
                        <p class="mt-1 font-medium text-heading">{{ $invoice->payment_reference }}</p>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Payments -->
            <div class="rounded-2xl border border-border-default bg-surface-1 p-6 shadow-sm">
                <div class="mb-4 flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-heading">Payments</h3>
                    <a href="{{ route('admin.invoices.payments.create', $invoice) }}" class="text-sm text-brand-primary hover:text-[var(--brand-soft)]">
                        + Add Payment
                    </a>
                </div>
                @if($invoice->payments->count() > 0)
                <div class="space-y-3">
                    @foreach($invoice->payments as $payment)
                    <div class="rounded-lg border border-border-default bg-surface-1 p-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="font-medium text-heading">₹{{ number_format($payment->amount, 2) }}</p>
                                <div class="mt-1 flex items-center gap-4 text-xs text-brand-primary/70">
                                    <span>{{ $payment->payment_date->format('M d, Y') }}</span>
                                    <span>{{ ucfirst(str_replace('_', ' ', $payment->payment_method)) }}</span>
                                    @if($payment->transaction_id)
                                    <span>Ref: {{ $payment->transaction_id }}</span>
                                    @endif
                                </div>
                                @if($payment->notes)
                                <p class="mt-1 text-xs text-heading">{{ $payment->notes }}</p>
                                @endif
                            </div>
                            <div class="flex items-center gap-2">
                                @if($payment->payment_receipt_path)
                                <a href="{{ route('admin.invoice-payments.download-receipt', $payment) }}" class="text-brand-primary hover:text-[var(--brand-soft)]" title="Download Receipt">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                    </svg>
                                </a>
                                @endif
                                <a href="{{ route('admin.invoices.payments.edit', [$invoice, $payment]) }}" class="text-brand-primary hover:text-[var(--brand-soft)]" title="Edit">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <p class="text-sm text-brand-primary/70">No payments recorded yet.</p>
                @endif
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Amount Summary -->
            <div class="rounded-2xl border border-border-default bg-surface-1 p-6 shadow-sm">
                <h3 class="mb-4 text-lg font-semibold text-heading">Amount Summary</h3>
                <div class="space-y-3">
                    <div class="flex justify-between">
                        <span class="text-sm text-brand-primary/70">Subtotal</span>
                        <span class="font-medium text-heading">₹{{ number_format($invoice->amount, 2) }}</span>
                    </div>
                    @if($invoice->tax_amount > 0)
                    <div class="flex justify-between">
                        <span class="text-sm text-brand-primary/70">Tax</span>
                        <span class="font-medium text-heading">₹{{ number_format($invoice->tax_amount, 2) }}</span>
                    </div>
                    @endif
                    <div class="border-t border-border-default pt-3">
                        <div class="flex justify-between">
                            <span class="font-medium text-heading">Total</span>
                            <span class="text-lg font-bold text-heading">₹{{ number_format($invoice->total_amount, 2) }}</span>
                        </div>
                    </div>
                    @if($invoice->total_paid > 0)
                    <div class="border-t border-border-default pt-3">
                        <div class="flex justify-between">
                            <span class="text-sm text-brand-primary/70">Paid</span>
                            <span class="font-medium text-green-600">₹{{ number_format($invoice->total_paid, 2) }}</span>
                        </div>
                        <div class="mt-2 flex justify-between">
                            <span class="text-sm text-brand-primary/70">Remaining</span>
                            <span class="font-medium text-heading">₹{{ number_format($invoice->remaining_amount, 2) }}</span>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Client Information -->
            <div class="rounded-2xl border border-border-default bg-surface-1 p-6 shadow-sm">
                <h3 class="mb-4 text-lg font-semibold text-heading">Client</h3>
                <div class="space-y-2 text-sm">
                    <p class="font-medium text-heading">{{ $invoice->project->client->name }}</p>
                    @if($invoice->project->client->email)
                    <p class="text-brand-primary/70">{{ $invoice->project->client->email }}</p>
                    @endif
                    @if($invoice->project->client->phone)
                    <p class="text-brand-primary/70">{{ $invoice->project->client->phone }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

