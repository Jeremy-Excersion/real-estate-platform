<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'view backend']);
        Permission::create(['name' => 'view assigned leads']);
        Permission::create(['name' => 'view all leads']);
        Permission::create(['name' => 'edit assigned leads']);
        Permission::create(['name' => 'edit all leads']);
        Permission::create(['name' => 'delete leads']);

        Role::create(['name' => 'agent'])
            ->givePermissionTo(['view backend', 'view assigned leads', 'edit assigned leads']);

        Role::create(['name' => 'admin'])
            ->givePermissionTo(['view backend', 'view all leads', 'edit all leads']);

        Role::create(['name' => 'super-admin'])
            ->givePermissionTo(Permission::all());
    }
}