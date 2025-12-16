<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminController extends Controller
{
    /**
     * Display a listing of the admins.
     */
    public function index(Request $request)
    {
        // Only super admin can access
        if (auth()->guard('admin')->user()->email !== 'admin@techbuds.online') {
            abort(403, 'Unauthorized action.');
        }

        $query = Admin::query();

        // Search functionality
        if ($request->has('search') && $request->search) {
            $query->where(function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%');
            });
        }

        // Filter by status
        if ($request->has('status') && $request->status !== '') {
            $query->where('status', $request->status === 'active');
        }

        $admins = $query->with('roles')->orderBy('created_at', 'desc')->paginate(15);
        $roles = Role::where('guard_name', 'admin')->get();

        return view('admin.admins.index', compact('admins', 'roles'));
    }

    /**
     * Show the form for creating a new admin.
     */
    public function create()
    {
        // Only super admin can access
        if (auth()->guard('admin')->user()->email !== 'admin@techbuds.online') {
            abort(403, 'Unauthorized action.');
        }

        $roles = Role::where('guard_name', 'admin')->with('permissions')->get();
        
        $modules = config('admin_permissions.modules', []);
        
        return view('admin.admins.create', compact('roles', 'modules'));
    }

    /**
     * Store a newly created admin in storage.
     */
    public function store(Request $request)
    {
        // Only super admin can access
        if (auth()->guard('admin')->user()->email !== 'admin@techbuds.online') {
            abort(403, 'Unauthorized action.');
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'status' => ['required', 'boolean'],
            'role' => ['required', 'exists:roles,id'],
        ]);

        $admin = Admin::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'status' => $validated['status'],
        ]);

        // Assign role
        $role = Role::where('guard_name', 'admin')->findOrFail($validated['role']);
        $admin->assignRole($role);

        return redirect()->route('admin.admins.index')
            ->with('success', 'Admin created successfully.');
    }

    /**
     * Show the form for editing the specified admin.
     */
    public function edit(Admin $admin)
    {
        // Only super admin can access
        if (auth()->guard('admin')->user()->email !== 'admin@techbuds.online') {
            abort(403, 'Unauthorized action.');
        }

        // Prevent editing super admin
        if ($admin->email === 'admin@techbuds.online') {
            return redirect()->route('admin.admins.index')
                ->withErrors(['error' => 'Super admin cannot be edited.']);
        }

        $roles = Role::where('guard_name', 'admin')->with('permissions')->get();
        
        $modules = config('admin_permissions.modules', []);
        
        return view('admin.admins.edit', compact('admin', 'roles', 'modules'));
    }

    /**
     * Update the specified admin in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        // Only super admin can access
        if (auth()->guard('admin')->user()->email !== 'admin@techbuds.online') {
            abort(403, 'Unauthorized action.');
        }

        // Prevent editing super admin
        if ($admin->email === 'admin@techbuds.online') {
            return redirect()->route('admin.admins.index')
                ->withErrors(['error' => 'Super admin cannot be edited.']);
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('admins')->ignore($admin->id)],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'status' => ['required', 'boolean'],
            'role' => ['required', 'exists:roles,id'],
        ]);

        $admin->name = $validated['name'];
        $admin->email = $validated['email'];
        $admin->status = $validated['status'];

        if ($request->filled('password')) {
            $admin->password = Hash::make($validated['password']);
        }

        $admin->save();

        // Sync role
        $role = Role::where('guard_name', 'admin')->findOrFail($validated['role']);
        $admin->syncRoles([$role]);

        return redirect()->route('admin.admins.index')
            ->with('success', 'Admin updated successfully.');
    }

    /**
     * Remove the specified admin from storage.
     */
    public function destroy(Admin $admin)
    {
        // Only super admin can access
        if (auth()->guard('admin')->user()->email !== 'admin@techbuds.online') {
            abort(403, 'Unauthorized action.');
        }

        // Prevent deleting super admin
        if ($admin->email === 'admin@techbuds.online') {
            return redirect()->route('admin.admins.index')
                ->withErrors(['error' => 'Super admin cannot be deleted.']);
        }

        $admin->delete();

        return redirect()->route('admin.admins.index')
            ->with('success', 'Admin deleted successfully.');
    }

    /**
     * Toggle admin status (active/inactive).
     */
    public function toggleStatus(Admin $admin)
    {
        // Only super admin can access
        if (auth()->guard('admin')->user()->email !== 'admin@techbuds.online') {
            abort(403, 'Unauthorized action.');
        }

        // Prevent disabling super admin
        if ($admin->email === 'admin@techbuds.online') {
            return redirect()->route('admin.admins.index')
                ->withErrors(['error' => 'Super admin cannot be disabled.']);
        }

        $admin->status = !$admin->status;
        $admin->save();

        $status = $admin->status ? 'activated' : 'deactivated';
        return redirect()->route('admin.admins.index')
            ->with('success', "Admin {$status} successfully.");
    }
}

