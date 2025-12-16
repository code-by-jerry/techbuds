<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    /**
     * Display the profile page.
     */
    public function show()
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.profile', compact('admin'));
    }

    /**
     * Update the admin profile.
     */
    public function update(Request $request)
    {
        $admin = Auth::guard('admin')->user();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('admins')->ignore($admin->id)],
            'current_password' => ['nullable', 'required_with:password'],
            'password' => ['nullable', 'min:8', 'confirmed'],
        ]);

        // Verify current password if changing password
        if ($request->filled('password')) {
            if (!Hash::check($request->current_password, $admin->password)) {
                return back()->withErrors(['current_password' => 'The current password is incorrect.'])->withInput();
            }
        }

        $admin->name = $validated['name'];
        $admin->email = $validated['email'];

        if ($request->filled('password')) {
            $admin->password = Hash::make($validated['password']);
        }

        $admin->save();

        return back()->with('success', 'Profile updated successfully.');
    }

    /**
     * Disable the admin account.
     */
    public function disable(Request $request)
    {
        $admin = Auth::guard('admin')->user();

        // Prevent super admin from disabling their account
        if ($admin->email === 'admin@techbuds.online') {
            return back()->withErrors(['error' => 'Super admin account cannot be disabled.']);
        }

        // Add a disabled_at column if it doesn't exist, or use a status field
        // For now, we'll just return an error message
        return back()->withErrors(['error' => 'Account disabling functionality is not yet implemented.']);
    }

    /**
     * Delete the admin account.
     */
    public function delete(Request $request)
    {
        $admin = Auth::guard('admin')->user();

        // Prevent super admin from deleting their account
        if ($admin->email === 'admin@techbuds.online') {
            return back()->withErrors(['error' => 'Super admin account cannot be deleted.']);
        }

        // Verify password before deletion
        $request->validate([
            'password' => ['required', 'string'],
        ]);

        if (!Hash::check($request->password, $admin->password)) {
            return back()->withErrors(['password' => 'The password is incorrect.'])->withInput();
        }

        // Logout before deleting
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        $admin->delete();

        return redirect()->route('admin.login')->with('success', 'Your account has been deleted.');
    }
}

