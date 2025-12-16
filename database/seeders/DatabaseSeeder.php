<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Seed Roles and Permissions (creates super admin)
        $this->call(RolesAndPermissionsSeeder::class);

        // Seed Blog Articles
        $this->call(BlogSeeder::class);
        $this->call(DevToolsSeeder::class);
    }
}
