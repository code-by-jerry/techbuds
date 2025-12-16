@extends('admin.layouts.tailadmin')

@section('title', 'Create Task')

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
                <h2 class="text-2xl font-bold text-[#11224E]">Create Task</h2>
            </div>
            <p class="text-sm text-[#088395]/70 mt-1">Add a new task for {{ $project->title }}</p>
        </div>
    </div>

    <!-- Form -->
    <form action="{{ route('admin.projects.tasks.store', $project) }}" method="POST" class="space-y-6">
        @csrf

        <div class="rounded-2xl border border-[#088395]/10 bg-white p-6 shadow-sm">
            <h3 class="mb-4 text-lg font-semibold text-[#11224E]">Task Information</h3>
            <div class="space-y-4">
                <!-- Title -->
                <div>
                    <label for="title" class="mb-1 block text-sm font-medium text-[#11224E]">Title <span class="text-red-500">*</span></label>
                    <input
                        type="text"
                        id="title"
                        name="title"
                        value="{{ old('title') }}"
                        required
                        class="w-full rounded-lg border border-[#088395]/15 px-3 py-2 text-sm text-[#11224E] focus:border-[#088395] focus:outline-none focus:ring-2 focus:ring-[#088395]/20"
                        placeholder="e.g., Implement user authentication"
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
                        placeholder="Detailed description of the task..."
                    >{{ old('description') }}</textarea>
                    @error('description')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Status and Priority -->
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <div>
                        <label for="status" class="mb-1 block text-sm font-medium text-[#11224E]">Status <span class="text-red-500">*</span></label>
                        <select
                            id="status"
                            name="status"
                            required
                            class="w-full rounded-lg border border-[#088395]/15 px-3 py-2 text-sm text-[#11224E] focus:border-[#088395] focus:outline-none focus:ring-2 focus:ring-[#088395]/20"
                        >
                            <option value="todo" {{ old('status', 'todo') === 'todo' ? 'selected' : '' }}>Todo</option>
                            <option value="in_progress" {{ old('status') === 'in_progress' ? 'selected' : '' }}>In Progress</option>
                            <option value="review" {{ old('status') === 'review' ? 'selected' : '' }}>Review</option>
                            <option value="completed" {{ old('status') === 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="blocked" {{ old('status') === 'blocked' ? 'selected' : '' }}>Blocked</option>
                            <option value="overdue" {{ old('status') === 'overdue' ? 'selected' : '' }}>Overdue</option>
                        </select>
                        @error('status')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="priority" class="mb-1 block text-sm font-medium text-[#11224E]">Priority <span class="text-red-500">*</span></label>
                        <select
                            id="priority"
                            name="priority"
                            required
                            class="w-full rounded-lg border border-[#088395]/15 px-3 py-2 text-sm text-[#11224E] focus:border-[#088395] focus:outline-none focus:ring-2 focus:ring-[#088395]/20"
                        >
                            <option value="0" {{ old('priority', '0') == '0' ? 'selected' : '' }}>None</option>
                            <option value="1" {{ old('priority') == '1' ? 'selected' : '' }}>Low</option>
                            <option value="2" {{ old('priority') == '2' ? 'selected' : '' }}>Medium</option>
                            <option value="3" {{ old('priority') == '3' ? 'selected' : '' }}>High</option>
                        </select>
                        @error('priority')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Assigned To and Milestone -->
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
                            <option value="{{ $admin->id }}" {{ old('assigned_to') == $admin->id ? 'selected' : '' }}>
                                {{ $admin->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('assigned_to')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="milestone_id" class="mb-1 block text-sm font-medium text-[#11224E]">Milestone</label>
                        <select
                            id="milestone_id"
                            name="milestone_id"
                            class="w-full rounded-lg border border-[#088395]/15 px-3 py-2 text-sm text-[#11224E] focus:border-[#088395] focus:outline-none focus:ring-2 focus:ring-[#088395]/20"
                        >
                            <option value="">No Milestone</option>
                            @foreach($milestones as $milestone)
                            <option value="{{ $milestone->id }}" {{ old('milestone_id') == $milestone->id ? 'selected' : '' }}>
                                {{ $milestone->title }}
                            </option>
                            @endforeach
                        </select>
                        @error('milestone_id')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Due Date and Progress -->
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <div>
                        <label for="due_date" class="mb-1 block text-sm font-medium text-[#11224E]">Due Date</label>
                        <input
                            type="date"
                            id="due_date"
                            name="due_date"
                            value="{{ old('due_date') }}"
                            class="w-full rounded-lg border border-[#088395]/15 px-3 py-2 text-sm text-[#11224E] focus:border-[#088395] focus:outline-none focus:ring-2 focus:ring-[#088395]/20"
                        />
                        @error('due_date')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="progress_percentage" class="mb-1 block text-sm font-medium text-[#11224E]">Progress (%)</label>
                        <input
                            type="number"
                            id="progress_percentage"
                            name="progress_percentage"
                            value="{{ old('progress_percentage', 0) }}"
                            min="0"
                            max="100"
                            class="w-full rounded-lg border border-[#088395]/15 px-3 py-2 text-sm text-[#11224E] focus:border-[#088395] focus:outline-none focus:ring-2 focus:ring-[#088395]/20"
                        />
                        @error('progress_percentage')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Internal Comments -->
                <div>
                    <label for="internal_comments" class="mb-1 block text-sm font-medium text-[#11224E]">Internal Comments</label>
                    <textarea
                        id="internal_comments"
                        name="internal_comments"
                        rows="3"
                        class="w-full rounded-lg border border-[#088395]/15 px-3 py-2 text-sm text-[#11224E] focus:border-[#088395] focus:outline-none focus:ring-2 focus:ring-[#088395]/20"
                        placeholder="Internal notes (not visible to client)..."
                    >{{ old('internal_comments') }}</textarea>
                    @error('internal_comments')
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
                        value="{{ old('order', $maxOrder + 1) }}"
                        min="0"
                        class="w-full rounded-lg border border-[#088395]/15 px-3 py-2 text-sm text-[#11224E] focus:border-[#088395] focus:outline-none focus:ring-2 focus:ring-[#088395]/20"
                    />
                    <p class="mt-1 text-xs text-[#088395]/70">Lower numbers appear first</p>
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
                Create Task
            </button>
        </div>
    </form>
</div>
@endsection

