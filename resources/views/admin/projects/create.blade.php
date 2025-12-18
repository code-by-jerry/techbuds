@extends('admin.layouts.tailadmin')

@section('title', 'Create Project')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold text-heading">Create New Project</h2>
            <p class="text-sm text-text-secondary mt-1">Add a new project to the system</p>
        </div>
        <a href="{{ route('admin.projects.index') }}" class="inline-flex items-center gap-2 rounded-lg border border-border-default px-4 py-2 text-sm font-medium text-brand-primary transition-colors hover:bg-brand-primary/5">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
            Cancel
        </a>
    </div>

    <!-- Form -->
    <form action="{{ route('admin.projects.store') }}" method="POST" class="space-y-6">
        @csrf

        <div class="rounded-2xl border border-border-default bg-surface-1 p-6 shadow-sm">
            <h3 class="mb-4 text-lg font-semibold text-heading">Project Information</h3>
            <div class="space-y-4">
                <!-- Client -->
                <div>
                    <label for="client_id" class="mb-1 block text-sm font-medium text-heading">Client <span class="text-red-500">*</span></label>
                    <select
                        id="client_id"
                        name="client_id"
                        required
                        class="w-full rounded-lg border border-border-default bg-surface-2 px-3 py-2 text-sm text-heading focus:border-brand-primary focus:outline-none focus:ring-2 focus:ring-brand-primary/20"
                    >
                        <option value="">Select a client</option>
                        @foreach($clients as $client)
                        <option value="{{ $client->id }}" {{ old('client_id', request('client_id')) == $client->id ? 'selected' : '' }}>
                            {{ $client->name }} @if($client->company)({{ $client->company }})@endif
                        </option>
                        @endforeach
                    </select>
                    @error('client_id')
                    <p class="mt-1 text-xs text-error">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Title -->
                <div>
                    <label for="title" class="mb-1 block text-sm font-medium text-heading">Project Title <span class="text-red-500">*</span></label>
                    <input
                        type="text"
                        id="title"
                        name="title"
                        value="{{ old('title') }}"
                        required
                        class="w-full rounded-lg border border-border-default bg-surface-2 px-3 py-2 text-sm text-heading focus:border-brand-primary focus:outline-none focus:ring-2 focus:ring-brand-primary/20"
                        placeholder="e.g., E-commerce Website Development"
                    />
                    @error('title')
                    <p class="mt-1 text-xs text-error">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="mb-1 block text-sm font-medium text-heading">Description</label>
                    <textarea
                        id="description"
                        name="description"
                        rows="4"
                        class="w-full rounded-lg border border-border-default bg-surface-2 px-3 py-2 text-sm text-heading focus:border-brand-primary focus:outline-none focus:ring-2 focus:ring-brand-primary/20"
                        placeholder="Project description and objectives..."
                    >{{ old('description') }}</textarea>
                    @error('description')
                    <p class="mt-1 text-xs text-error">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Status -->
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <div>
                        <label for="status" class="mb-1 block text-sm font-medium text-heading">Status <span class="text-red-500">*</span></label>
                        <select
                            id="status"
                            name="status"
                            required
                            class="w-full rounded-lg border border-border-default bg-surface-2 px-3 py-2 text-sm text-heading focus:border-brand-primary focus:outline-none focus:ring-2 focus:ring-brand-primary/20"
                        >
                            <option value="planning" {{ old('status', 'planning') === 'planning' ? 'selected' : '' }}>Planning</option>
                            <option value="ui_ux" {{ old('status') === 'ui_ux' ? 'selected' : '' }}>UI/UX</option>
                            <option value="development" {{ old('status') === 'development' ? 'selected' : '' }}>Development</option>
                            <option value="testing" {{ old('status') === 'testing' ? 'selected' : '' }}>Testing</option>
                            <option value="deployment" {{ old('status') === 'deployment' ? 'selected' : '' }}>Deployment</option>
                            <option value="handover" {{ old('status') === 'handover' ? 'selected' : '' }}>Handover</option>
                            <option value="maintenance" {{ old('status') === 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                            <option value="completed" {{ old('status') === 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="cancelled" {{ old('status') === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                        @error('status')
                        <p class="mt-1 text-xs text-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Assigned To -->
                    <div>
                        <label for="assigned_to" class="mb-1 block text-sm font-medium text-heading">Assigned To</label>
                        <select
                            id="assigned_to"
                            name="assigned_to"
                            class="w-full rounded-lg border border-border-default bg-surface-2 px-3 py-2 text-sm text-heading focus:border-brand-primary focus:outline-none focus:ring-2 focus:ring-brand-primary/20"
                        >
                            <option value="">Unassigned</option>
                            @foreach($admins as $admin)
                            <option value="{{ $admin->id }}" {{ old('assigned_to') == $admin->id ? 'selected' : '' }}>
                                {{ $admin->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('assigned_to')
                        <p class="mt-1 text-xs text-error">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Dates -->
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <div>
                        <label for="start_date" class="mb-1 block text-sm font-medium text-heading">Start Date</label>
                        <input
                            type="date"
                            id="start_date"
                            name="start_date"
                            value="{{ old('start_date') }}"
                            class="w-full rounded-lg border border-border-default bg-surface-2 px-3 py-2 text-sm text-heading focus:border-brand-primary focus:outline-none focus:ring-2 focus:ring-brand-primary/20"
                        />
                        @error('start_date')
                        <p class="mt-1 text-xs text-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="end_date" class="mb-1 block text-sm font-medium text-heading">End Date</label>
                        <input
                            type="date"
                            id="end_date"
                            name="end_date"
                            value="{{ old('end_date') }}"
                            class="w-full rounded-lg border border-border-default bg-surface-2 px-3 py-2 text-sm text-heading focus:border-brand-primary focus:outline-none focus:ring-2 focus:ring-brand-primary/20"
                        />
                        @error('end_date')
                        <p class="mt-1 text-xs text-error">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Budget and Payment -->
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <div>
                        <label for="budget" class="mb-1 block text-sm font-medium text-heading">Budget</label>
                        <input
                            type="number"
                            id="budget"
                            name="budget"
                            value="{{ old('budget') }}"
                            step="0.01"
                            min="0"
                            class="w-full rounded-lg border border-border-default bg-surface-2 px-3 py-2 text-sm text-heading focus:border-brand-primary focus:outline-none focus:ring-2 focus:ring-brand-primary/20"
                            placeholder="0.00"
                        />
                        @error('budget')
                        <p class="mt-1 text-xs text-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="payment_status" class="mb-1 block text-sm font-medium text-heading">Payment Status <span class="text-red-500">*</span></label>
                        <select
                            id="payment_status"
                            name="payment_status"
                            required
                            class="w-full rounded-lg border border-border-default bg-surface-2 px-3 py-2 text-sm text-heading focus:border-brand-primary focus:outline-none focus:ring-2 focus:ring-brand-primary/20"
                        >
                            <option value="pending" {{ old('payment_status', 'pending') === 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="partial" {{ old('payment_status') === 'partial' ? 'selected' : '' }}>Partial</option>
                            <option value="paid" {{ old('payment_status') === 'paid' ? 'selected' : '' }}>Paid</option>
                            <option value="overdue" {{ old('payment_status') === 'overdue' ? 'selected' : '' }}>Overdue</option>
                        </select>
                        @error('payment_status')
                        <p class="mt-1 text-xs text-error">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Payment Structure -->
                <div>
                    <label for="payment_structure" class="mb-1 block text-sm font-medium text-heading">Payment Structure</label>
                    <input
                        type="text"
                        id="payment_structure"
                        name="payment_structure"
                        value="{{ old('payment_structure') }}"
                        class="w-full rounded-lg border border-border-default bg-surface-2 px-3 py-2 text-sm text-heading focus:border-brand-primary focus:outline-none focus:ring-2 focus:ring-brand-primary/20"
                        placeholder="e.g., 50% upfront, 50% on completion"
                    />
                    @error('payment_structure')
                    <p class="mt-1 text-xs text-error">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Progress -->
                <div>
                    <label for="progress_percentage" class="mb-1 block text-sm font-medium text-heading">Progress (%)</label>
                    <input
                        type="number"
                        id="progress_percentage"
                        name="progress_percentage"
                        value="{{ old('progress_percentage', 0) }}"
                        min="0"
                        max="100"
                        class="w-full rounded-lg border border-border-default bg-surface-2 px-3 py-2 text-sm text-heading focus:border-brand-primary focus:outline-none focus:ring-2 focus:ring-brand-primary/20"
                    />
                    @error('progress_percentage')
                    <p class="mt-1 text-xs text-error">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Internal Notes -->
                <div>
                    <label for="internal_notes" class="mb-1 block text-sm font-medium text-heading">Internal Notes</label>
                    <textarea
                        id="internal_notes"
                        name="internal_notes"
                        rows="3"
                        class="w-full rounded-lg border border-border-default bg-surface-2 px-3 py-2 text-sm text-heading focus:border-brand-primary focus:outline-none focus:ring-2 focus:ring-brand-primary/20"
                        placeholder="Internal notes (not visible to client)..."
                    >{{ old('internal_notes') }}</textarea>
                    @error('internal_notes')
                    <p class="mt-1 text-xs text-error">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Form Actions -->
        <div class="flex items-center justify-end gap-3">
            <a href="{{ route('admin.projects.index') }}" class="rounded-lg border border-border-default px-4 py-2 text-sm font-medium text-brand-primary transition-colors hover:bg-brand-primary/5">
                Cancel
            </a>
            <button type="submit" class="rounded-lg bg-brand-primary px-6 py-2 text-sm font-medium text-white transition-colors hover:bg-brand-hover">
                Create Project
            </button>
        </div>
    </form>
</div>
@endsection

