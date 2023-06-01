<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    public function run()
    {
        $administrator_permissions = Permission::all();
        Role::findOrFail(1)->permissions()->sync($administrator_permissions->pluck('id'));

        $hotel_manager_permissions = $administrator_permissions->filter(function ($permission) {
            return $permission->title != 'permission_create' && $permission->title != 'permission_edit' && $permission->title != 'permission_delete';
        });
        Role::findOrFail(2)->permissions()->sync($hotel_manager_permissions);

        $reservation_permissions = $hotel_manager_permissions->filter(function ($permission) {
            return substr($permission->title, 0, 5) != 'user_' && substr($permission->title, 0, 5) != 'role_' && substr($permission->title, 0, 11) != 'permission_';
        });
        Role::findOrFail(3)->permissions()->sync($reservation_permissions);
    }
}
