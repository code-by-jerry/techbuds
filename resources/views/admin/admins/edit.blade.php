@extends('admin.layouts.tailadmin')

@section('title', 'Edit Admin')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div>
        <h2 class="text-2xl font-bold text-[#11224E]">Edit Admin</h2>
        <p class="text-sm text-[#088395]/70 mt-1">Update admin user information</p>
    </div>

    <!-- Form -->
    <div class="rounded-xl border border-[#088395]/20 bg-white p-6 shadow-sm">
        <form method="POST" action="{{ route('admin.admins.update', $admin) }}" class="space-y-4">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                <div>
                    <label for="name" class="block text-sm font-medium text-[#11224E] mb-2">Name</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name', $admin->name) }}"
                        required
                        class="w-full rounded-lg border border-[#088395]/20 bg-white px-4 py-2.5 text-sm text-[#11224E] focus:ring-2 focus:ring-[#088395]/20 focus:border-[#088395] focus:outline-none transition-all"
                    />
                    @error('name')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-[#11224E] mb-2">Email</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email', $admin->email) }}"
                        required
                        class="w-full rounded-lg border border-[#088395]/20 bg-white px-4 py-2.5 text-sm text-[#11224E] focus:ring-2 focus:ring-[#088395]/20 focus:border-[#088395] focus:outline-none transition-all"
                    />
                    @error('email')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-[#11224E] mb-2">New Password (Leave blank to keep current)</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="w-full rounded-lg border border-[#088395]/20 bg-white px-4 py-2.5 text-sm text-[#11224E] focus:ring-2 focus:ring-[#088395]/20 focus:border-[#088395] focus:outline-none transition-all"
                    />
                    @error('password')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-[#11224E] mb-2">Confirm New Password</label>
                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        class="w-full rounded-lg border border-[#088395]/20 bg-white px-4 py-2.5 text-sm text-[#11224E] focus:ring-2 focus:ring-[#088395]/20 focus:border-[#088395] focus:outline-none transition-all"
                    />
                </div>

                <div class="md:col-span-2">
                    <label for="role" class="block text-sm font-medium text-[#11224E] mb-2">Role</label>
                    <select
                        id="role"
                        name="role"
                        required
                        onchange="showRolePermissions(this.value)"
                        class="w-full rounded-lg border border-[#088395]/20 bg-white px-4 py-2.5 text-sm text-[#11224E] focus:ring-2 focus:ring-[#088395]/20 focus:border-[#088395] focus:outline-none transition-all"
                    >
                        <option value="">Select Role</option>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}" {{ old('role', $admin->roles->first()?->id) == $role->id ? 'selected' : '' }}>
                                {{ $role->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('role')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror

                    <!-- Role Permissions Preview -->
                    <div id="rolePermissions" class="mt-4 hidden rounded-lg border border-[#088395]/10 bg-[#088395]/5 p-4">
                        <h4 class="text-xs font-semibold text-[#11224E] mb-3 uppercase">Role Permissions</h4>
                        <div class="space-y-3">
                            @foreach($roles as $role)
                                <div id="permissions-{{ $role->id }}" class="role-permissions hidden">
                                    @foreach($modules as $module => $actions)
                                        <div class="mb-3">
                                            <h5 class="text-xs font-medium text-[#11224E] mb-2">{{ ucfirst(str_replace('-', ' ', $module)) }}</h5>
                                            <div class="flex flex-wrap gap-2">
                                                @foreach($actions as $action)
                                                    @php
                                                        $permissionName = "{$module}.{$action}";
                                                        $hasPermission = $role->permissions->contains('name', $permissionName);
                                                    @endphp
                                                    <span class="inline-flex items-center gap-1 px-2 py-1 rounded text-xs {{ $hasPermission ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-400' }}">
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
                            @endforeach
                        </div>
                    </div>
                </div>

                <div>
                    <label for="status" class="block text-sm font-medium text-[#11224E] mb-2">Status</label>
                    <select
                        id="status"
                        name="status"
                        required
                        class="w-full rounded-lg border border-[#088395]/20 bg-white px-4 py-2.5 text-sm text-[#11224E] focus:ring-2 focus:ring-[#088395]/20 focus:border-[#088395] focus:outline-none transition-all"
                    >
                        <option value="1" {{ old('status', $admin->status) == '1' ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('status', $admin->status) == '0' ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @error('status')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex justify-end gap-3 pt-4">
                <a
                    href="{{ route('admin.admins.index') }}"
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
                    Update Admin
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function showRolePermissions(roleId) {
    const permissionsDiv = document.getElementById('rolePermissions');
    const allPermissionDivs = document.querySelectorAll('.role-permissions');
    
    // Hide all permission divs
    allPermissionDivs.forEach(div => {
        div.classList.add('hidden');
    });
    
    if (roleId) {
        // Show selected role's permissions
        const selectedDiv = document.getElementById('permissions-' + roleId);
        if (selectedDiv) {
            selectedDiv.classList.remove('hidden');
            permissionsDiv.classList.remove('hidden');
        } else {
            permissionsDiv.classList.add('hidden');
        }
    } else {
        permissionsDiv.classList.add('hidden');
    }
}

// Show permissions if role is pre-selected (from old input or current admin role)
document.addEventListener('DOMContentLoaded', function() {
    const roleSelect = document.getElementById('role');
    if (roleSelect.value) {
        showRolePermissions(roleSelect.value);
    }
});
</script>
@endsection

