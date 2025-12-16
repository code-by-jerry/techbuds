@extends('admin.layouts.tailadmin')

@section('title', 'Edit Requirement')

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
                <h2 class="text-2xl font-bold text-[#11224E]">Edit Requirement</h2>
            </div>
            <p class="text-sm text-[#088395]/70 mt-1">Update requirement for {{ $project->title }}</p>
        </div>
    </div>

    <!-- Form -->
    <form action="{{ route('admin.requirements.update', $requirement) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="rounded-2xl border border-[#088395]/10 bg-white p-6 shadow-sm">
            <h3 class="mb-4 text-lg font-semibold text-[#11224E]">Requirement Information</h3>
            <div class="space-y-4">
                <!-- Title -->
                <div>
                    <label for="title" class="mb-1 block text-sm font-medium text-[#11224E]">Title <span class="text-red-500">*</span></label>
                    <input
                        type="text"
                        id="title"
                        name="title"
                        value="{{ old('title', $requirement->title) }}"
                        required
                        class="w-full rounded-lg border border-[#088395]/15 px-3 py-2 text-sm text-[#11224E] focus:border-[#088395] focus:outline-none focus:ring-2 focus:ring-[#088395]/20"
                    />
                    @error('title')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="mb-1 block text-sm font-medium text-[#11224E]">Description</label>
                    <textarea
                        id="description"
                        name="description"
                        rows="4"
                        class="w-full rounded-lg border border-[#088395]/15 px-3 py-2 text-sm text-[#11224E] focus:border-[#088395] focus:outline-none focus:ring-2 focus:ring-[#088395]/20"
                    >{{ old('description', $requirement->description) }}</textarea>
                    @error('description')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Priority and Status -->
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <div>
                        <label for="priority" class="mb-1 block text-sm font-medium text-[#11224E]">Priority <span class="text-red-500">*</span></label>
                        <select
                            id="priority"
                            name="priority"
                            required
                            class="w-full rounded-lg border border-[#088395]/15 px-3 py-2 text-sm text-[#11224E] focus:border-[#088395] focus:outline-none focus:ring-2 focus:ring-[#088395]/20"
                        >
                            <option value="low" {{ old('priority', $requirement->priority) === 'low' ? 'selected' : '' }}>Low</option>
                            <option value="medium" {{ old('priority', $requirement->priority) === 'medium' ? 'selected' : '' }}>Medium</option>
                            <option value="high" {{ old('priority', $requirement->priority) === 'high' ? 'selected' : '' }}>High</option>
                            <option value="critical" {{ old('priority', $requirement->priority) === 'critical' ? 'selected' : '' }}>Critical</option>
                        </select>
                        @error('priority')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="status" class="mb-1 block text-sm font-medium text-[#11224E]">Status <span class="text-red-500">*</span></label>
                        <select
                            id="status"
                            name="status"
                            required
                            class="w-full rounded-lg border border-[#088395]/15 px-3 py-2 text-sm text-[#11224E] focus:border-[#088395] focus:outline-none focus:ring-2 focus:ring-[#088395]/20"
                        >
                            <option value="pending" {{ old('status', $requirement->status) === 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="in_progress" {{ old('status', $requirement->status) === 'in_progress' ? 'selected' : '' }}>In Progress</option>
                            <option value="completed" {{ old('status', $requirement->status) === 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="on_hold" {{ old('status', $requirement->status) === 'on_hold' ? 'selected' : '' }}>On Hold</option>
                            <option value="cancelled" {{ old('status', $requirement->status) === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                        @error('status')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Assigned To and Due Date -->
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <div>
                        <label for="assigned_to" class="mb-1 block text-sm font-medium text-[#11224E]">Assigned To</label>
                        <select
                            id="assigned_to"
                            name="assigned_to"
                            class="w-full rounded-lg border border-[#088395]/15 px-3 py-2 text-sm text-[#11224E] focus:border-[#088395] focus:outline-none focus:ring-2 focus:ring-[#088395]/20"
                        >
                            <option value="">Unassigned</option>
                            @foreach($admins as $admin)
                            <option value="{{ $admin->id }}" {{ old('assigned_to', $requirement->assigned_to) == $admin->id ? 'selected' : '' }}>
                                {{ $admin->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('assigned_to')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="due_date" class="mb-1 block text-sm font-medium text-[#11224E]">Due Date</label>
                        <input
                            type="date"
                            id="due_date"
                            name="due_date"
                            value="{{ old('due_date', $requirement->due_date?->format('Y-m-d')) }}"
                            class="w-full rounded-lg border border-[#088395]/15 px-3 py-2 text-sm text-[#11224E] focus:border-[#088395] focus:outline-none focus:ring-2 focus:ring-[#088395]/20"
                        />
                        @error('due_date')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Hours -->
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <div>
                        <label for="estimated_hours" class="mb-1 block text-sm font-medium text-[#11224E]">Estimated Hours</label>
                        <input
                            type="number"
                            id="estimated_hours"
                            name="estimated_hours"
                            value="{{ old('estimated_hours', $requirement->estimated_hours) }}"
                            min="0"
                            class="w-full rounded-lg border border-[#088395]/15 px-3 py-2 text-sm text-[#11224E] focus:border-[#088395] focus:outline-none focus:ring-2 focus:ring-[#088395]/20"
                        />
                        @error('estimated_hours')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="actual_hours" class="mb-1 block text-sm font-medium text-[#11224E]">Actual Hours</label>
                        <input
                            type="number"
                            id="actual_hours"
                            name="actual_hours"
                            value="{{ old('actual_hours', $requirement->actual_hours) }}"
                            min="0"
                            class="w-full rounded-lg border border-[#088395]/15 px-3 py-2 text-sm text-[#11224E] focus:border-[#088395] focus:outline-none focus:ring-2 focus:ring-[#088395]/20"
                        />
                        @error('actual_hours')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Notes -->
                <div>
                    <label for="notes" class="mb-1 block text-sm font-medium text-[#11224E]">Notes</label>
                    <textarea
                        id="notes"
                        name="notes"
                        rows="3"
                        class="w-full rounded-lg border border-[#088395]/15 px-3 py-2 text-sm text-[#11224E] focus:border-[#088395] focus:outline-none focus:ring-2 focus:ring-[#088395]/20"
                    >{{ old('notes', $requirement->notes) }}</textarea>
                    @error('notes')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Order -->
                <div>
                    <label for="order" class="mb-1 block text-sm font-medium text-[#11224E]">Order</label>
                    <input
                        type="number"
                        id="order"
                        name="order"
                        value="{{ old('order', $requirement->order) }}"
                        min="0"
                        class="w-full rounded-lg border border-[#088395]/15 px-3 py-2 text-sm text-[#11224E] focus:border-[#088395] focus:outline-none focus:ring-2 focus:ring-[#088395]/20"
                    />
                    @error('order')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Form Actions -->
        <div class="flex items-center justify-end gap-3">
            <a href="{{ route('admin.projects.show', $project) }}" class="rounded-lg border border-[#088395]/20 px-4 py-2 text-sm font-medium text-[#088395] transition-colors hover:bg-[#088395]/5">
                Cancel
            </a>
            <button type="submit" class="rounded-lg bg-[#088395] px-6 py-2 text-sm font-medium text-white transition-colors hover:bg-[#37B7C3]">
                Update Requirement
            </button>
        </div>
    </form>
</div>
@endsection

