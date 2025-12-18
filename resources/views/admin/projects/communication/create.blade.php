@extends('admin.layouts.tailadmin')

@section('title', 'Add Project Update')

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
                <h2 class="text-2xl font-bold text-heading">Add Project Update</h2>
            </div>
            <p class="text-sm text-brand-primary/70 mt-1">Add a communication update for {{ $project->title }}</p>
        </div>
    </div>

    <!-- Form -->
    <form action="{{ route('admin.projects.project-updates.store', $project) }}" method="POST" class="space-y-6" enctype="multipart/form-data">
        @csrf

        <div class="rounded-2xl border border-border-default bg-surface-1 p-6 shadow-sm">
            <h3 class="mb-4 text-lg font-semibold text-heading">Update Information</h3>
            <div class="space-y-4">
                <!-- Type -->
                <div>
                    <label for="type" class="mb-1 block text-sm font-medium text-heading">Type <span class="text-red-500">*</span></label>
                    <select
                        id="type"
                        name="type"
                        required
                        class="w-full rounded-lg border border-[var(--brand-primary)]/15 px-3 py-2 text-sm text-heading focus:border-[var(--brand-primary)] focus:outline-none focus:ring-2 focus:ring-[var(--brand-primary)]/20"
                    >
                        <option value="internal_note" {{ old('type', 'internal_note') === 'internal_note' ? 'selected' : '' }}>Internal Note</option>
                        <option value="client_message" {{ old('type') === 'client_message' ? 'selected' : '' }}>Client Message</option>
                        <option value="change_request" {{ old('type') === 'change_request' ? 'selected' : '' }}>Change Request</option>
                        <option value="meeting_note" {{ old('type') === 'meeting_note' ? 'selected' : '' }}>Meeting Note</option>
                        <option value="decision" {{ old('type') === 'decision' ? 'selected' : '' }}>Decision</option>
                    </select>
                    @error('type')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Message -->
                <div>
                    <label for="message" class="mb-1 block text-sm font-medium text-heading">Message <span class="text-red-500">*</span></label>
                    <textarea
                        id="message"
                        name="message"
                        rows="6"
                        required
                        class="w-full rounded-lg border border-[var(--brand-primary)]/15 px-3 py-2 text-sm text-heading focus:border-[var(--brand-primary)] focus:outline-none focus:ring-2 focus:ring-[var(--brand-primary)]/20"
                        placeholder="Enter your message or update..."
                    >{{ old('message') }}</textarea>
                    @error('message')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Is Important -->
                <div>
                    <label class="flex items-center gap-3 cursor-pointer">
                        <input
                            type="hidden"
                            name="is_important"
                            value="0"
                        />
                        <input
                            type="checkbox"
                            name="is_important"
                            value="1"
                            {{ old('is_important') ? 'checked' : '' }}
                            class="h-4 w-4 rounded border-border-default text-brand-primary focus:ring-[var(--brand-primary)]/20"
                        />
                        <span class="text-sm font-medium text-heading">Mark as Important</span>
                    </label>
                </div>

                <!-- Attachments -->
                <div>
                    <label for="attachments" class="mb-1 block text-sm font-medium text-heading">Attachments</label>
                    <input
                        type="file"
                        id="attachments"
                        name="attachments[]"
                        multiple
                        accept=".pdf,.doc,.docx,.xls,.xlsx,.jpg,.jpeg,.png,.gif"
                        class="w-full rounded-lg border border-[var(--brand-primary)]/15 px-3 py-2 text-sm text-heading focus:border-[var(--brand-primary)] focus:outline-none focus:ring-2 focus:ring-[var(--brand-primary)]/20"
                    />
                    <p class="mt-1 text-xs text-brand-primary/70">You can select multiple files. Maximum 10MB per file.</p>
                    @error('attachments.*')
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
                Add Update
            </button>
        </div>
    </form>
</div>
@endsection

