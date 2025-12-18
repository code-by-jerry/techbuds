@extends('admin.layouts.tailadmin')

@section('title', 'Admins')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h2 class="text-2xl font-bold text-heading">Admin Management</h2>
            <p class="text-sm text-text-secondary mt-1">Manage admin users and their permissions</p>
        </div>
        <a href="{{ route('admin.admins.create') }}" class="inline-flex items-center gap-2 rounded-lg bg-brand-primary px-4 py-2.5 text-sm font-medium text-white transition-colors hover:bg-brand-hover">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Create New Admin
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

    <!-- Filters and Search -->
    <div class="rounded-2xl border border-border-default bg-surface-1 p-4 shadow-sm">
        <form method="GET" action="{{ route('admin.admins.index') }}" class="flex flex-col gap-4 sm:flex-row sm:items-end">
            <!-- Search -->
            <div class="flex-1">
                <label class="mb-1 block text-xs font-medium text-heading">Search</label>
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Search by name or email..."
                    class="w-full rounded-lg border border-border-default bg-surface-2 px-3 py-2 text-sm text-heading focus:border-brand-primary focus:outline-none focus:ring-2 focus:ring-brand-primary/20"
                />
            </div>

            <!-- Status Filter -->
            <div>
                <label class="mb-1 block text-xs font-medium text-heading">Status</label>
                <select
                    name="status"
                    class="rounded-lg border border-border-default bg-surface-2 px-3 py-2 text-sm text-heading focus:border-brand-primary focus:outline-none focus:ring-2 focus:ring-brand-primary/20"
                >
                    <option value="">All Status</option>
                    <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ request('status') === 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <!-- Filter Button -->
            <button
                type="submit"
                class="inline-flex items-center gap-2 rounded-lg bg-brand-primary px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-brand-hover"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                </svg>
                Filter
            </button>
        </form>
    </div>

    <!-- Admins Table -->
    <div class="rounded-2xl border border-border-default bg-surface-1 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-brand-primary/5">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase text-heading">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase text-heading">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase text-heading">Role</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase text-heading">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase text-heading">Created</th>
                        <th class="px-6 py-3 text-right text-xs font-semibold uppercase text-heading">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[var(--brand-primary)]/10">
                    @forelse($admins as $admin)
                    <tr class="hover:bg-brand-primary/2 transition-colors">
                        <td class="px-6 py-4 text-sm text-heading">
                            <div class="flex items-center gap-3">
                                <span class="h-10 w-10 rounded-full bg-gradient-to-br from-brand-primary to-brand-hover flex items-center justify-center text-white font-semibold text-sm">
                                    {{ strtoupper(substr($admin->name, 0, 1)) }}
                                </span>
                                <span class="font-medium">{{ $admin->name }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-sm text-heading">{{ $admin->email }}</td>
                        <td class="px-6 py-4 text-sm text-heading">
                            @if($admin->roles->count() > 0)
                                <span class="inline-flex items-center rounded-full bg-brand-primary/20 px-2.5 py-0.5 text-xs font-medium text-brand-soft">
                                    {{ $admin->roles->first()->name }}
                                </span>
                            @else
                                <span class="text-text-muted">No role</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-sm">
                            @if($admin->status)
                                <span class="inline-flex items-center rounded-full bg-green-100 px-2.5 py-0.5 text-xs font-medium text-success">Active</span>
                            @else
                                <span class="inline-flex items-center rounded-full bg-red-100 px-2.5 py-0.5 text-xs font-medium text-error">Inactive</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-sm text-text-secondary">{{ $admin->created_at->format('M d, Y') }}</td>
                        <td class="px-6 py-4 text-sm text-right">
                            <div class="flex items-center justify-end gap-2">
                                @if($admin->email !== 'admin@techbuds.online')
                                    <form action="{{ route('admin.admins.toggle-status', $admin) }}" method="POST" class="inline">
                                        @csrf
                                        <button
                                            type="submit"
                                            class="p-2 rounded-lg text-brand-primary hover:bg-brand-primary/10 transition-colors"
                                            title="{{ $admin->status ? 'Deactivate' : 'Activate' }}"
                                        >
                                            @if($admin->status)
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                                                </svg>
                                            @else
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            @endif
                                        </button>
                                    </form>
                                    <a
                                        href="{{ route('admin.admins.edit', $admin) }}"
                                        class="p-2 rounded-lg text-brand-primary hover:bg-brand-primary/10 transition-colors"
                                        title="Edit"
                                    >
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>
                                    <form action="{{ route('admin.admins.destroy', $admin) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this admin?');">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            type="submit"
                                            class="p-2 rounded-lg text-error hover:bg-error/10 transition-colors"
                                            title="Delete"
                                        >
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                @else
                                    <span class="text-xs text-text-muted">Super Admin</span>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-8 text-center text-sm text-text-secondary">
                            No admins found.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($admins->hasPages())
        <div class="border-t border-border-default px-6 py-4">
            {{ $admins->links() }}
        </div>
        @endif
    </div>
</div>
@endsection

