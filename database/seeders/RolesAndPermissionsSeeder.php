<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'delete transaction']);
        Permission::create(['name' => 'edit transaction']);
        Permission::create(['name' => 'create transaction']);
        Permission::create(['name' => 'import csv']);

//        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Role::create(['name' => 'admin'])
            ->givePermissionTo(Permission::all());
        Role::create(['name' => 'accountant'])
            ->givePermissionTo(Permission::all());
        Role::create(['name' => 'user']);
    }
}
