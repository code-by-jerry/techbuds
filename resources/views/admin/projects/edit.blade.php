@extends('admin.layouts.tailadmin')

@section('title', 'Edit Project')

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
                <h2 class="text-2xl font-bold text-[#11224E]">Edit Project</h2>
            </div>
            <p class="text-sm text-[#088395]/70 mt-1">Update project information</p>
        </div>
    </div>

    <!-- Form -->
    <form action="{{ route('admin.projects.update', $project) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="rounded-2xl border border-[#088395]/10 bg-white p-6 shadow-sm">
            <h3 class="mb-4 text-lg font-semibold text-[#11224E]">Project Information</h3>
            <div class="space-y-4">
                <!-- Client -->
                <div>
                    <label for="client_id" class="mb-1 block text-sm font-medium text-[#11224E]">Client <span class="text-red-500">*</span></label>
                    <select
                        id="client_id"
                        name="client_id"
                        required
                        class="w-full rounded-lg border border-[#088395]/15 px-3 py-2 text-sm text-[#11224E] focus:border-[#088395] focus:outline-none focus:ring-2 focus:ring-[#088395]/20"
                    >
                        @foreach($clients as $client)
                        <option value="{{ $client->id }}" {{ old('client_id', $project->client_id) == $client->id ? 'selected' : '' }}>
                            {{ $client->name }} @if($client->company)({{ $client->company }})@endif
                        </option>
                        @endforeach
                    </select>
                    @error('client_id')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Title -->
                <div>
                    <label for="title" class="mb-1 block text-sm font-medium text-[#11224E]">Project Title <span class="text-red-500">*</span></label>
                    <input
                        type="text"
                        id="title"
                        name="title"
                        value="{{ old('title', $project->title) }}"
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
                    >{{ old('description', $project->description) }}</textarea>
                    @error('description')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Status -->
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <div>
                        <label for="status" class="mb-1 block text-sm font-medium text-[#11224E]">Status <span class="text-red-500">*</span></label>
                        <select
                            id="status"
                            name="status"
                            required
                            class="w-full rounded-lg border border-[#088395]/15 px-3 py-2 text-sm text-[#11224E] focus:border-[#088395] focus:outline-none focus:ring-2 focus:ring-[#088395]/20"
                        >
                            <option value="planning" {{ old('status', $project->status) === 'planning' ? 'selected' : '' }}>Planning</option>
                            <option value="ui_ux" {{ old('status', $project->status) === 'ui_ux' ? 'selected' : '' }}>UI/UX</option>
                            <option value="development" {{ old('status', $project->status) === 'development' ? 'selected' : '' }}>Development</option>
                            <option value="testing" {{ old('status', $project->status) === 'testing' ? 'selected' : '' }}>Testing</option>
                            <option value="deployment" {{ old('status', $project->status) === 'deployment' ? 'selected' : '' }}>Deployment</option>
                            <option value="handover" {{ old('status', $project->status) === 'handover' ? 'selected' : '' }}>Handover</option>
                            <option value="maintenance" {{ old('status', $project->status) === 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                            <option value="completed" {{ old('status', $project->status) === 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="cancelled" {{ old('status', $project->status) === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                        @error('status')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Assigned To -->
                    <div>
                        <label for="assigned_to" class="mb-1 block text-sm font-medium text-[#11224E]">Assigned To</label>
                        <select
                            id="assigned_to"
                            name="assigned_to"
                            class="w-full rounded-lg border border-[#088395]/15 px-3 py-2 text-sm text-[#11224E] focus:border-[#088395] focus:outline-none focus:ring-2 focus:ring-[#088395]/20"
                        >
                            <option value="">Unassigned</option>
                            @foreach($admins as $admin)
                            <option value="{{ $admin->id }}" {{ old('assigned_to', $project->assigned_to) == $admin->id ? 'selected' : '' }}>
                                {{ $admin->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('assigned_to')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Dates -->
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <div>
                        <label for="start_date" class="mb-1 block text-sm font-medium text-[#11224E]">Start Date</label>
                        <input
                            type="date"
                            id="start_date"
                            name="start_date"
                            value="{{ old('start_date', $project->start_date?->format('Y-m-d')) }}"
                            class="w-full rounded-lg border border-[#088395]/15 px-3 py-2 text-sm text-[#11224E] focus:border-[#088395] focus:outline-none focus:ring-2 focus:ring-[#088395]/20"
                        />
                        @error('start_date')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="end_date" class="mb-1 block text-sm font-medium text-[#11224E]">End Date</label>
                        <input
                            type="date"
                            id="end_date"
                            name="end_date"
                            value="{{ old('end_date', $project->end_date?->format('Y-m-d')) }}"
                            class="w-full rounded-lg border border-[#088395]/15 px-3 py-2 text-sm text-[#11224E] focus:border-[#088395] focus:outline-none focus:ring-2 focus:ring-[#088395]/20"
                        />
                        @error('end_date')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Budget and Payment -->
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <div>
                        <label for="budget" class="mb-1 block text-sm font-medium text-[#11224E]">Budget</label>
                        <input
                            type="number"
                            id="budget"
                            name="budget"
                            value="{{ old('budget', $project->budget) }}"
                            step="0.01"
                            min="0"
                            class="w-full rounded-lg border border-[#088395]/15 px-3 py-2 text-sm text-[#11224E] focus:border-[#088395] focus:outline-none focus:ring-2 focus:ring-[#088395]/20"
                        />
                        @error('budget')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="payment_status" class="mb-1 block text-sm font-medium text-[#11224E]">Payment Status <span class="text-red-500">*</span></label>
                        <select
                            id="payment_status"
                            name="payment_status"
                            required
                            class="w-full rounded-lg border border-[#088395]/15 px-3 py-2 text-sm text-[#11224E] focus:border-[#088395] focus:outline-none focus:ring-2 focus:ring-[#088395]/20"
                        >
                            <option value="pending" {{ old('payment_status', $project->payment_status) === 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="partial" {{ old('payment_status', $project->payment_status) === 'partial' ? 'selected' : '' }}>Partial</option>
                            <option value="paid" {{ old('payment_status', $project->payment_status) === 'paid' ? 'selected' : '' }}>Paid</option>
                            <option value="overdue" {{ old('payment_status', $project->payment_status) === 'overdue' ? 'selected' : '' }}>Overdue</option>
                        </select>
                        @error('payment_status')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Payment Structure -->
                <div>
                    <label for="payment_structure" class="mb-1 block text-sm font-medium text-[#11224E]">Payment Structure</label>
                    <input
                        type="text"
                        id="payment_structure"
                        name="payment_structure"
                        value="{{ old('payment_structure', $project->payment_structure) }}"
                        class="w-full rounded-lg border border-[#088395]/15 px-3 py-2 text-sm text-[#11224E] focus:border-[#088395] focus:outline-none focus:ring-2 focus:ring-[#088395]/20"
                    />
                    @error('payment_structure')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Progress -->
                <div>
                    <label for="progress_percentage" class="mb-1 block text-sm font-medium text-[#11224E]">Progress (%)</label>
                    <input
                        type="number"
                        id="progress_percentage"
                        name="progress_percentage"
                        value="{{ old('progress_percentage', $project->progress_percentage) }}"
                        min="0"
                        max="100"
                        class="w-full rounded-lg border border-[#088395]/15 px-3 py-2 text-sm text-[#11224E] focus:border-[#088395] focus:outline-none focus:ring-2 focus:ring-[#088395]/20"
                    />
                    @error('progress_percentage')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Internal Notes -->
                <div>
                    <label for="internal_notes" class="mb-1 block text-sm font-medium text-[#11224E]">Internal Notes</label>
                    <textarea
                        id="internal_notes"
                        name="internal_notes"
                        rows="3"
                        class="w-full rounded-lg border border-[#088395]/15 px-3 py-2 text-sm text-[#11224E] focus:border-[#088395] focus:outline-none focus:ring-2 focus:ring-[#088395]/20"
                    >{{ old('internal_notes', $project->internal_notes) }}</textarea>
                    @error('internal_notes')
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
                Update Project
            </button>
        </div>
    </form>
</div>
@endsection

