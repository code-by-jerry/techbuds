@extends('admin.layouts.tailadmin')

@section('title', 'View Tool Category')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold text-heading">{{ $toolCategory->name }}</h2>
            <p class="text-sm text-text-secondary mt-1">Category details and links</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.tool-categories.edit', $toolCategory) }}" class="inline-flex items-center gap-2 rounded-lg border border-border-default px-4 py-2 text-sm font-medium text-brand-primary transition-colors hover:bg-brand-primary/5">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
                Edit
            </a>
            <a href="{{ route('admin.tool-categories.index') }}" class="inline-flex items-center gap-2 rounded-lg border border-border-default px-4 py-2 text-sm font-medium text-brand-primary transition-colors hover:bg-brand-primary/5">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
                Back
            </a>
        </div>
    </div>

    <!-- Category Info -->
    <div class="rounded-2xl border border-border-default bg-surface-1 p-6 shadow-sm">
        <h3 class="mb-4 text-lg font-semibold text-heading">Category Information</h3>
        <div class="space-y-3">
            <div>
                <span class="text-xs font-medium text-text-secondary uppercase">Name</span>
                <p class="mt-1 text-sm text-heading">{{ $toolCategory->name }}</p>
            </div>
            <div>
                <span class="text-xs font-medium text-text-secondary uppercase">Slug</span>
                <p class="mt-1 text-sm text-heading"><code class="bg-brand-primary/5 px-2 py-1 rounded">{{ $toolCategory->slug }}</code></p>
            </div>
            @if($toolCategory->description)
            <div>
                <span class="text-xs font-medium text-text-secondary uppercase">Description</span>
                <p class="mt-1 text-sm text-heading">{{ $toolCategory->description }}</p>
            </div>
            @endif
            <div class="grid grid-cols-3 gap-4">
                <div>
                    <span class="text-xs font-medium text-text-secondary uppercase">Order</span>
                    <p class="mt-1 text-sm text-heading">{{ $toolCategory->order }}</p>
                </div>
                <div>
                    <span class="text-xs font-medium text-text-secondary uppercase">Status</span>
                    <p class="mt-1">
                        @if($toolCategory->is_active)
                        <span class="inline-flex items-center gap-1 rounded-full bg-green-500/10 px-2.5 py-0.5 text-xs font-medium text-success">Active</span>
                        @else
                        <span class="inline-flex items-center gap-1 rounded-full bg-surface-2 px-2.5 py-0.5 text-xs font-medium text-text-secondary">Inactive</span>
                        @endif
                    </p>
                </div>
                <div>
                    <span class="text-xs font-medium text-text-secondary uppercase">Links</span>
                    <p class="mt-1 text-sm text-heading">{{ $toolCategory->allLinks->count() }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Links -->
    <div class="rounded-2xl border border-border-default bg-surface-1 p-6 shadow-sm">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold text-heading">Links</h3>
            <a href="{{ route('admin.tool-links.create', ['category_id' => $toolCategory->id]) }}" class="inline-flex items-center gap-2 rounded-lg bg-brand-primary px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-brand-hover">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Add Link
            </a>
        </div>

        @if($toolCategory->allLinks->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-brand-primary/5">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-heading">Title</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-heading">URL</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-heading">Order</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-heading">Status</th>
                            <th class="px-4 py-3 text-right text-xs font-semibold uppercase tracking-wider text-heading">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[var(--brand-primary)]/10">
                        @foreach($toolCategory->allLinks as $link)
                        <tr class="hover:bg-brand-primary/2 transition-colors">
                            <td class="px-4 py-3">
                                <div class="font-medium text-sm text-heading">{{ $link->title }}</div>
                                @if($link->description)
                                    <div class="text-xs text-text-secondary mt-1">{{ Str::limit($link->description, 50) }}</div>
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                <a href="{{ $link->url }}" target="_blank" class="text-xs text-brand-primary hover:text-brand-soft truncate max-w-xs block">
                                    {{ Str::limit($link->url, 40) }}
                                </a>
                            </td>
                            <td class="px-4 py-3 text-sm text-heading">{{ $link->order }}</td>
                            <td class="px-4 py-3">
                                @if($link->is_active)
                                <span class="inline-flex items-center gap-1 rounded-full bg-green-500/10 px-2.5 py-0.5 text-xs font-medium text-success">Active</span>
                                @else
                                <span class="inline-flex items-center gap-1 rounded-full bg-surface-2 px-2.5 py-0.5 text-xs font-medium text-text-secondary">Inactive</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.tool-links.edit', $link) }}" class="text-brand-primary hover:text-brand-soft">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>
                                    <form action="{{ route('admin.tool-links.destroy', $link) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this link?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-error hover:text-error/80">
                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="text-center py-8">
                <p class="text-sm text-text-secondary">No links in this category yet.</p>
                <a href="{{ route('admin.tool-links.create', ['category_id' => $toolCategory->id]) }}" class="mt-4 inline-flex items-center gap-2 rounded-lg bg-brand-primary px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-brand-hover">
                    Add First Link
                </a>
            </div>
        @endif
    </div>
</div>
@endsection

