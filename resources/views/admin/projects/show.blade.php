@extends('admin.layouts.tailadmin')

@section('title', 'Project Details')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.projects.index') }}" class="text-brand-primary hover:text-brand-soft transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                </a>
                <h2 class="text-2xl font-bold text-heading">{{ $project->title }}</h2>
            </div>
            <p class="text-sm text-text-secondary mt-1">Project details and information</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.projects.edit', $project) }}" class="inline-flex items-center gap-2 rounded-lg border border-border-default px-4 py-2 text-sm font-medium text-brand-primary transition-colors hover:bg-brand-primary/5">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
                Edit
            </a>
        </div>
    </div>

    <!-- Success/Error Messages -->
    @if(session('success'))
    <div class="rounded-lg border border-green-500/20 bg-green-500/10 px-4 py-3 text-sm text-success">
        {{ session('success') }}
    </div>
    @endif

    <!-- Project Details Card -->
    <div class="rounded-2xl border border-border-default bg-surface-1 shadow-sm overflow-hidden">
        <div class="bg-brand-primary/5 px-6 py-4 border-b border-border-default">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-heading">{{ $project->title }}</h3>
                    <p class="text-sm text-text-secondary mt-1">
                        Client: <a href="{{ route('admin.clients.show', $project->client) }}" class="text-brand-primary hover:text-brand-soft">{{ $project->client->name }}</a>
                    </p>
                </div>
                <div>
                    @php
                        $statusColors = [
                            'planning' => 'bg-surface-2 text-text-secondary border-border-default',
                            'ui_ux' => 'bg-warning/10 text-warning border-orange-200',
                            'development' => 'bg-brand-primary text-white border-indigo-200',
                            'testing' => 'bg-warning/10 text-warning border-pink-200',
                            'deployment' => 'bg-brand-soft/10 text-brand-soft border-purple-200',
                            'handover' => 'bg-info/10 text-info border-cyan-200',
                            'maintenance' => 'bg-green-500/10 text-success border-green-500/20',
                            'completed' => 'bg-surface-2 text-text-secondary border-slate-200',
                            'cancelled' => 'bg-error/10 text-error border-error/20',
                        ];
                        $color = $statusColors[$project->status] ?? 'bg-surface-2 text-text-secondary border-border-default';
                    @endphp
                    <span class="inline-flex items-center rounded-full border px-3 py-1 text-xs font-medium {{ $color }}">
                        {{ ucfirst(str_replace('_', ' ', $project->status)) }}
                    </span>
                </div>
            </div>
        </div>

        <!-- Tabs -->
        <div class="border-b border-border-default">
            <nav class="flex -mb-px overflow-x-auto">
                <button onclick="showTab('overview')" class="tab-button active border-b-2 border-[var(--brand-primary)] px-6 py-4 text-sm font-medium text-brand-primary whitespace-nowrap">
                    Overview
                </button>
                <button onclick="showTab('requirements')" class="tab-button border-b-2 border-transparent px-6 py-4 text-sm font-medium text-text-secondary hover:text-brand-primary hover:border-[var(--brand-primary)]/30 whitespace-nowrap">
                    Requirements
                </button>
                <button onclick="showTab('communication')" class="tab-button border-b-2 border-transparent px-6 py-4 text-sm font-medium text-text-secondary hover:text-brand-primary hover:border-[var(--brand-primary)]/30 whitespace-nowrap">
                    Communication
                </button>
                <button onclick="showTab('tasks')" class="tab-button border-b-2 border-transparent px-6 py-4 text-sm font-medium text-text-secondary hover:text-brand-primary hover:border-[var(--brand-primary)]/30 whitespace-nowrap">
                    Tasks
                </button>
                <button onclick="showTab('documents')" class="tab-button border-b-2 border-transparent px-6 py-4 text-sm font-medium text-text-secondary hover:text-brand-primary hover:border-[var(--brand-primary)]/30 whitespace-nowrap">
                    Documents
                </button>
                <button onclick="showTab('team')" class="tab-button border-b-2 border-transparent px-6 py-4 text-sm font-medium text-text-secondary hover:text-brand-primary hover:border-[var(--brand-primary)]/30 whitespace-nowrap">
                    Team
                </button>
                <button onclick="showTab('invoices')" class="tab-button border-b-2 border-transparent px-6 py-4 text-sm font-medium text-text-secondary hover:text-brand-primary hover:border-[var(--brand-primary)]/30 whitespace-nowrap">
                    Invoices
                </button>
                <button onclick="showTab('activity')" class="tab-button border-b-2 border-transparent px-6 py-4 text-sm font-medium text-text-secondary hover:text-brand-primary hover:border-[var(--brand-primary)]/30 whitespace-nowrap">
                    Activity
                </button>
            </nav>
        </div>

        <!-- Tab Content -->
        <div class="p-6">
            <!-- Overview Tab -->
            <div id="overview" class="tab-content">
                <div class="space-y-6">
                    <!-- Description -->
                    @if($project->description)
                    <div>
                        <h4 class="text-sm font-semibold text-heading mb-3 uppercase tracking-wide">Description</h4>
                        <div class="rounded-lg bg-brand-primary/5 p-4">
                            <p class="text-sm text-heading whitespace-pre-wrap">{{ $project->description }}</p>
                        </div>
                    </div>
                    @endif

                    <!-- Project Information Grid -->
                    <div>
                        <h4 class="text-sm font-semibold text-heading mb-4 uppercase tracking-wide">Project Information</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            <!-- Status -->
                            <div>
                                <label class="text-xs font-medium text-text-secondary uppercase">Status</label>
                                <div class="mt-1">
                                    <form action="{{ route('admin.projects.update-status', $project) }}" method="POST" class="inline">
                                        @csrf
                                        <select name="status" onchange="this.form.submit()" class="text-sm font-medium text-heading border-0 bg-transparent p-0 focus:ring-0">
                                            <option value="planning" {{ $project->status === 'planning' ? 'selected' : '' }}>Planning</option>
                                            <option value="ui_ux" {{ $project->status === 'ui_ux' ? 'selected' : '' }}>UI/UX</option>
                                            <option value="development" {{ $project->status === 'development' ? 'selected' : '' }}>Development</option>
                                            <option value="testing" {{ $project->status === 'testing' ? 'selected' : '' }}>Testing</option>
                                            <option value="deployment" {{ $project->status === 'deployment' ? 'selected' : '' }}>Deployment</option>
                                            <option value="handover" {{ $project->status === 'handover' ? 'selected' : '' }}>Handover</option>
                                            <option value="maintenance" {{ $project->status === 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                                            <option value="completed" {{ $project->status === 'completed' ? 'selected' : '' }}>Completed</option>
                                            <option value="cancelled" {{ $project->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                        </select>
                                    </form>
                                </div>
                            </div>

                            <!-- Progress -->
                            <div>
                                <label class="text-xs font-medium text-text-secondary uppercase">Progress</label>
                                <div class="mt-1">
                                    <form action="{{ route('admin.projects.update-progress', $project) }}" method="POST" class="flex items-center gap-2">
                                        @csrf
                                        <input
                                            type="number"
                                            name="progress_percentage"
                                            value="{{ $project->progress_percentage }}"
                                            min="0"
                                            max="100"
                                            onchange="this.form.submit()"
                                            class="w-20 rounded-lg border border-border-default bg-surface-2 px-2 py-1 text-sm text-heading focus:border-brand-primary focus:outline-none focus:ring-2 focus:ring-brand-primary/20"
                                        />
                                        <span class="text-sm font-medium text-heading">%</span>
                                    </form>
                                    <div class="mt-2 h-2 bg-brand-primary/10 rounded-full overflow-hidden">
                                        <div class="h-full bg-brand-primary rounded-full transition-all" style="width: {{ $project->progress_percentage }}%"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Assigned To -->
                            <div>
                                <label class="text-xs font-medium text-text-secondary uppercase">Assigned To</label>
                                <p class="mt-1 text-sm text-heading">
                                    {{ $project->assignedTo ? $project->assignedTo->name : 'Unassigned' }}
                                </p>
                            </div>

                            <!-- Start Date -->
                            @if($project->start_date)
                            <div>
                                <label class="text-xs font-medium text-text-secondary uppercase">Start Date</label>
                                <p class="mt-1 text-sm text-heading">{{ $project->start_date->format('M d, Y') }}</p>
                            </div>
                            @endif

                            <!-- End Date -->
                            @if($project->end_date)
                            <div>
                                <label class="text-xs font-medium text-text-secondary uppercase">End Date</label>
                                <p class="mt-1 text-sm text-heading">{{ $project->end_date->format('M d, Y') }}</p>
                            </div>
                            @endif

                            <!-- Budget -->
                            @if($project->budget)
                            <div>
                                <label class="text-xs font-medium text-text-secondary uppercase">Budget</label>
                                <p class="mt-1 text-sm text-heading">${{ number_format($project->budget, 2) }}</p>
                            </div>
                            @endif

                            <!-- Payment Status -->
                            <div>
                                <label class="text-xs font-medium text-text-secondary uppercase">Payment Status</label>
                                @php
                                    $paymentColors = [
                                        'pending' => 'bg-warning/10 text-warning',
                                        'partial' => 'bg-brand-primary text-white',
                                        'paid' => 'bg-success/10 text-success',
                                        'overdue' => 'bg-error/10 text-error',
                                    ];
                                    $paymentColor = $paymentColors[$project->payment_status] ?? 'bg-surface-2 text-text-secondary';
                                @endphp
                                <span class="mt-1 inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium {{ $paymentColor }}">
                                    {{ ucfirst($project->payment_status) }}
                                </span>
                            </div>

                            <!-- Payment Structure -->
                            @if($project->payment_structure)
                            <div>
                                <label class="text-xs font-medium text-text-secondary uppercase">Payment Structure</label>
                                <p class="mt-1 text-sm text-heading">{{ $project->payment_structure }}</p>
                            </div>
                            @endif
                        </div>
                    </div>

                    <!-- Quick Stats -->
                    <div>
                        <h4 class="text-sm font-semibold text-heading mb-4 uppercase tracking-wide">Quick Stats</h4>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            <div class="rounded-lg border border-border-default bg-surface-1 p-4">
                                <div class="text-2xl font-bold text-heading">{{ $project->requirements->count() }}</div>
                                <div class="text-xs text-text-secondary mt-1">Requirements</div>
                            </div>
                            <div class="rounded-lg border border-border-default bg-surface-1 p-4">
                                <div class="text-2xl font-bold text-heading">{{ $project->tasks->count() }}</div>
                                <div class="text-xs text-text-secondary mt-1">Tasks</div>
                            </div>
                            <div class="rounded-lg border border-border-default bg-surface-1 p-4">
                                <div class="text-2xl font-bold text-heading">{{ $project->documents->count() }}</div>
                                <div class="text-xs text-text-secondary mt-1">Documents</div>
                            </div>
                            <div class="rounded-lg border border-border-default bg-surface-1 p-4">
                                <div class="text-2xl font-bold text-heading">{{ $project->invoices->count() }}</div>
                                <div class="text-xs text-text-secondary mt-1">Invoices</div>
                            </div>
                        </div>
                    </div>

                    <!-- Internal Notes -->
                    @if($project->internal_notes)
                    <div>
                        <h4 class="text-sm font-semibold text-heading mb-3 uppercase tracking-wide">Internal Notes</h4>
                        <div class="rounded-lg bg-brand-primary/5 p-4">
                            <p class="text-sm text-heading whitespace-pre-wrap">{{ $project->internal_notes }}</p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Requirements Tab -->
            <div id="requirements" class="tab-content hidden">
                @include('admin.projects._requirements')
            </div>

            <!-- Communication Tab -->
            <div id="communication" class="tab-content hidden">
                @include('admin.projects._communication')
            </div>

            <!-- Tasks Tab -->
            <div id="tasks" class="tab-content hidden">
                @include('admin.projects._tasks')
            </div>

            <!-- Documents Tab -->
            <div id="documents" class="tab-content hidden">
                @include('admin.projects._documents')
            </div>

            <!-- Team Tab -->
            <div id="team" class="tab-content hidden">
                @include('admin.projects._team')
            </div>

            <!-- Invoices Tab -->
            <div id="invoices" class="tab-content hidden">
                @include('admin.projects._invoices')
            </div>

            <!-- Activity Tab -->
            <div id="activity" class="tab-content hidden">
                <div class="space-y-4">
                    <h4 class="text-lg font-semibold text-heading">Activity Log</h4>
                    @if($project->activityLogs->count() > 0)
                    <div class="space-y-3">
                        @foreach($project->activityLogs as $log)
                        <div class="flex items-start gap-3 rounded-lg border border-border-default bg-surface-1 p-4">
                            <div class="flex-shrink-0">
                                <div class="h-8 w-8 rounded-full bg-brand-primary/10 flex items-center justify-center">
                                    <svg class="w-4 h-4 text-brand-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm text-heading">{{ $log->description }}</p>
                                <div class="flex items-center gap-2 mt-1 text-xs text-text-secondary">
                                    @if($log->user)
                                    <span>{{ $log->user->name }}</span>
                                    <span>•</span>
                                    @endif
                                    <span>{{ $log->created_at->format('M d, Y h:i A') }}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="rounded-lg border border-border-default bg-surface-1 p-8 text-center">
                        <p class="text-sm text-text-secondary">No activity logged yet.</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function showTab(tabName) {
        // Hide all tab contents
        document.querySelectorAll('.tab-content').forEach(content => {
            content.classList.add('hidden');
        });
        
        // Remove active class from all buttons
        document.querySelectorAll('.tab-button').forEach(button => {
            button.classList.remove('active', 'border-[var(--brand-primary)]', 'text-brand-primary');
            button.classList.add('border-transparent', 'text-text-secondary');
        });
        
        // Show selected tab content
        document.getElementById(tabName).classList.remove('hidden');
        
        // Add active class to clicked button
        event.target.classList.add('active', 'border-[var(--brand-primary)]', 'text-brand-primary');
        event.target.classList.remove('border-transparent', 'text-text-secondary');
    }
</script>
@endsection

