<div class="space-y-4">
    <!-- Header with Add Button -->
    <div class="flex items-center justify-between">
        <h4 class="text-lg font-semibold text-heading">Tasks</h4>
        <a href="{{ route('admin.projects.tasks.create', $project) }}" class="inline-flex items-center gap-2 rounded-lg bg-brand-primary px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-brand-hover">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Add Task
        </a>
    </div>

    <!-- Tasks List -->
    @if($project->tasks->count() > 0)
    <div class="space-y-3">
        @foreach($project->tasks->sortBy('order') as $task)
        <div class="rounded-lg border border-border-default bg-surface-1 p-4 hover:bg-brand-primary/2 transition-colors">
            <div class="flex items-start justify-between">
                <div class="flex-1">
                    <div class="flex items-center gap-3">
                        <h5 class="font-medium text-heading">{{ $task->title }}</h5>
                        @php
                            $statusColors = [
                                'todo' => 'bg-surface-2 text-text-secondary',
                                'in_progress' => 'bg-brand-primary text-white',
                                'review' => 'bg-warning/10 text-warning',
                                'completed' => 'bg-green-500/10 text-success',
                                'blocked' => 'bg-error/10 text-error',
                                'overdue' => 'bg-red-100 text-red-700',
                            ];
                            $statusColor = $statusColors[$task->status] ?? 'bg-surface-2 text-text-secondary';
                        @endphp
                        <span class="inline-flex items-center rounded-full px-2 py-0.5 text-xs font-medium {{ $statusColor }}">
                            {{ ucfirst(str_replace('_', ' ', $task->status)) }}
                        </span>
                        @if($task->milestone)
                        <span class="inline-flex items-center gap-1 rounded-full bg-brand-soft/10 px-2 py-0.5 text-xs font-medium text-brand-soft">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            {{ $task->milestone->title }}
                        </span>
                        @endif
                    </div>
                    @if($task->description)
                    <p class="text-sm text-text-secondary mt-2">{{ Str::limit($task->description, 150) }}</p>
                    @endif
                    <div class="flex items-center gap-4 mt-3 text-xs text-text-secondary">
                        @if($task->assignedTo)
                        <span>Assigned to: <strong>{{ $task->assignedTo->name }}</strong></span>
                        @endif
                        @if($task->due_date)
                        <span>Due: {{ $task->due_date->format('M d, Y') }}</span>
                        @endif
                        @if($task->progress_percentage > 0)
                        <span>Progress: {{ $task->progress_percentage }}%</span>
                        @endif
                        @if($task->priority > 0)
                        <span class="flex items-center gap-1">
                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            Priority: {{ $task->priority }}
                        </span>
                        @endif
                    </div>
                </div>
                <div class="flex items-center gap-2 ml-4">
                    <a href="{{ route('admin.tasks.edit', $task) }}" class="text-brand-primary hover:text-brand-soft" title="Edit">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </a>
                    <form action="{{ route('admin.tasks.destroy', $task) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this task?');">
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
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
        </svg>
        <h3 class="mt-4 text-sm font-medium text-heading">No tasks yet</h3>
        <p class="mt-2 text-sm text-text-secondary">Get started by adding the first task.</p>
        <div class="mt-6">
            <a href="{{ route('admin.projects.tasks.create', $project) }}" class="inline-flex items-center gap-2 rounded-lg bg-brand-primary px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-brand-hover">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Add Task
            </a>
        </div>
    </div>
    @endif
</div>

