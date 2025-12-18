@extends('admin.layouts.tailadmin')

@section('title', 'Edit Document')

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
                <h2 class="text-2xl font-bold text-heading">Edit Document</h2>
            </div>
            <p class="text-sm text-brand-primary/70 mt-1">Update document for {{ $project->title }}</p>
        </div>
    </div>

    <!-- Form -->
    <form action="{{ route('admin.documents.update', $document) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="rounded-2xl border border-border-default bg-surface-1 p-6 shadow-sm">
            <h3 class="mb-4 text-lg font-semibold text-heading">Document Information</h3>
            <div class="space-y-4">
                <!-- Name -->
                <div>
                    <label for="name" class="mb-1 block text-sm font-medium text-heading">Document Name <span class="text-red-500">*</span></label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name', $document->name) }}"
                        required
                        class="w-full rounded-lg border border-[var(--brand-primary)]/15 px-3 py-2 text-sm text-heading focus:border-[var(--brand-primary)] focus:outline-none focus:ring-2 focus:ring-[var(--brand-primary)]/20"
                    />
                    @error('name')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Category -->
                <div>
                    <label for="category" class="mb-1 block text-sm font-medium text-heading">Category <span class="text-red-500">*</span></label>
                    <select
                        id="category"
                        name="category"
                        required
                        class="w-full rounded-lg border border-[var(--brand-primary)]/15 px-3 py-2 text-sm text-heading focus:border-[var(--brand-primary)] focus:outline-none focus:ring-2 focus:ring-[var(--brand-primary)]/20"
                    >
                        <option value="other" {{ old('category', $document->category) === 'other' ? 'selected' : '' }}>Other</option>
                        <option value="nda" {{ old('category', $document->category) === 'nda' ? 'selected' : '' }}>NDA</option>
                        <option value="proposal" {{ old('category', $document->category) === 'proposal' ? 'selected' : '' }}>Proposal</option>
                        <option value="quote" {{ old('category', $document->category) === 'quote' ? 'selected' : '' }}>Quote</option>
                        <option value="invoice" {{ old('category', $document->category) === 'invoice' ? 'selected' : '' }}>Invoice</option>
                        <option value="contract" {{ old('category', $document->category) === 'contract' ? 'selected' : '' }}>Contract</option>
                        <option value="final_delivery" {{ old('category', $document->category) === 'final_delivery' ? 'selected' : '' }}>Final Delivery</option>
                        <option value="offboarding" {{ old('category', $document->category) === 'offboarding' ? 'selected' : '' }}>Offboarding</option>
                    </select>
                    @error('category')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="mb-1 block text-sm font-medium text-heading">Description</label>
                    <textarea
                        id="description"
                        name="description"
                        rows="3"
                        class="w-full rounded-lg border border-[var(--brand-primary)]/15 px-3 py-2 text-sm text-heading focus:border-[var(--brand-primary)] focus:outline-none focus:ring-2 focus:ring-[var(--brand-primary)]/20"
                    >{{ old('description', $document->description) }}</textarea>
                    @error('description')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Current File Info -->
                <div class="rounded-lg border border-border-default bg-brand-primary/5 p-4">
                    <p class="text-sm font-medium text-heading mb-2">Current File</p>
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-brand-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                        </svg>
                        <span class="text-sm text-heading">{{ $document->file_name }}</span>
                        <span class="text-xs text-brand-primary/70">({{ $document->file_size }})</span>
                        <a href="{{ route('admin.documents.download', $document) }}" class="ml-auto text-xs text-brand-primary hover:text-[var(--brand-soft)]">
                            Download
                        </a>
                    </div>
                    <p class="mt-2 text-xs text-brand-primary/70">Note: You cannot change the file. Delete and re-upload to replace the file.</p>
                </div>
            </div>
        </div>

        <!-- Form Actions -->
        <div class="flex items-center justify-end gap-3">
            <a href="{{ route('admin.projects.show', $project) }}" class="rounded-lg border border-border-default px-4 py-2 text-sm font-medium text-brand-primary transition-colors hover:bg-brand-primary/5">
                Cancel
            </a>
            <button type="submit" class="rounded-lg bg-brand-primary px-6 py-2 text-sm font-medium text-white transition-colors hover:bg-[var(--brand-soft)]">
                Update Document
            </button>
        </div>
    </form>
</div>
@endsection

