<div class="space-y-4">
    <!-- Header with Add Button -->
    <div class="flex items-center justify-between">
        <h4 class="text-lg font-semibold text-heading">Communication Log</h4>
        <a href="{{ route('admin.projects.project-updates.create', $project) }}" class="inline-flex items-center gap-2 rounded-lg bg-brand-primary px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-brand-hover">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Add Update
        </a>
    </div>

    <!-- Communication Log -->
    @if($project->projectUpdates->count() > 0)
    <div class="space-y-4">
        @foreach($project->projectUpdates as $update)
        <div class="rounded-lg border border-border-default bg-surface-1 p-4 {{ $update->is_important ? 'border-orange-300 bg-warning/10/30' : '' }}">
            <div class="flex items-start justify-between">
                <div class="flex-1">
                    <div class="flex items-center gap-3 mb-2">
                        @php
                            $typeColors = [
                                'client_message' => 'bg-brand-primary text-white',
                                'internal_note' => 'bg-surface-2 text-text-secondary',
                                'change_request' => 'bg-warning/10 text-warning',
                                'meeting_note' => 'bg-brand-soft/10 text-brand-soft',
                                'decision' => 'bg-green-500/10 text-success',
                            ];
                            $typeColor = $typeColors[$update->type] ?? 'bg-surface-2 text-text-secondary';
                        @endphp
                        <span class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium {{ $typeColor }}">
                            {{ ucfirst(str_replace('_', ' ', $update->type)) }}
                        </span>
                        @if($update->is_important)
                        <span class="inline-flex items-center gap-1 rounded-full bg-orange-100 px-2.5 py-0.5 text-xs font-medium text-orange-700">
                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                            Important
                        </span>
                        @endif
                        <span class="text-xs text-text-secondary">
                            {{ $update->createdBy->name }} • {{ $update->created_at->format('M d, Y h:i A') }}
                        </span>
                    </div>
                    <p class="text-sm text-heading whitespace-pre-wrap">{{ $update->message }}</p>
                    @if($update->attachments && count($update->attachments) > 0)
                    <div class="mt-3 flex flex-wrap gap-2">
                        @foreach($update->attachments as $index => $attachment)
                            <a href="{{ route('admin.project-updates.download-attachment', [$update, $index]) }}" class="inline-flex items-center gap-1 rounded-lg border border-border-default bg-surface-1 px-3 py-1.5 text-xs text-brand-primary hover:bg-brand-primary/5 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                            </svg>
                            {{ $attachment['name'] ?? 'Attachment' }}
                        </a>
                        @endforeach
                    </div>
                    @endif
                </div>
                <div class="flex items-center gap-2 ml-4">
                    <a href="{{ route('admin.project-updates.edit', $update) }}" class="text-brand-primary hover:text-brand-soft" title="Edit">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </a>
                    <form action="{{ route('admin.project-updates.destroy', $update) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this update?');">
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
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
        </svg>
        <h3 class="mt-4 text-sm font-medium text-heading">No communication updates yet</h3>
        <p class="mt-2 text-sm text-text-secondary">Start tracking project communication by adding the first update.</p>
        <div class="mt-6">
            <a href="{{ route('admin.projects.project-updates.create', $project) }}" class="inline-flex items-center gap-2 rounded-lg bg-brand-primary px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-brand-hover">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Add Update
            </a>
        </div>
    </div>
    @endif
</div>

