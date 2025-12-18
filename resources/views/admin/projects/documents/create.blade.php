@extends('admin.layouts.tailadmin')

@section('title', 'Upload Document')

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
                <h2 class="text-2xl font-bold text-heading">Upload Document</h2>
            </div>
            <p class="text-sm text-brand-primary/70 mt-1">Upload a document for {{ $project->title }}</p>
        </div>
    </div>

    <!-- Form -->
    <form action="{{ route('admin.projects.documents.store', $project) }}" method="POST" class="space-y-6" enctype="multipart/form-data">
        @csrf

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
                        value="{{ old('name') }}"
                        required
                        class="w-full rounded-lg border border-[var(--brand-primary)]/15 px-3 py-2 text-sm text-heading focus:border-[var(--brand-primary)] focus:outline-none focus:ring-2 focus:ring-[var(--brand-primary)]/20"
                        placeholder="e.g., Project Proposal"
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
                        <option value="other" {{ old('category', 'other') === 'other' ? 'selected' : '' }}>Other</option>
                        <option value="nda" {{ old('category') === 'nda' ? 'selected' : '' }}>NDA</option>
                        <option value="proposal" {{ old('category') === 'proposal' ? 'selected' : '' }}>Proposal</option>
                        <option value="quote" {{ old('category') === 'quote' ? 'selected' : '' }}>Quote</option>
                        <option value="invoice" {{ old('category') === 'invoice' ? 'selected' : '' }}>Invoice</option>
                        <option value="contract" {{ old('category') === 'contract' ? 'selected' : '' }}>Contract</option>
                        <option value="final_delivery" {{ old('category') === 'final_delivery' ? 'selected' : '' }}>Final Delivery</option>
                        <option value="offboarding" {{ old('category') === 'offboarding' ? 'selected' : '' }}>Offboarding</option>
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
                        placeholder="Optional description of the document..."
                    >{{ old('description') }}</textarea>
                    @error('description')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- File Upload -->
                <div>
                    <label for="file" class="mb-1 block text-sm font-medium text-heading">File <span class="text-red-500">*</span></label>
                    <input
                        type="file"
                        id="file"
                        name="file"
                        required
                        accept=".pdf,.doc,.docx,.xls,.xlsx,.jpg,.jpeg,.png,.gif"
                        class="w-full rounded-lg border border-[var(--brand-primary)]/15 px-3 py-2 text-sm text-heading focus:border-[var(--brand-primary)] focus:outline-none focus:ring-2 focus:ring-[var(--brand-primary)]/20"
                    />
                    <p class="mt-1 text-xs text-brand-primary/70">Maximum file size: 10MB. Supported formats: PDF, DOC, DOCX, XLS, XLSX, JPG, JPEG, PNG, GIF</p>
                    @error('file')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Form Actions -->
        <div class="flex items-center justify-end gap-3">
            <a href="{{ route('admin.projects.show', $project) }}" class="rounded-lg border border-border-default px-4 py-2 text-sm font-medium text-brand-primary transition-colors hover:bg-brand-primary/5">
                Cancel
            </a>
            <button type="submit" class="rounded-lg bg-brand-primary px-6 py-2 text-sm font-medium text-white transition-colors hover:bg-[var(--brand-soft)]">
                Upload Document
            </button>
        </div>
    </form>
</div>
@endsection

