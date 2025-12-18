<div class="space-y-4">
    <!-- Header with Add Button -->
    <div class="flex items-center justify-between">
        <h4 class="text-lg font-semibold text-heading">Invoices</h4>
        <a href="{{ route('admin.projects.invoices.create', $project) }}" class="inline-flex items-center gap-2 rounded-lg bg-brand-primary px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-brand-hover">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Create Invoice
        </a>
    </div>

    <!-- Invoices List -->
    @if($project->invoices->count() > 0)
    <div class="space-y-3">
        @foreach($project->invoices as $invoice)
        <div class="rounded-lg border border-border-default bg-surface-1 p-4 hover:bg-brand-primary/2 transition-colors">
            <div class="flex items-start justify-between">
                <div class="flex-1">
                    <div class="flex items-center gap-3">
                        <h5 class="font-medium text-heading">{{ $invoice->invoice_number }}</h5>
                        @php
                            $statusColors = [
                                'draft' => 'bg-surface-2 text-text-secondary',
                                'sent' => 'bg-brand-primary text-white',
                                'paid' => 'bg-green-500/10 text-success',
                                'partial' => 'bg-warning/10 text-warning',
                                'overdue' => 'bg-error/10 text-error',
                                'cancelled' => 'bg-surface-2 text-text-secondary',
                            ];
                            $statusColor = $statusColors[$invoice->status] ?? 'bg-surface-2 text-text-secondary';
                        @endphp
                        <span class="inline-flex items-center rounded-full px-2 py-0.5 text-xs font-medium {{ $statusColor }}">
                            {{ ucfirst($invoice->status) }}
                        </span>
                    </div>
                    <div class="mt-2 grid grid-cols-2 gap-4 text-sm">
                        <div>
                            <span class="text-text-secondary">Amount:</span>
                            <span class="ml-2 font-medium text-heading">₹{{ number_format($invoice->total_amount, 2) }}</span>
                        </div>
                        <div>
                            <span class="text-text-secondary">Due Date:</span>
                            <span class="ml-2 font-medium text-heading">{{ $invoice->due_date->format('M d, Y') }}</span>
                        </div>
                        @if($invoice->total_paid > 0)
                        <div>
                            <span class="text-text-secondary">Paid:</span>
                            <span class="ml-2 font-medium text-success">₹{{ number_format($invoice->total_paid, 2) }}</span>
                        </div>
                        <div>
                            <span class="text-text-secondary">Remaining:</span>
                            <span class="ml-2 font-medium text-heading">₹{{ number_format($invoice->remaining_amount, 2) }}</span>
                        </div>
                        @endif
                    </div>
                    <div class="mt-3 flex items-center gap-4 text-xs text-text-secondary">
                        <span>Created: {{ $invoice->created_at->format('M d, Y') }}</span>
                        @if($invoice->createdBy)
                        <span>By: {{ $invoice->createdBy->name }}</span>
                        @endif
                    </div>
                </div>
                <div class="flex items-center gap-2 ml-4">
                    <a href="{{ route('admin.invoices.download-pdf', $invoice) }}" class="text-brand-primary hover:text-brand-soft" title="Download PDF">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </a>
                    <a href="{{ route('admin.invoices.show', $invoice) }}" class="text-brand-primary hover:text-brand-soft" title="View">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </a>
                    <a href="{{ route('admin.invoices.edit', $invoice) }}" class="text-brand-primary hover:text-brand-soft" title="Edit">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </a>
                    <form action="{{ route('admin.invoices.destroy', $invoice) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this invoice?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-error hover:text-error/80" title="Delete">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div class="rounded-lg border border-border-default bg-surface-1 p-8 text-center">
        <svg class="mx-auto h-12 w-12 text-brand-primary/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
        </svg>
        <h3 class="mt-4 text-sm font-medium text-heading">No invoices yet</h3>
        <p class="mt-2 text-sm text-text-secondary">Start creating invoices for this project.</p>
        <div class="mt-6">
            <a href="{{ route('admin.projects.invoices.create', $project) }}" class="inline-flex items-center gap-2 rounded-lg bg-brand-primary px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-brand-hover">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Create Invoice
            </a>
        </div>
    </div>
    @endif
</div>

