@extends('admin.layouts.tailadmin')

@section('title', 'Projects')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h2 class="text-2xl font-bold text-heading">Projects</h2>
            <p class="text-sm text-text-secondary mt-1">Manage your projects and track progress</p>
        </div>
        <a href="{{ route('admin.projects.create') }}" class="inline-flex items-center gap-2 rounded-lg bg-brand-primary px-4 py-2.5 text-sm font-medium text-white transition-colors hover:bg-brand-hover">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            New Project
        </a>
    </div>

    <!-- Success/Error Messages -->
    @if(session('success'))
    <div class="rounded-lg border border-green-500/20 bg-green-500/10 px-4 py-3 text-sm text-success">
        {{ session('success') }}
    </div>
    @endif

    <!-- Filters and Search -->
    <div class="rounded-2xl border border-border-default bg-surface-1 p-4 shadow-sm">
        <form method="GET" action="{{ route('admin.projects.index') }}" class="flex flex-col gap-4 sm:flex-row sm:items-end">
            <div class="flex-1">
                <label class="mb-1 block text-xs font-medium text-heading">Search</label>
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Search by title, description, or client..."
                    class="w-full rounded-lg border border-border-default bg-surface-2 px-3 py-2 text-sm text-heading focus:border-brand-primary focus:outline-none focus:ring-2 focus:ring-brand-primary/20"
                />
            </div>
            <div class="sm:w-48">
                <label class="mb-1 block text-xs font-medium text-heading">Status</label>
                <select name="status" class="w-full rounded-lg border border-border-default bg-surface-2 px-3 py-2 text-sm text-heading focus:border-brand-primary focus:outline-none focus:ring-2 focus:ring-brand-primary/20">
                    <option value="">All Status</option>
                    @foreach($statuses as $status)
                    <option value="{{ $status }}" {{ request('status') === $status ? 'selected' : '' }}>
                        {{ ucfirst(str_replace('_', ' ', $status)) }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="sm:w-48">
                <label class="mb-1 block text-xs font-medium text-heading">Client</label>
                <select name="client_id" class="w-full rounded-lg border border-border-default bg-surface-2 px-3 py-2 text-sm text-heading focus:border-brand-primary focus:outline-none focus:ring-2 focus:ring-brand-primary/20">
                    <option value="">All Clients</option>
                    @foreach($clients as $client)
                    <option value="{{ $client->id }}" {{ request('client_id') == $client->id ? 'selected' : '' }}>
                        {{ $client->name }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div>
                <button type="submit" class="rounded-lg bg-brand-primary px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-brand-hover">
                    Filter
                </button>
            </div>
            @if(request('search') || request('status') || request('client_id'))
            <div>
                <a href="{{ route('admin.projects.index') }}" class="inline-block rounded-lg border border-border-default px-4 py-2 text-sm font-medium text-brand-primary transition-colors hover:bg-brand-primary/5">
                    Clear
                </a>
            </div>
            @endif
        </form>
    </div>

    <!-- Projects Table -->
    <div class="overflow-hidden rounded-2xl border border-border-default bg-surface-1 shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-brand-primary/5">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-heading">Project</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-heading">Client</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-heading">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-heading">Progress</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-heading">Assigned To</th>
                        <th class="px-6 py-3 text-right text-xs font-semibold uppercase tracking-wider text-heading">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[var(--brand-primary)]/10 bg-surface-1">
                    @forelse($projects as $project)
                    <tr class="hover:bg-brand-primary/2 transition-colors">
                        <td class="px-6 py-4">
                            <div class="font-medium text-heading">{{ $project->title }}</div>
                            @if($project->description)
                            <div class="text-xs text-text-secondary mt-1">{{ Str::limit($project->description, 60) }}</div>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('admin.clients.show', $project->client) }}" class="text-sm text-brand-primary hover:text-brand-soft">
                                {{ $project->client->name }}
                            </a>
                        </td>
                        <td class="px-6 py-4">
                            @php
                                $statusColors = [
                                    'planning' => 'bg-surface-2 text-text-secondary',
                                    'ui_ux' => 'bg-warning/10 text-warning',
                                    'development' => 'bg-brand-primary text-white',
                                    'testing' => 'bg-warning/10 text-warning',
                                    'deployment' => 'bg-brand-soft/10 text-brand-soft',
                                    'handover' => 'bg-info/10 text-info',
                                    'maintenance' => 'bg-green-500/10 text-success',
                                    'completed' => 'bg-surface-2 text-text-secondary',
                                    'cancelled' => 'bg-error/10 text-error',
                                ];
                                $color = $statusColors[$project->status] ?? 'bg-surface-2 text-text-secondary';
                            @endphp
                            <span class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium {{ $color }}">
                                {{ ucfirst(str_replace('_', ' ', $project->status)) }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <div class="flex-1 h-2 bg-brand-primary/10 rounded-full overflow-hidden">
                                    <div class="h-full bg-brand-primary rounded-full" style="width: {{ $project->progress_percentage }}%"></div>
                                </div>
                                <span class="text-xs font-medium text-heading">{{ $project->progress_percentage }}%</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-sm text-heading">
                            {{ $project->assignedTo ? $project->assignedTo->name : 'Unassigned' }}
                        </td>
                        <td class="px-6 py-4 text-right text-sm font-medium">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.projects.show', $project) }}" class="text-brand-primary hover:text-brand-soft" title="View">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </a>
                                <a href="{{ route('admin.projects.edit', $project) }}" class="text-brand-primary hover:text-brand-soft" title="Edit">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center">
                            <div class="mx-auto max-w-sm">
                                <svg class="mx-auto h-12 w-12 text-brand-primary/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                                <h3 class="mt-4 text-sm font-medium text-heading">No projects found</h3>
                                <p class="mt-2 text-sm text-text-secondary">Get started by creating a new project.</p>
                                <div class="mt-6">
                                    <a href="{{ route('admin.projects.create') }}" class="inline-flex items-center gap-2 rounded-lg bg-brand-primary px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-brand-hover">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                        </svg>
                                        New Project
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($projects->hasPages())
        <div class="border-t border-border-default px-6 py-4">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <div class="text-sm text-text-secondary">
                    Showing {{ $projects->firstItem() ?? 0 }} to {{ $projects->lastItem() ?? 0 }} of {{ $projects->total() }} results
                </div>
                <div class="flex items-center gap-2">
                    @if($projects->onFirstPage())
                    <span class="rounded-lg border border-border-default px-3 py-1.5 text-sm text-brand-primary/40 cursor-not-allowed">Previous</span>
                    @else
                    <a href="{{ $projects->appends(request()->query())->previousPageUrl() }}" class="rounded-lg border border-border-default px-3 py-1.5 text-sm text-brand-primary transition-colors hover:bg-brand-primary/5">Previous</a>
                    @endif

                    @php
                        $currentPage = $projects->currentPage();
                        $lastPage = $projects->lastPage();
                        $startPage = max(1, $currentPage - 2);
                        $endPage = min($lastPage, $currentPage + 2);
                    @endphp

                    @for($page = $startPage; $page <= $endPage; $page++)
                        @if($page == $currentPage)
                        <span class="rounded-lg bg-brand-primary px-3 py-1.5 text-sm font-medium text-white">{{ $page }}</span>
                        @else
                        <a href="{{ $projects->appends(request()->query())->url($page) }}" class="rounded-lg border border-border-default px-3 py-1.5 text-sm text-brand-primary transition-colors hover:bg-brand-primary/5">{{ $page }}</a>
                        @endif
                    @endfor

                    @if($projects->hasMorePages())
                    <a href="{{ $projects->appends(request()->query())->nextPageUrl() }}" class="rounded-lg border border-border-default px-3 py-1.5 text-sm text-brand-primary transition-colors hover:bg-brand-primary/5">Next</a>
                    @else
                    <span class="rounded-lg border border-border-default px-3 py-1.5 text-sm text-brand-primary/40 cursor-not-allowed">Next</span>
                    @endif
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection

