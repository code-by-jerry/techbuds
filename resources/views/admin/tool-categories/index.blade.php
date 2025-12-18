@extends('admin.layouts.tailadmin')

@section('title', 'Tool Categories')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h2 class="text-2xl font-bold text-heading">Tool Categories</h2>
            <p class="text-sm text-text-secondary mt-1">Manage devtools categories</p>
        </div>
        <a href="{{ route('admin.tool-categories.create') }}" class="inline-flex items-center gap-2 rounded-lg bg-brand-primary px-4 py-2.5 text-sm font-medium text-white transition-colors hover:bg-brand-hover">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Create New Category
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

    <!-- Categories Table -->
    <div class="overflow-hidden rounded-2xl border border-border-default bg-surface-1 shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-brand-primary/5">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-heading">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-heading">Slug</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-heading">Order</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-heading">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-heading">Links</th>
                        <th class="px-6 py-3 text-right text-xs font-semibold uppercase tracking-wider text-heading">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[var(--brand-primary)]/10 bg-surface-1">
                    @forelse($categories as $category)
                    <tr class="hover:bg-brand-primary/2 transition-colors">
                        <td class="px-6 py-4">
                            <div class="font-medium text-heading">{{ $category->name }}</div>
                            @if($category->description)
                                <div class="text-xs text-text-secondary mt-1">{{ Str::limit($category->description, 60) }}</div>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-sm text-text-secondary">
                            <code class="text-xs bg-brand-primary/5 px-2 py-1 rounded">{{ $category->slug }}</code>
                        </td>
                        <td class="px-6 py-4 text-sm text-heading">
                            {{ $category->order }}
                        </td>
                        <td class="px-6 py-4">
                            @if($category->is_active)
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
                        <td class="px-6 py-4 text-sm text-heading">
                            <a href="{{ route('admin.tool-links.index', ['category_id' => $category->id]) }}" class="text-brand-primary hover:text-brand-soft">
                                {{ $category->allLinks->count() }} {{ Str::plural('link', $category->allLinks->count()) }}
                            </a>
                        </td>
                        <td class="px-6 py-4 text-right text-sm font-medium">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.tool-categories.show', $category) }}" class="text-brand-primary hover:text-brand-soft" title="View">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </a>
                                <a href="{{ route('admin.tool-categories.edit', $category) }}" class="text-brand-primary hover:text-brand-soft" title="Edit">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>
                                <form action="{{ route('admin.tool-categories.destroy', $category) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this category? This will also delete all associated links.');">
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
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                </svg>
                                <h3 class="mt-4 text-sm font-medium text-heading">No categories found</h3>
                                <p class="mt-2 text-sm text-text-secondary">Get started by creating a new category.</p>
                                <div class="mt-6">
                                    <a href="{{ route('admin.tool-categories.create') }}" class="inline-flex items-center gap-2 rounded-lg bg-brand-primary px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-brand-hover">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                        </svg>
                                        Create New Category
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
        @if($categories->hasPages())
        <div class="border-t border-border-default px-6 py-4">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <div class="text-sm text-text-secondary">
                    Showing {{ $categories->firstItem() ?? 0 }} to {{ $categories->lastItem() ?? 0 }} of {{ $categories->total() }} results
                </div>
                <div class="flex items-center gap-2">
                    @if($categories->onFirstPage())
                    <span class="rounded-lg border border-border-default px-3 py-1.5 text-sm text-brand-primary/40 cursor-not-allowed">Previous</span>
                    @else
                    <a href="{{ $categories->previousPageUrl() }}" class="rounded-lg border border-border-default px-3 py-1.5 text-sm text-brand-primary transition-colors hover:bg-brand-primary/5">Previous</a>
                    @endif

                    @php
                        $currentPage = $categories->currentPage();
                        $lastPage = $categories->lastPage();
                        $startPage = max(1, $currentPage - 2);
                        $endPage = min($lastPage, $currentPage + 2);
                    @endphp

                    @for($page = $startPage; $page <= $endPage; $page++)
                        @if($page == $currentPage)
                        <span class="rounded-lg bg-brand-primary px-3 py-1.5 text-sm font-medium text-white">{{ $page }}</span>
                        @else
                        <a href="{{ $categories->url($page) }}" class="rounded-lg border border-border-default px-3 py-1.5 text-sm text-brand-primary transition-colors hover:bg-brand-primary/5">{{ $page }}</a>
                        @endif
                    @endfor

                    @if($categories->hasMorePages())
                    <a href="{{ $categories->nextPageUrl() }}" class="rounded-lg border border-border-default px-3 py-1.5 text-sm text-brand-primary transition-colors hover:bg-brand-primary/5">Next</a>
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

