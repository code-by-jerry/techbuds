<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Set default guard to admin
        app()[PermissionRegistrar::class]->setPermissionsTeamId(null);

        $modules = config('admin_permissions.modules', []);

        foreach ($modules as $module => $actions) {
            foreach ($actions as $action) {
                $permissionName = "{$module}.{$action}";
                Permission::firstOrCreate(
                    ['name' => $permissionName, 'guard_name' => 'admin'],
                    ['name' => $permissionName, 'guard_name' => 'admin']
                );
            }
        }

        // Create roles (using admin guard)
        $superAdminRole = Role::firstOrCreate(['name' => 'Super Admin', 'guard_name' => 'admin']);
        $adminRole = Role::firstOrCreate(['name' => 'Admin', 'guard_name' => 'admin']);
        $editorRole = Role::firstOrCreate(['name' => 'Editor', 'guard_name' => 'admin']);

        // Super Admin gets all permissions
        $superAdminRole->givePermissionTo(Permission::where('guard_name', 'admin')->get());

        // Admin gets all permissions except admin management
        $adminPermissions = Permission::where('guard_name', 'admin')
            ->where('name', 'not like', 'admins.%')
            ->get();
        $adminRole->givePermissionTo($adminPermissions);

        // Editor gets only list and update for blogs and contacts, plus CRM read/update permissions
        $editorPermissions = Permission::where('guard_name', 'admin')
            ->whereIn('name', [
                'blogs.list', 'blogs.update', 
                'contacts.list', 
                'tool-categories.list', 
                'tool-links.list', 'tool-links.update',
                // CRM permissions for Editor
                'clients.list', 'clients.update',
                'projects.list', 'projects.update',
                'requirements.list', 'requirements.update',
                'tasks.list', 'tasks.update',
                'documents.list', 'documents.create',
                'project-updates.list', 'project-updates.create',
            ])
            ->get();
        $editorRole->givePermissionTo($editorPermissions);

        // Create or update super admin user
        $superAdmin = Admin::firstOrCreate(
            ['email' => 'admin@techbuds.online'],
            [
                'name' => 'Super Administrator',
                'password' => Hash::make('admin@2025'), // Change this in production
                'status' => true,
            ]
        );

        // Assign super admin role if not already assigned
        if (!$superAdmin->hasRole('Super Admin')) {
            $superAdmin->assignRole('Super Admin');
        }
    }
}
