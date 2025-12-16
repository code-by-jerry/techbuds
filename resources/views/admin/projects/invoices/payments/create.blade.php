@extends('admin.layouts.tailadmin')

@section('title', 'Record Payment')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.invoices.show', $invoice) }}" class="text-[#088395] hover:text-[#37B7C3] transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                </a>
                <h2 class="text-2xl font-bold text-[#11224E]">Record Payment</h2>
            </div>
            <p class="text-sm text-[#088395]/70 mt-1">Record payment for invoice {{ $invoice->invoice_number }}</p>
        </div>
    </div>

    <!-- Invoice Summary -->
    <div class="rounded-2xl border border-[#088395]/10 bg-white p-6 shadow-sm">
        <h3 class="mb-4 text-lg font-semibold text-[#11224E]">Invoice Summary</h3>
        <div class="grid grid-cols-2 gap-4 text-sm">
            <div>
                <p class="text-[#088395]/70">Total Amount</p>
                <p class="mt-1 text-lg font-bold text-[#11224E]">₹{{ number_format($invoice->total_amount, 2) }}</p>
            </div>
            <div>
                <p class="text-[#088395]/70">Remaining Amount</p>
                <p class="mt-1 text-lg font-bold text-[#11224E]">₹{{ number_format($remainingAmount, 2) }}</p>
            </div>
        </div>
    </div>

    <!-- Form -->
    <form action="{{ route('admin.invoices.payments.store', $invoice) }}" method="POST" class="space-y-6" enctype="multipart/form-data">
        @csrf

        <div class="rounded-2xl border border-[#088395]/10 bg-white p-6 shadow-sm">
            <h3 class="mb-4 text-lg font-semibold text-[#11224E]">Payment Information</h3>
            <div class="space-y-4">
                <!-- Amount -->
                <div>
                    <label for="amount" class="mb-1 block text-sm font-medium text-[#11224E]">Amount (₹) <span class="text-red-500">*</span></label>
                    <input
                        type="number"
                        id="amount"
                        name="amount"
                        value="{{ old('amount') }}"
                        step="0.01"
                        min="0.01"
                        max="{{ $remainingAmount }}"
                        required
                        class="w-full rounded-lg border border-[#088395]/15 px-3 py-2 text-sm text-[#11224E] focus:border-[#088395] focus:outline-none focus:ring-2 focus:ring-[#088395]/20"
                        placeholder="0.00"
                    />
                    <p class="mt-1 text-xs text-[#088395]/70">Maximum: ₹{{ number_format($remainingAmount, 2) }}</p>
                    @error('amount')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Payment Date and Method -->
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <div>
                        <label for="payment_date" class="mb-1 block text-sm font-medium text-[#11224E]">Payment Date <span class="text-red-500">*</span></label>
                        <input
                            type="date"
                            id="payment_date"
                            name="payment_date"
                            value="{{ old('payment_date', date('Y-m-d')) }}"
                            required
                            class="w-full rounded-lg border border-[#088395]/15 px-3 py-2 text-sm text-[#11224E] focus:border-[#088395] focus:outline-none focus:ring-2 focus:ring-[#088395]/20"
                        />
                        @error('payment_date')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="payment_method" class="mb-1 block text-sm font-medium text-[#11224E]">Payment Method <span class="text-red-500">*</span></label>
                        <select
                            id="payment_method"
                            name="payment_method"
                            required
                            class="w-full rounded-lg border border-[#088395]/15 px-3 py-2 text-sm text-[#11224E] focus:border-[#088395] focus:outline-none focus:ring-2 focus:ring-[#088395]/20"
                        >
                            <option value="bank_transfer" {{ old('payment_method', 'bank_transfer') === 'bank_transfer' ? 'selected' : '' }}>Bank Transfer</option>
                            <option value="upi" {{ old('payment_method') === 'upi' ? 'selected' : '' }}>UPI</option>
                            <option value="credit_card" {{ old('payment_method') === 'credit_card' ? 'selected' : '' }}>Credit Card</option>
                            <option value="debit_card" {{ old('payment_method') === 'debit_card' ? 'selected' : '' }}>Debit Card</option>
                            <option value="cash" {{ old('payment_method') === 'cash' ? 'selected' : '' }}>Cash</option>
                            <option value="cheque" {{ old('payment_method') === 'cheque' ? 'selected' : '' }}>Cheque</option>
                            <option value="other" {{ old('payment_method') === 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                        @error('payment_method')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Transaction ID -->
                <div>
                    <label for="transaction_id" class="mb-1 block text-sm font-medium text-[#11224E]">Transaction ID / Reference</label>
                    <input
                        type="text"
                        id="transaction_id"
                        name="transaction_id"
                        value="{{ old('transaction_id') }}"
                        class="w-full rounded-lg border border-[#088395]/15 px-3 py-2 text-sm text-[#11224E] focus:border-[#088395] focus:outline-none focus:ring-2 focus:ring-[#088395]/20"
                        placeholder="Transaction reference number..."
                    />
                    @error('transaction_id')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Payment Receipt -->
                <div>
                    <label for="payment_receipt" class="mb-1 block text-sm font-medium text-[#11224E]">Payment Receipt</label>
                    <input
                        type="file"
                        id="payment_receipt"
                        name="payment_receipt"
                        accept=".pdf,.jpg,.jpeg,.png"
                        class="w-full rounded-lg border border-[#088395]/15 px-3 py-2 text-sm text-[#11224E] focus:border-[#088395] focus:outline-none focus:ring-2 focus:ring-[#088395]/20"
                    />
                    <p class="mt-1 text-xs text-[#088395]/70">Maximum file size: 5MB. Supported formats: PDF, JPG, JPEG, PNG</p>
                    @error('payment_receipt')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Notes -->
                <div>
                    <label for="notes" class="mb-1 block text-sm font-medium text-[#11224E]">Notes</label>
                    <textarea
                        id="notes"
                        name="notes"
                        rows="3"
                        class="w-full rounded-lg border border-[#088395]/15 px-3 py-2 text-sm text-[#11224E] focus:border-[#088395] focus:outline-none focus:ring-2 focus:ring-[#088395]/20"
                        placeholder="Additional notes about this payment..."
                    >{{ old('notes') }}</textarea>
                    @error('notes')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Form Actions -->
        <div class="flex items-center justify-end gap-3">
            <a href="{{ route('admin.invoices.show', $invoice) }}" class="rounded-lg border border-[#088395]/20 px-4 py-2 text-sm font-medium text-[#088395] transition-colors hover:bg-[#088395]/5">
                Cancel
            </a>
            <button type="submit" class="rounded-lg bg-[#088395] px-6 py-2 text-sm font-medium text-white transition-colors hover:bg-[#37B7C3]">
                Record Payment
            </button>
        </div>
    </form>
</div>
@endsection

