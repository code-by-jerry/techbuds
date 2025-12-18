@extends('admin.layouts.tailadmin')

@section('title', 'User Roles and Actions')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h2 class="text-2xl font-bold text-heading">User Roles and Actions</h2>
            <p class="text-sm text-text-secondary mt-1">Manage roles and their permissions for admin users</p>
        </div>
        <a href="{{ route('admin.roles.create') }}" class="inline-flex items-center gap-2 rounded-lg bg-brand-primary px-4 py-2.5 text-sm font-medium text-white transition-colors hover:bg-brand-hover">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Create New Role
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

    <!-- Roles Grid -->
    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
        @forelse($roles as $role)
        <div class="rounded-xl border border-border-default bg-surface-1 p-6 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-start justify-between mb-4">
                <div>
                    <h3 class="text-lg font-semibold text-heading">{{ $role->name }}</h3>
                    <p class="text-xs text-text-secondary mt-1">
                        @php
                            $userCount = \App\Models\Admin::role($role->name)->count();
                        @endphp
                        {{ $userCount }} {{ Str::plural('user', $userCount) }}
                    </p>
                </div>
                @if($role->name !== 'Super Admin')
                <div class="flex items-center gap-2">
                    <a
                        href="{{ route('admin.roles.edit', $role) }}"
                        class="p-1.5 rounded-lg text-brand-primary hover:bg-brand-primary/10 transition-colors"
                        title="Edit"
                    >
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </a>
                    <form action="{{ route('admin.roles.destroy', $role) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this role?');">
                        @csrf
                        @method('DELETE')
                        <button
                            type="submit"
                            class="p-1.5 rounded-lg text-error hover:bg-error/10 transition-colors"
                            title="Delete"
                        >
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </form>
                </div>
                @endif
            </div>

            <!-- Permissions List -->
            <div class="space-y-3">
                @foreach($modules as $module => $actions)
                <div class="border-t border-border-default pt-3 first:border-t-0 first:pt-0">
                    <h4 class="text-xs font-semibold text-heading uppercase mb-2">{{ ucfirst(str_replace('-', ' ', $module)) }}</h4>
                    <div class="flex flex-wrap gap-2">
                        @foreach($actions as $action)
                            @php
                                $permissionName = "{$module}.{$action}";
                                $hasPermission = $role->permissions->contains('name', $permissionName);
                            @endphp
                            <span class="inline-flex items-center gap-1 px-2 py-1 rounded text-xs {{ $hasPermission ? 'bg-green-100 text-success' : 'bg-surface-2 text-text-muted' }}">
                                @if($hasPermission)
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                @else
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                @endif
                                {{ ucfirst($action) }}
                            </span>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @empty
        <div class="col-span-full rounded-xl border border-border-default bg-surface-1 p-8 text-center">
            <p class="text-sm text-text-secondary">No roles found. Create your first role to get started.</p>
        </div>
        @endforelse
    </div>
</div>
@endsection

