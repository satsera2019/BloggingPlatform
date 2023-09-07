<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'edit post']);
        Permission::create(['name' => 'delete post']);
        Permission::create(['name' => 'publish post']);
        Permission::create(['name' => 'unpublish post']);

        Permission::create(['name' => 'edit comment']);
        Permission::create(['name' => 'delete comment']);
        Permission::create(['name' => 'publish comment']);
        Permission::create(['name' => 'unpublish comment']);

        Permission::create(['name' => 'comment post']);

        // admin role with permissions
        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(['delete post', 'delete comment']);

        // editor role with permissions
        $role = Role::create(['name' => 'editor']);
        $role->givePermissionTo(['edit post', 'delete post', 'publish post', 'unpublish post']);

        // user role with permissions
        $role = Role::create(['name' => 'user']);
        $role->givePermissionTo(['comment post']);
    }
}
