@extends('admin.layouts.tailadmin')

@section('title', 'Template Categories')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h2 class="text-2xl font-bold text-heading">Template Categories</h2>
            <p class="text-sm text-brand-primary/70 mt-1">Organise reusable assets by category.</p>
        </div>
        <a href="{{ route('admin.template-categories.create') }}" class="inline-flex items-center gap-2 rounded-lg bg-brand-primary px-4 py-2.5 text-sm font-medium text-white hover:bg-[var(--brand-soft)] transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            New Category
        </a>
    </div>

    @if(session('success'))
        <div class="rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-800">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="rounded-xl border border-border-default bg-surface-1 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-[var(--brand-primary)]/15">
                <thead class="bg-brand-primary/5">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-brand-primary">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-brand-primary">Description</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-brand-primary">Status</th>
                        <th class="px-6 py-3 text-right text-xs font-semibold uppercase tracking-wider text-brand-primary">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[var(--brand-primary)]/10">
                    @forelse($categories as $category)
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-heading">{{ $category->name }}</td>
                            <td class="px-6 py-4 text-sm text-brand-primary/70">{{ Str::limit($category->description, 80) }}</td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-3 py-1 text-xs font-medium rounded-full {{ $category->is_active ? 'bg-green-50 text-green-700' : 'bg-surface-2 text-text-secondary' }}">
                                    {{ $category->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="inline-flex items-center gap-2">
                                    <a href="{{ route('admin.template-categories.edit', $category) }}" class="p-2 rounded-lg text-brand-primary hover:bg-brand-primary/10" title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>
                                    <form action="{{ route('admin.template-categories.destroy', $category) }}" method="POST" onsubmit="return confirm('Delete this category?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 rounded-lg text-red-600 hover:bg-red-50" title="Delete">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-8 text-center text-sm text-brand-primary/70">
                                No categories found. Create your first category.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="px-6 py-4 border-t border-border-default">
            {{ $categories->links() }}
        </div>
    </div>
</div>
@endsection

