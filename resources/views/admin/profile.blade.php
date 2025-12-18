@extends('admin.layouts.tailadmin')

@section('title', 'Profile')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div>
        <h2 class="text-2xl font-bold text-heading">Profile Settings</h2>
        <p class="text-sm text-brand-primary/70 mt-1">Manage your account information and settings</p>
    </div>

    <!-- Success/Error Messages -->
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

    <!-- Update Profile Section -->
    <div class="rounded-xl border border-border-default bg-surface-1 p-6 shadow-sm">
        <h3 class="text-lg font-semibold text-heading mb-4">Update Profile</h3>
        
        <form method="POST" action="{{ route('admin.profile.update') }}" class="space-y-4">
            @csrf
            
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                <div>
                    <label for="name" class="block text-sm font-medium text-heading mb-2">Name</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name', $admin->name) }}"
                        required
                        class="w-full rounded-lg border border-border-default bg-surface-1 px-4 py-2.5 text-sm text-heading focus:ring-2 focus:ring-[var(--brand-primary)]/20 focus:border-[var(--brand-primary)] focus:outline-none transition-all"
                    />
                    @error('name')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-heading mb-2">Email</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email', $admin->email) }}"
                        required
                        class="w-full rounded-lg border border-border-default bg-surface-1 px-4 py-2.5 text-sm text-heading focus:ring-2 focus:ring-[var(--brand-primary)]/20 focus:border-[var(--brand-primary)] focus:outline-none transition-all"
                    />
                    @error('email')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="pt-4 border-t border-border-default">
                <h4 class="text-sm font-semibold text-heading mb-4">Change Password (Optional)</h4>
                
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <div>
                        <label for="current_password" class="block text-sm font-medium text-heading mb-2">Current Password</label>
                        <input
                            type="password"
                            id="current_password"
                            name="current_password"
                            class="w-full rounded-lg border border-border-default bg-surface-1 px-4 py-2.5 text-sm text-heading focus:ring-2 focus:ring-[var(--brand-primary)]/20 focus:border-[var(--brand-primary)] focus:outline-none transition-all"
                        />
                        @error('current_password')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-heading mb-2">New Password</label>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="w-full rounded-lg border border-border-default bg-surface-1 px-4 py-2.5 text-sm text-heading focus:ring-2 focus:ring-[var(--brand-primary)]/20 focus:border-[var(--brand-primary)] focus:outline-none transition-all"
                        />
                        @error('password')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-heading mb-2">Confirm New Password</label>
                        <input
                            type="password"
                            id="password_confirmation"
                            name="password_confirmation"
                            class="w-full rounded-lg border border-border-default bg-surface-1 px-4 py-2.5 text-sm text-heading focus:ring-2 focus:ring-[var(--brand-primary)]/20 focus:border-[var(--brand-primary)] focus:outline-none transition-all"
                        />
                    </div>
                </div>
            </div>

            <div class="flex justify-end pt-4">
                <button
                    type="submit"
                    class="inline-flex items-center gap-2 rounded-lg bg-brand-primary px-6 py-2.5 text-sm font-medium text-white transition-colors hover:bg-[var(--brand-soft)]"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Update Profile
                </button>
            </div>
        </form>
    </div>

    <!-- Disable Account Section -->
    <div class="rounded-xl border border-red-200 bg-red-50 p-6 shadow-sm">
        <h3 class="text-lg font-semibold text-red-800 mb-2">Disable Account</h3>
        <p class="text-sm text-red-700 mb-4">Temporarily disable your account. You can reactivate it later by contacting support.</p>
        
        @if($admin->email === 'admin@techbuds.online')
            <div class="rounded-lg border border-red-300 bg-red-100 px-4 py-3 text-sm text-red-800 mb-4">
                <p class="font-medium">Super admin account cannot be disabled.</p>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.profile.disable') }}" onsubmit="return confirm('Are you sure you want to disable your account?');">
            @csrf
            <button
                type="submit"
                @if($admin->email === 'admin@techbuds.online') disabled @endif
                class="inline-flex items-center gap-2 rounded-lg bg-red-600 px-6 py-2.5 text-sm font-medium text-white transition-colors hover:bg-red-700 disabled:opacity-50 disabled:cursor-not-allowed"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                </svg>
                Disable Account
            </button>
        </form>
    </div>

    <!-- Delete Account Section -->
    <div class="rounded-xl border border-red-200 bg-red-50 p-6 shadow-sm">
        <h3 class="text-lg font-semibold text-red-800 mb-2">Delete Account</h3>
        <p class="text-sm text-red-700 mb-4">Permanently delete your account and all associated data. This action cannot be undone.</p>
        
        @if($admin->email === 'admin@techbuds.online')
            <div class="rounded-lg border border-red-300 bg-red-100 px-4 py-3 text-sm text-red-800 mb-4">
                <p class="font-medium">Super admin account cannot be deleted.</p>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.profile.delete') }}" id="deleteAccountForm" onsubmit="return confirmDelete();">
            @csrf
            <div class="mb-4">
                <label for="delete_password" class="block text-sm font-medium text-red-800 mb-2">Enter your password to confirm</label>
                <input
                    type="password"
                    id="delete_password"
                    name="password"
                    required
                    @if($admin->email === 'admin@techbuds.online') disabled @endif
                    class="w-full max-w-md rounded-lg border border-red-300 bg-surface-1 px-4 py-2.5 text-sm text-heading focus:ring-2 focus:ring-red-500/20 focus:border-red-500 focus:outline-none transition-all disabled:opacity-50 disabled:cursor-not-allowed"
                    placeholder="Enter your password"
                />
                @error('password')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <button
                type="submit"
                @if($admin->email === 'admin@techbuds.online') disabled @endif
                class="inline-flex items-center gap-2 rounded-lg bg-red-600 px-6 py-2.5 text-sm font-medium text-white transition-colors hover:bg-red-700 disabled:opacity-50 disabled:cursor-not-allowed"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
                Delete Account
            </button>
        </form>
    </div>
</div>

<script>
function confirmDelete() {
    const password = document.getElementById('delete_password').value;
    if (!password) {
        alert('Please enter your password to confirm account deletion.');
        return false;
    }
    return confirm('Are you absolutely sure? This will permanently delete your account and all associated data. This action cannot be undone.');
}
</script>
@endsection

