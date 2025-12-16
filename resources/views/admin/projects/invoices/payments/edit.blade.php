@extends('admin.layouts.tailadmin')

@section('title', 'Edit Payment')

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
                <h2 class="text-2xl font-bold text-[#11224E]">Edit Payment</h2>
            </div>
            <p class="text-sm text-[#088395]/70 mt-1">Update payment for invoice {{ $invoice->invoice_number }}</p>
        </div>
    </div>

    <!-- Form -->
    <form action="{{ route('admin.invoices.payments.update', [$invoice, $payment]) }}" method="POST" class="space-y-6" enctype="multipart/form-data">
        @csrf
        @method('PUT')

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
                        value="{{ old('amount', $payment->amount) }}"
                        step="0.01"
                        min="0.01"
                        required
                        class="w-full rounded-lg border border-[#088395]/15 px-3 py-2 text-sm text-[#11224E] focus:border-[#088395] focus:outline-none focus:ring-2 focus:ring-[#088395]/20"
                    />
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
                            value="{{ old('payment_date', $payment->payment_date->format('Y-m-d')) }}"
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
                            <option value="bank_transfer" {{ old('payment_method', $payment->payment_method) === 'bank_transfer' ? 'selected' : '' }}>Bank Transfer</option>
                            <option value="upi" {{ old('payment_method', $payment->payment_method) === 'upi' ? 'selected' : '' }}>UPI</option>
                            <option value="credit_card" {{ old('payment_method', $payment->payment_method) === 'credit_card' ? 'selected' : '' }}>Credit Card</option>
                            <option value="debit_card" {{ old('payment_method', $payment->payment_method) === 'debit_card' ? 'selected' : '' }}>Debit Card</option>
                            <option value="cash" {{ old('payment_method', $payment->payment_method) === 'cash' ? 'selected' : '' }}>Cash</option>
                            <option value="cheque" {{ old('payment_method', $payment->payment_method) === 'cheque' ? 'selected' : '' }}>Cheque</option>
                            <option value="other" {{ old('payment_method', $payment->payment_method) === 'other' ? 'selected' : '' }}>Other</option>
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
                        value="{{ old('transaction_id', $payment->transaction_id) }}"
                        class="w-full rounded-lg border border-[#088395]/15 px-3 py-2 text-sm text-[#11224E] focus:border-[#088395] focus:outline-none focus:ring-2 focus:ring-[#088395]/20"
                    />
                    @error('transaction_id')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Payment Receipt -->
                <div>
                    <label for="payment_receipt" class="mb-1 block text-sm font-medium text-[#11224E]">Payment Receipt</label>
                    @if($payment->payment_receipt_path)
                    <div class="mb-2 rounded-lg border border-[#088395]/10 bg-[#088395]/5 p-3">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-[#088395]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                                </svg>
                                <span class="text-sm text-[#11224E]">Current receipt uploaded</span>
                            </div>
                            <a href="{{ route('admin.invoice-payments.download-receipt', $payment) }}" class="text-xs text-[#088395] hover:text-[#37B7C3]">
                                Download
                            </a>
                        </div>
                    </div>
                    @endif
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
                    >{{ old('notes', $payment->notes) }}</textarea>
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
                Update Payment
            </button>
        </div>
    </form>
</div>
@endsection

