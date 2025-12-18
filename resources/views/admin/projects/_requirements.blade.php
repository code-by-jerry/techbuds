<div class="space-y-4">
    <!-- Header with Add Button -->
    <div class="flex items-center justify-between">
        <h4 class="text-lg font-semibold text-heading">Requirements</h4>
        <a href="{{ route('admin.projects.requirements.create', $project) }}" class="inline-flex items-center gap-2 rounded-lg bg-brand-primary px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-brand-hover">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Add Requirement
        </a>
    </div>

    <!-- Requirements List -->
    @if($project->requirements->count() > 0)
    <div class="space-y-3">
        @foreach($project->requirements as $requirement)
        <div class="rounded-lg border border-border-default bg-surface-1 p-4 hover:bg-brand-primary/2 transition-colors">
            <div class="flex items-start justify-between">
                <div class="flex-1">
                    <div class="flex items-center gap-3">
                        <h5 class="font-medium text-heading">{{ $requirement->title }}</h5>
                        @php
                            $priorityColors = [
                                'low' => 'bg-surface-2 text-text-secondary',
                                'medium' => 'bg-brand-primary text-white',
                                'high' => 'bg-warning/10 text-warning',
                                'critical' => 'bg-error/10 text-error',
                            ];
                            $priorityColor = $priorityColors[$requirement->priority] ?? 'bg-surface-2 text-text-secondary';
                        @endphp
                        <span class="inline-flex items-center rounded-full px-2 py-0.5 text-xs font-medium {{ $priorityColor }}">
                            {{ ucfirst($requirement->priority) }}
                        </span>
                        @php
                            $statusColors = [
                                'pending' => 'bg-surface-2 text-text-secondary',
                                'in_progress' => 'bg-brand-primary text-white',
                                'completed' => 'bg-green-500/10 text-success',
                                'on_hold' => 'bg-warning/10 text-warning',
                                'cancelled' => 'bg-error/10 text-error',
                            ];
                            $statusColor = $statusColors[$requirement->status] ?? 'bg-surface-2 text-text-secondary';
                        @endphp
                        <span class="inline-flex items-center rounded-full px-2 py-0.5 text-xs font-medium {{ $statusColor }}">
                            {{ ucfirst(str_replace('_', ' ', $requirement->status)) }}
                        </span>
                    </div>
                    @if($requirement->description)
                    <p class="text-sm text-text-secondary mt-2">{{ Str::limit($requirement->description, 150) }}</p>
                    @endif
                    <div class="flex items-center gap-4 mt-3 text-xs text-text-secondary">
                        @if($requirement->assignedTo)
                        <span>Assigned to: <strong>{{ $requirement->assignedTo->name }}</strong></span>
                        @endif
                        @if($requirement->estimated_hours)
                        <span>Est: {{ $requirement->estimated_hours }}h</span>
                        @endif
                        @if($requirement->actual_hours)
                        <span>Actual: {{ $requirement->actual_hours }}h</span>
                        @endif
                        @if($requirement->due_date)
                        <span>Due: {{ $requirement->due_date->format('M d, Y') }}</span>
                        @endif
                    </div>
                </div>
                <div class="flex items-center gap-2 ml-4">
                    <a href="{{ route('admin.requirements.edit', $requirement) }}" class="text-brand-primary hover:text-brand-soft" title="Edit">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </a>
                    <form action="{{ route('admin.requirements.destroy', $requirement) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this requirement?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-error hover:text-error/80" title="Delete">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div class="rounded-lg border border-border-default bg-surface-1 p-8 text-center">
        <svg class="mx-auto h-12 w-12 text-brand-primary/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
        </svg>
        <h3 class="mt-4 text-sm font-medium text-heading">No requirements yet</h3>
        <p class="mt-2 text-sm text-text-secondary">Get started by adding the first requirement.</p>
        <div class="mt-6">
            <a href="{{ route('admin.projects.requirements.create', $project) }}" class="inline-flex items-center gap-2 rounded-lg bg-brand-primary px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-brand-hover">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Add Requirement
            </a>
        </div>
    </div>
    @endif
</div>

