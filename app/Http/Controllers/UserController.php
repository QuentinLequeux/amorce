<?php

namespace App\Http\Controllers;

use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function assignRoleAndPermissions()
    {
        $user = User::find(1);

//        $roleUser = Role::firstOrCreate(['name' => 'user']);
        $roleAdmin = Role::firstOrCreate(['name' => 'admin']);
//        $roleAccountant = Role::firstOrCreate(['name' => 'accountant']);

//        $permission = Permission::firstOrCreate(['name' => 'delete transaction']);

        $user->syncRoles();
        $user->assignRole($roleAdmin);

        $user->syncPermissions();
//        $user->givePermissionTo($permission);

        dd($user->getRoleNames(), $user->getPermissionsViaRoles());

        if ($user->hasAllPermissions(Permission::all())) {
            echo 'All permissions';
        }

        if ($user->hasRole('admin')) {
            echo 'Good';
        }
    }
}
