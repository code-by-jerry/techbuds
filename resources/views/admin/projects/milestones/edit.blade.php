@extends('admin.layouts.tailadmin')

@section('title', 'Edit Milestone')

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
                <h2 class="text-2xl font-bold text-heading">Edit Milestone</h2>
            </div>
            <p class="text-sm text-brand-primary/70 mt-1">Update milestone for {{ $project->title }}</p>
        </div>
    </div>

    <!-- Form -->
    <form action="{{ route('admin.milestones.update', $milestone) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="rounded-2xl border border-border-default bg-surface-1 p-6 shadow-sm">
            <h3 class="mb-4 text-lg font-semibold text-heading">Milestone Information</h3>
            <div class="space-y-4">
                <!-- Title -->
                <div>
                    <label for="title" class="mb-1 block text-sm font-medium text-heading">Title <span class="text-red-500">*</span></label>
                    <input
                        type="text"
                        id="title"
                        name="title"
                        value="{{ old('title', $milestone->title) }}"
                        required
                        class="w-full rounded-lg border border-[var(--brand-primary)]/15 px-3 py-2 text-sm text-heading focus:border-[var(--brand-primary)] focus:outline-none focus:ring-2 focus:ring-[var(--brand-primary)]/20"
                    />
                    @error('title')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="mb-1 block text-sm font-medium text-heading">Description</label>
                    <textarea
                        id="description"
                        name="description"
                        rows="4"
                        class="w-full rounded-lg border border-[var(--brand-primary)]/15 px-3 py-2 text-sm text-heading focus:border-[var(--brand-primary)] focus:outline-none focus:ring-2 focus:ring-[var(--brand-primary)]/20"
                    >{{ old('description', $milestone->description) }}</textarea>
                    @error('description')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Due Date and Status -->
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <div>
                        <label for="due_date" class="mb-1 block text-sm font-medium text-heading">Due Date</label>
                        <input
                            type="date"
                            id="due_date"
                            name="due_date"
                            value="{{ old('due_date', $milestone->due_date?->format('Y-m-d')) }}"
                            class="w-full rounded-lg border border-[var(--brand-primary)]/15 px-3 py-2 text-sm text-heading focus:border-[var(--brand-primary)] focus:outline-none focus:ring-2 focus:ring-[var(--brand-primary)]/20"
                        />
                        @error('due_date')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="status" class="mb-1 block text-sm font-medium text-heading">Status <span class="text-red-500">*</span></label>
                        <select
                            id="status"
                            name="status"
                            required
                            class="w-full rounded-lg border border-[var(--brand-primary)]/15 px-3 py-2 text-sm text-heading focus:border-[var(--brand-primary)] focus:outline-none focus:ring-2 focus:ring-[var(--brand-primary)]/20"
                        >
                            <option value="pending" {{ old('status', $milestone->status) === 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="in_progress" {{ old('status', $milestone->status) === 'in_progress' ? 'selected' : '' }}>In Progress</option>
                            <option value="completed" {{ old('status', $milestone->status) === 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="overdue" {{ old('status', $milestone->status) === 'overdue' ? 'selected' : '' }}>Overdue</option>
                            <option value="cancelled" {{ old('status', $milestone->status) === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                        @error('status')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Progress and Order -->
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <div>
                        <label for="progress_percentage" class="mb-1 block text-sm font-medium text-heading">Progress (%)</label>
                        <input
                            type="number"
                            id="progress_percentage"
                            name="progress_percentage"
                            value="{{ old('progress_percentage', $milestone->progress_percentage) }}"
                            min="0"
                            max="100"
                            class="w-full rounded-lg border border-[var(--brand-primary)]/15 px-3 py-2 text-sm text-heading focus:border-[var(--brand-primary)] focus:outline-none focus:ring-2 focus:ring-[var(--brand-primary)]/20"
                        />
                        @error('progress_percentage')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="order" class="mb-1 block text-sm font-medium text-heading">Order</label>
                        <input
                            type="number"
                            id="order"
                            name="order"
                            value="{{ old('order', $milestone->order) }}"
                            min="0"
                            class="w-full rounded-lg border border-[var(--brand-primary)]/15 px-3 py-2 text-sm text-heading focus:border-[var(--brand-primary)] focus:outline-none focus:ring-2 focus:ring-[var(--brand-primary)]/20"
                        />
                        @error('order')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Actions -->
        <div class="flex items-center justify-end gap-3">
            <a href="{{ route('admin.projects.show', $project) }}" class="rounded-lg border border-border-default px-4 py-2 text-sm font-medium text-brand-primary transition-colors hover:bg-brand-primary/5">
                Cancel
            </a>
            <button type="submit" class="rounded-lg bg-brand-primary px-6 py-2 text-sm font-medium text-white transition-colors hover:bg-[var(--brand-soft)]">
                Update Milestone
            </button>
        </div>
    </form>
</div>
@endsection

