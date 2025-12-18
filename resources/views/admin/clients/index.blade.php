@extends('admin.layouts.tailadmin')

@section('title', 'Clients')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h2 class="text-2xl font-bold text-heading">Clients</h2>
            <p class="text-sm text-text-secondary mt-1">Manage your clients and their information</p>
        </div>
                <a href="{{ route('admin.clients.create') }}" class="inline-flex items-center gap-2 rounded-lg bg-brand-primary px-4 py-2.5 text-sm font-medium text-white transition-colors hover:bg-brand-hover shadow-lg shadow-brand-primary/25">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Add New Client
        </a>
    </div>

    <!-- Success/Error Messages -->
    @if(session('success'))
    <div class="rounded-lg border border-green-500/20 bg-green-500/100/10 px-4 py-3 text-sm text-success">
        {{ session('success') }}
    </div>
    @endif

    @if($errors->any())
    <div class="rounded-lg border border-error/20 bg-error/10 px-4 py-3 text-sm text-error">
        <ul class="list-disc list-inside">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- Filters and Search -->
    <div class="rounded-2xl border border-border-default bg-surface-1 p-4 shadow-sm">
        <form method="GET" action="{{ route('admin.clients.index') }}" class="flex flex-col gap-4 sm:flex-row sm:items-end">
            <!-- Search -->
            <div class="flex-1">
                <label class="mb-1 block text-xs font-medium text-heading">Search</label>
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Search by name, email, phone, or company..."
                    class="w-full rounded-lg border border-border-default bg-surface-2 px-3 py-2 text-sm text-text-primary placeholder:text-text-muted focus:border-brand-primary focus:outline-none focus:ring-2 focus:ring-brand-primary/20"
                />
            </div>

            <!-- Status Filter -->
            <div class="sm:w-48">
                <label class="mb-1 block text-xs font-medium text-heading">Status</label>
                <select
                    name="status"
                    class="w-full rounded-lg border border-border-default bg-surface-2 px-3 py-2 text-sm text-text-primary focus:border-brand-primary focus:outline-none focus:ring-2 focus:ring-brand-primary/20"
                >
                    <option value="">All Status</option>
                    @foreach($statuses as $status)
                    <option value="{{ $status }}" {{ request('status') === $status ? 'selected' : '' }}>
                        {{ ucfirst(str_replace('_', ' ', $status)) }}
                    </option>
                    @endforeach
                </select>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" class="rounded-lg bg-brand-primary px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-brand-hover">
                    Filter
                </button>
            </div>

            <!-- Clear Filters -->
            @if(request('search') || request('status'))
            <div>
                <a href="{{ route('admin.clients.index') }}" class="inline-block rounded-lg border border-border-default px-4 py-2 text-sm font-medium text-brand-primary transition-colors hover:bg-brand-primary/5">
                    Clear
                </a>
            </div>
            @endif
        </form>
    </div>

    <!-- Clients Table -->
    <div class="overflow-hidden rounded-2xl border border-border-default bg-surface-1 shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-brand-primary/5">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-heading">Client</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-heading">Contact</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-heading">Company</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-heading">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-heading">Projects</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-heading">Created</th>
                        <th class="px-6 py-3 text-right text-xs font-semibold uppercase tracking-wider text-heading">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border-default bg-surface-1">
                    @forelse($clients as $client)
                    <tr class="hover:bg-brand-primary/2 transition-colors">
                        <td class="px-6 py-4">
                            <div class="font-medium text-heading">{{ $client->name }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-text-secondary">
                                <a href="mailto:{{ $client->email }}" class="hover:text-brand-primary transition-colors">
                                    {{ $client->email }}
                                </a>
                            </div>
                            @if($client->phone)
                            <div class="text-xs text-text-secondary mt-1">{{ $client->phone }}</div>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-sm text-heading">
                            {{ $client->company ?? 'N/A' }}
                        </td>
                        <td class="px-6 py-4">
                            @php
                                $statusColors = [
                                    'discovery' => 'bg-surface-2 text-text-secondary',
                                    'proposal_sent' => 'bg-brand-primary text-white',
                                    'proposal_accepted' => 'bg-success/10 text-success',
                                    'onboarding' => 'bg-warning/10 text-warning',
                                    'project_started' => 'bg-brand-soft/10 text-brand-soft',
                                    'in_development' => 'bg-brand-primary text-white',
                                    'in_testing' => 'bg-warning/10 text-warning',
                                    'invoice_sent' => 'bg-warning/10 text-warning',
                                    'paid' => 'bg-success/10 text-success',
                                    'offboarding' => 'bg-info/10 text-info',
                                    'completed' => 'bg-success/10 text-success',
                                    'archived' => 'bg-surface-3 text-text-muted',
                                ];
                                $color = $statusColors[$client->status] ?? 'bg-surface-2 text-text-secondary';
                            @endphp
                            <span class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium {{ $color }}">
                                {{ ucfirst(str_replace('_', ' ', $client->status)) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-heading">
                                <a href="{{ route('admin.projects.index', ['client_id' => $client->id]) }}" class="text-brand-primary hover:text-brand-soft transition-colors">
                                {{ $client->projects->count() }} {{ Str::plural('project', $client->projects->count()) }}
                            </a>
                        </td>
                        <td class="px-6 py-4 text-sm text-text-secondary">
                            {{ $client->created_at->format('M d, Y') }}
                        </td>
                        <td class="px-6 py-4 text-right text-sm font-medium">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.clients.show', $client) }}" class="text-brand-primary hover:text-brand-soft" title="View">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </a>
                                <a href="{{ route('admin.clients.edit', $client) }}" class="text-brand-primary hover:text-brand-soft" title="Edit">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>
                                <form action="{{ route('admin.clients.destroy', $client) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this client? This will also delete all associated projects.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-error hover:text-error/80 transition-colors" title="Delete">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-6 py-12 text-center">
                            <div class="mx-auto max-w-sm">
                                <svg class="mx-auto h-12 w-12 text-brand-primary/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                <h3 class="mt-4 text-sm font-medium text-heading">No clients found</h3>
                                <p class="mt-2 text-sm text-text-secondary">Get started by creating a new client.</p>
                                <div class="mt-6">
                                    <a href="{{ route('admin.clients.create') }}" class="inline-flex items-center gap-2 rounded-lg bg-brand-primary px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-brand-hover shadow-lg shadow-brand-primary/25">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                        </svg>
                                        Add New Client
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
        @if($clients->hasPages())
        <div class="border-t border-border-default px-6 py-4">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <div class="text-sm text-text-secondary">
                    Showing {{ $clients->firstItem() ?? 0 }} to {{ $clients->lastItem() ?? 0 }} of {{ $clients->total() }} results
                </div>
                <div class="flex items-center gap-2">
                    @if($clients->onFirstPage())
                    <span class="rounded-lg border border-border-default px-3 py-1.5 text-sm text-brand-primary/40 cursor-not-allowed">Previous</span>
                    @else
                    <a href="{{ $clients->appends(request()->query())->previousPageUrl() }}" class="rounded-lg border border-border-default px-3 py-1.5 text-sm text-brand-primary transition-colors hover:bg-brand-primary/5">Previous</a>
                    @endif

                    @php
                        $currentPage = $clients->currentPage();
                        $lastPage = $clients->lastPage();
                        $startPage = max(1, $currentPage - 2);
                        $endPage = min($lastPage, $currentPage + 2);
                    @endphp

                    @for($page = $startPage; $page <= $endPage; $page++)
                        @if($page == $currentPage)
                        <span class="rounded-lg bg-brand-primary px-3 py-1.5 text-sm font-medium text-white">{{ $page }}</span>
                        @else
                        <a href="{{ $clients->appends(request()->query())->url($page) }}" class="rounded-lg border border-border-default px-3 py-1.5 text-sm text-brand-primary transition-colors hover:bg-brand-primary/5">{{ $page }}</a>
                        @endif
                    @endfor

                    @if($clients->hasMorePages())
                    <a href="{{ $clients->appends(request()->query())->nextPageUrl() }}" class="rounded-lg border border-border-default px-3 py-1.5 text-sm text-brand-primary transition-colors hover:bg-brand-primary/5">Next</a>
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

