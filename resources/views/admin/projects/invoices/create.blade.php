@extends('admin.layouts.tailadmin')

@section('title', 'Create Invoice')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.projects.show', $project) }}" class="text-[#088395] hover:text-[#37B7C3] transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                </a>
                <h2 class="text-2xl font-bold text-[#11224E]">Create Invoice</h2>
            </div>
            <p class="text-sm text-[#088395]/70 mt-1">Create a new invoice for {{ $project->title }}</p>
        </div>
    </div>

    <!-- Form -->
    <form action="{{ route('admin.projects.invoices.store', $project) }}" method="POST" class="space-y-6">
        @csrf

        <div class="rounded-2xl border border-[#088395]/10 bg-white p-6 shadow-sm">
            <h3 class="mb-4 text-lg font-semibold text-[#11224E]">Invoice Information</h3>
            <div class="space-y-4">
                <!-- Amount and Tax -->
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <div>
                        <label for="amount" class="mb-1 block text-sm font-medium text-[#11224E]">Amount (₹) <span class="text-red-500">*</span></label>
                        <input
                            type="number"
                            id="amount"
                            name="amount"
                            value="{{ old('amount') }}"
                            step="0.01"
                            min="0"
                            required
                            class="w-full rounded-lg border border-[#088395]/15 px-3 py-2 text-sm text-[#11224E] focus:border-[#088395] focus:outline-none focus:ring-2 focus:ring-[#088395]/20"
                            placeholder="0.00"
                        />
                        @error('amount')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="tax_amount" class="mb-1 block text-sm font-medium text-[#11224E]">Tax Amount (₹)</label>
                        <input
                            type="number"
                            id="tax_amount"
                            name="tax_amount"
                            value="{{ old('tax_amount', 0) }}"
                            step="0.01"
                            min="0"
                            class="w-full rounded-lg border border-[#088395]/15 px-3 py-2 text-sm text-[#11224E] focus:border-[#088395] focus:outline-none focus:ring-2 focus:ring-[#088395]/20"
                            placeholder="0.00"
                        />
                        @error('tax_amount')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Status -->
                <div>
                    <label for="status" class="mb-1 block text-sm font-medium text-[#11224E]">Status <span class="text-red-500">*</span></label>
                    <select
                        id="status"
                        name="status"
                        required
                        class="w-full rounded-lg border border-[#088395]/15 px-3 py-2 text-sm text-[#11224E] focus:border-[#088395] focus:outline-none focus:ring-2 focus:ring-[#088395]/20"
                    >
                        <option value="draft" {{ old('status', 'draft') === 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="sent" {{ old('status') === 'sent' ? 'selected' : '' }}>Sent</option>
                        <option value="paid" {{ old('status') === 'paid' ? 'selected' : '' }}>Paid</option>
                        <option value="partial" {{ old('status') === 'partial' ? 'selected' : '' }}>Partial</option>
                        <option value="overdue" {{ old('status') === 'overdue' ? 'selected' : '' }}>Overdue</option>
                        <option value="cancelled" {{ old('status') === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                    @error('status')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Dates -->
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <div>
                        <label for="invoice_date" class="mb-1 block text-sm font-medium text-[#11224E]">Invoice Date <span class="text-red-500">*</span></label>
                        <input
                            type="date"
                            id="invoice_date"
                            name="invoice_date"
                            value="{{ old('invoice_date', date('Y-m-d')) }}"
                            required
                            class="w-full rounded-lg border border-[#088395]/15 px-3 py-2 text-sm text-[#11224E] focus:border-[#088395] focus:outline-none focus:ring-2 focus:ring-[#088395]/20"
                        />
                        @error('invoice_date')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="due_date" class="mb-1 block text-sm font-medium text-[#11224E]">Due Date <span class="text-red-500">*</span></label>
                        <input
                            type="date"
                            id="due_date"
                            name="due_date"
                            value="{{ old('due_date') }}"
                            required
                            class="w-full rounded-lg border border-[#088395]/15 px-3 py-2 text-sm text-[#11224E] focus:border-[#088395] focus:outline-none focus:ring-2 focus:ring-[#088395]/20"
                        />
                        @error('due_date')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="mb-1 block text-sm font-medium text-[#11224E]">Description</label>
                    <textarea
                        id="description"
                        name="description"
                        rows="3"
                        class="w-full rounded-lg border border-[#088395]/15 px-3 py-2 text-sm text-[#11224E] focus:border-[#088395] focus:outline-none focus:ring-2 focus:ring-[#088395]/20"
                        placeholder="Invoice description or line items..."
                    >{{ old('description') }}</textarea>
                    @error('description')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Notes -->
                <div>
                    <label for="notes" class="mb-1 block text-sm font-medium text-[#11224E]">Internal Notes</label>
                    <textarea
                        id="notes"
                        name="notes"
                        rows="2"
                        class="w-full rounded-lg border border-[#088395]/15 px-3 py-2 text-sm text-[#11224E] focus:border-[#088395] focus:outline-none focus:ring-2 focus:ring-[#088395]/20"
                        placeholder="Internal notes (not visible to client)..."
                    >{{ old('notes') }}</textarea>
                    @error('notes')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Payment Information -->
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <div>
                        <label for="payment_link" class="mb-1 block text-sm font-medium text-[#11224E]">Payment Link</label>
                        <input
                            type="url"
                            id="payment_link"
                            name="payment_link"
                            value="{{ old('payment_link') }}"
                            class="w-full rounded-lg border border-[#088395]/15 px-3 py-2 text-sm text-[#11224E] focus:border-[#088395] focus:outline-none focus:ring-2 focus:ring-[#088395]/20"
                            placeholder="https://..."
                        />
                        @error('payment_link')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="payment_reference" class="mb-1 block text-sm font-medium text-[#11224E]">Payment Reference</label>
                        <input
                            type="text"
                            id="payment_reference"
                            name="payment_reference"
                            value="{{ old('payment_reference') }}"
                            class="w-full rounded-lg border border-[#088395]/15 px-3 py-2 text-sm text-[#11224E] focus:border-[#088395] focus:outline-none focus:ring-2 focus:ring-[#088395]/20"
                            placeholder="Reference number..."
                        />
                        @error('payment_reference')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Actions -->
        <div class="flex items-center justify-end gap-3">
            <a href="{{ route('admin.projects.show', $project) }}" class="rounded-lg border border-[#088395]/20 px-4 py-2 text-sm font-medium text-[#088395] transition-colors hover:bg-[#088395]/5">
                Cancel
            </a>
            <button type="submit" class="rounded-lg bg-[#088395] px-6 py-2 text-sm font-medium text-white transition-colors hover:bg-[#37B7C3]">
                Create Invoice
            </button>
        </div>
    </form>
</div>
@endsection

