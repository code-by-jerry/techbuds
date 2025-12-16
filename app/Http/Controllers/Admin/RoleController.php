<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Validation\Rule;

class RoleController extends Controller
{
    /**
     * Display a listing of the roles.
     */
    public function index()
    {
        // Only super admin can access
        if (auth()->guard('admin')->user()->email !== 'admin@techbuds.online') {
            abort(403, 'Unauthorized action.');
        }

        $roles = Role::where('guard_name', 'admin')
            ->with('permissions')
            ->orderBy('created_at', 'desc')
            ->get();

        $modules = config('admin_permissions.modules', []);
        $allPermissions = $this->buildPermissionsMatrix($modules);

        return view('admin.roles.index', [
            'roles' => $roles,
            'modules' => $modules,
            'allPermissions' => $allPermissions,
        ]);
    }

    /**
     * Show the form for creating a new role.
     */
    public function create()
    {
        // Only super admin can access
        if (auth()->guard('admin')->user()->email !== 'admin@techbuds.online') {
            abort(403, 'Unauthorized action.');
        }

        $modules = config('admin_permissions.modules', []);
        $allPermissions = $this->buildPermissionsMatrix($modules);

        return view('admin.roles.create', [
            'modules' => $modules,
            'allPermissions' => $allPermissions,
        ]);
    }

    /**
     * Store a newly created role in storage.
     */
    public function store(Request $request)
    {
        // Only super admin can access
        if (auth()->guard('admin')->user()->email !== 'admin@techbuds.online') {
            abort(403, 'Unauthorized action.');
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:roles,name,NULL,id,guard_name,admin'],
            'permissions' => ['required', 'array', 'min:1'],
            'permissions.*' => ['exists:permissions,id'],
        ]);

        $role = Role::create([
            'name' => $validated['name'],
            'guard_name' => 'admin',
        ]);

        // Assign permissions
        $permissions = Permission::whereIn('id', $validated['permissions'])
            ->where('guard_name', 'admin')
            ->get();
        $role->givePermissionTo($permissions);

        return redirect()->route('admin.roles.index')
            ->with('success', 'Role created successfully.');
    }

    /**
     * Show the form for editing the specified role.
     */
    public function edit(Role $role)
    {
        // Only super admin can access
        if (auth()->guard('admin')->user()->email !== 'admin@techbuds.online') {
            abort(403, 'Unauthorized action.');
        }

        // Prevent editing Super Admin role
        if ($role->name === 'Super Admin') {
            return redirect()->route('admin.roles.index')
                ->withErrors(['error' => 'Super Admin role cannot be edited.']);
        }

        $modules = config('admin_permissions.modules', []);
        $allPermissions = $this->buildPermissionsMatrix($modules);

        // Get role's current permissions
        $rolePermissions = $role->permissions->pluck('id')->toArray();

        return view('admin.roles.edit', [
            'role' => $role,
            'modules' => $modules,
            'allPermissions' => $allPermissions,
            'rolePermissions' => $rolePermissions,
        ]);
    }

    /**
     * Update the specified role in storage.
     */
    public function update(Request $request, Role $role)
    {
        // Only super admin can access
        if (auth()->guard('admin')->user()->email !== 'admin@techbuds.online') {
            abort(403, 'Unauthorized action.');
        }

        // Prevent editing Super Admin role
        if ($role->name === 'Super Admin') {
            return redirect()->route('admin.roles.index')
                ->withErrors(['error' => 'Super Admin role cannot be edited.']);
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('roles')->ignore($role->id)->where('guard_name', 'admin')],
            'permissions' => ['required', 'array', 'min:1'],
            'permissions.*' => ['exists:permissions,id'],
        ]);

        $role->name = $validated['name'];
        $role->save();

        // Sync permissions
        $permissions = Permission::whereIn('id', $validated['permissions'])
            ->where('guard_name', 'admin')
            ->get();
        $role->syncPermissions($permissions);

        return redirect()->route('admin.roles.index')
            ->with('success', 'Role updated successfully.');
    }

    /**
     * Remove the specified role from storage.
     */
    public function destroy(Role $role)
    {
        // Only super admin can access
        if (auth()->guard('admin')->user()->email !== 'admin@techbuds.online') {
            abort(403, 'Unauthorized action.');
        }

        // Prevent deleting Super Admin role
        if ($role->name === 'Super Admin') {
            return redirect()->route('admin.roles.index')
                ->withErrors(['error' => 'Super Admin role cannot be deleted.']);
        }

        // Check if role is assigned to any admin
        $adminsWithRole = \App\Models\Admin::role($role->name)->count();
        if ($adminsWithRole > 0) {
            return redirect()->route('admin.roles.index')
                ->withErrors(['error' => 'Cannot delete role. It is assigned to one or more admins.']);
        }

        $role->delete();

        return redirect()->route('admin.roles.index')
            ->with('success', 'Role deleted successfully.');
    }

    private function buildPermissionsMatrix(array $modules): array
    {
        $matrix = [];
        foreach ($modules as $module => $actions) {
            foreach ($actions as $action) {
                $permissionName = "{$module}.{$action}";
                $permission = Permission::where('guard_name', 'admin')
                    ->where('name', $permissionName)
                    ->first();
                if ($permission) {
                    $matrix[$module][$action] = $permission;
                }
            }
        }

        return $matrix;
    }
}

