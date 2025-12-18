@extends('admin.layouts.tailadmin')

@section('title', 'Tool Links')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h2 class="text-2xl font-bold text-heading">Tool Links</h2>
            <p class="text-sm text-text-secondary mt-1">Manage devtools links</p>
        </div>
        <a href="{{ route('admin.tool-links.create') }}" class="inline-flex items-center gap-2 rounded-lg bg-brand-primary px-4 py-2.5 text-sm font-medium text-white transition-colors hover:bg-brand-hover">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Create New Link
        </a>
    </div>

    <!-- Success/Error Messages -->
    @if(session('success'))
    <div class="rounded-lg border border-green-500/20 bg-green-500/10 px-4 py-3 text-sm text-success">
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

    <!-- Filters -->
    <div class="rounded-2xl border border-border-default bg-surface-1 p-4 shadow-sm">
        <form method="GET" action="{{ route('admin.tool-links.index') }}" class="flex flex-col gap-4 sm:flex-row sm:items-end">
            <div class="flex-1 sm:max-w-xs">
                <label class="mb-1 block text-xs font-medium text-heading">Filter by Category</label>
                <select
                    name="category_id"
                    onchange="this.form.submit()"
                    class="w-full rounded-lg border border-border-default bg-surface-2 px-3 py-2 text-sm text-heading focus:border-brand-primary focus:outline-none focus:ring-2 focus:ring-brand-primary/20"
                >
                    <option value="">All Categories</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            @if(request('category_id'))
            <div>
                <a href="{{ route('admin.tool-links.index') }}" class="inline-block rounded-lg border border-border-default px-4 py-2 text-sm font-medium text-brand-primary transition-colors hover:bg-brand-primary/5">
                    Clear Filter
                </a>
            </div>
            @endif
        </form>
    </div>

    <!-- Links Table -->
    <div class="overflow-hidden rounded-2xl border border-border-default bg-surface-1 shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-brand-primary/5">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-heading">Title</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-heading">Category</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-heading">URL</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-heading">Order</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-heading">Status</th>
                        <th class="px-6 py-3 text-right text-xs font-semibold uppercase tracking-wider text-heading">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[var(--brand-primary)]/10 bg-surface-1">
                    @forelse($links as $link)
                    <tr class="hover:bg-brand-primary/2 transition-colors">
                        <td class="px-6 py-4">
                            <div class="font-medium text-heading">{{ $link->title }}</div>
                            @if($link->description)
                                <div class="text-xs text-text-secondary mt-1">{{ Str::limit($link->description, 60) }}</div>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            @if($link->category)
                                <span class="inline-flex items-center rounded-full bg-brand-primary/20 px-2.5 py-0.5 text-xs font-medium text-brand-soft">
                                    {{ $link->category->name }}
                                </span>
                            @else
                                <span class="inline-flex items-center rounded-full bg-surface-2 px-2.5 py-0.5 text-xs font-medium text-text-secondary">
                                    No Category
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ $link->url }}" target="_blank" class="text-sm text-brand-primary hover:text-brand-soft truncate max-w-xs block">
                                {{ Str::limit($link->url, 40) }}
                            </a>
                        </td>
                        <td class="px-6 py-4 text-sm text-heading">
                            {{ $link->order }}
                        </td>
                        <td class="px-6 py-4">
                            @if($link->is_active)
                            <span class="inline-flex items-center gap-1 rounded-full bg-green-500/10 px-2.5 py-0.5 text-xs font-medium text-success">
                                <svg class="h-3 w-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                Active
                            </span>
                            @else
                            <span class="inline-flex items-center gap-1 rounded-full bg-surface-2 px-2.5 py-0.5 text-xs font-medium text-text-secondary">
                                Inactive
                            </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right text-sm font-medium">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ $link->url }}" target="_blank" class="text-brand-primary hover:text-brand-soft" title="View">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                    </svg>
                                </a>
                                <a href="{{ route('admin.tool-links.edit', $link) }}" class="text-brand-primary hover:text-brand-soft" title="Edit">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>
                                <form action="{{ route('admin.tool-links.destroy', $link) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this link?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-error hover:text-error/80" title="Delete">
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
                        <td colspan="6" class="px-6 py-12 text-center">
                            <div class="mx-auto max-w-sm">
                                <svg class="mx-auto h-12 w-12 text-brand-primary/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                                </svg>
                                <h3 class="mt-4 text-sm font-medium text-heading">No links found</h3>
                                <p class="mt-2 text-sm text-text-secondary">Get started by creating a new link.</p>
                                <div class="mt-6">
                                    <a href="{{ route('admin.tool-links.create') }}" class="inline-flex items-center gap-2 rounded-lg bg-brand-primary px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-brand-hover">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                        </svg>
                                        Create New Link
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
        @if($links->hasPages())
        <div class="border-t border-border-default px-6 py-4">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <div class="text-sm text-text-secondary">
                    Showing {{ $links->firstItem() ?? 0 }} to {{ $links->lastItem() ?? 0 }} of {{ $links->total() }} results
                </div>
                <div class="flex items-center gap-2">
                    @if($links->onFirstPage())
                    <span class="rounded-lg border border-border-default px-3 py-1.5 text-sm text-brand-primary/40 cursor-not-allowed">Previous</span>
                    @else
                    <a href="{{ $links->previousPageUrl() }}" class="rounded-lg border border-border-default px-3 py-1.5 text-sm text-brand-primary transition-colors hover:bg-brand-primary/5">Previous</a>
                    @endif

                    @php
                        $currentPage = $links->currentPage();
                        $lastPage = $links->lastPage();
                        $startPage = max(1, $currentPage - 2);
                        $endPage = min($lastPage, $currentPage + 2);
                    @endphp

                    @for($page = $startPage; $page <= $endPage; $page++)
                        @if($page == $currentPage)
                        <span class="rounded-lg bg-brand-primary px-3 py-1.5 text-sm font-medium text-white">{{ $page }}</span>
                        @else
                        <a href="{{ $links->url($page) }}" class="rounded-lg border border-border-default px-3 py-1.5 text-sm text-brand-primary transition-colors hover:bg-brand-primary/5">{{ $page }}</a>
                        @endif
                    @endfor

                    @if($links->hasMorePages())
                    <a href="{{ $links->nextPageUrl() }}" class="rounded-lg border border-border-default px-3 py-1.5 text-sm text-brand-primary transition-colors hover:bg-brand-primary/5">Next</a>
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

