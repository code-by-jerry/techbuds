@extends('admin.layouts.tailadmin')

@section('title', 'Edit Role')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div>
        <h2 class="text-2xl font-bold text-[#11224E]">Edit Role</h2>
        <p class="text-sm text-[#088395]/70 mt-1">Update role permissions</p>
    </div>

    <!-- Form -->
    <div class="rounded-xl border border-[#088395]/20 bg-white p-6 shadow-sm">
        <form method="POST" action="{{ route('admin.roles.update', $role) }}" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Role Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-[#11224E] mb-2">Role Name</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name', $role->name) }}"
                    required
                    class="w-full rounded-lg border border-[#088395]/20 bg-white px-4 py-2.5 text-sm text-[#11224E] focus:ring-2 focus:ring-[#088395]/20 focus:border-[#088395] focus:outline-none transition-all"
                />
                @error('name')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Permissions -->
            <div>
                <label class="block text-sm font-medium text-[#11224E] mb-4">Permissions</label>
                <p class="text-xs text-[#088395]/70 mb-4">Select the permissions this role should have for each module</p>

                <div class="space-y-6">
                    @foreach($modules as $module => $actions)
                    <div class="rounded-lg border border-[#088395]/10 bg-[#088395]/5 p-4">
                        <h4 class="text-sm font-semibold text-[#11224E] mb-3 uppercase">{{ ucfirst(str_replace('-', ' ', $module)) }}</h4>
                        <div class="grid grid-cols-2 gap-3 sm:grid-cols-4">
                            @foreach($actions as $action)
                                @php
                                    $permission = $allPermissions[$module][$action] ?? null;
                                    $permissionName = "{$module}.{$action}";
                                    $isChecked = in_array($permission->id ?? null, $rolePermissions) || (old('permissions') && in_array($permission->id ?? null, old('permissions')));
                                @endphp
                                @if($permission)
                                <label class="flex items-center gap-2 p-2 rounded-lg border border-[#088395]/20 bg-white hover:bg-[#088395]/5 cursor-pointer transition-colors">
                                    <input
                                        type="checkbox"
                                        name="permissions[]"
                                        value="{{ $permission->id }}"
                                        {{ $isChecked ? 'checked' : '' }}
                                        class="rounded border-[#088395]/30 text-[#088395] focus:ring-[#088395]"
                                    />
                                    <span class="text-sm text-[#11224E]">{{ ucfirst($action) }}</span>
                                </label>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>

                @error('permissions')
                    <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end gap-3 pt-4 border-t border-[#088395]/10">
                <a
                    href="{{ route('admin.roles.index') }}"
                    class="inline-flex items-center gap-2 rounded-lg border border-[#088395]/20 px-6 py-2.5 text-sm font-medium text-[#11224E] transition-colors hover:bg-[#088395]/5"
                >
                    Cancel
                </a>
                <button
                    type="submit"
                    class="inline-flex items-center gap-2 rounded-lg bg-[#088395] px-6 py-2.5 text-sm font-medium text-white transition-colors hover:bg-[#37B7C3]"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Update Role
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

