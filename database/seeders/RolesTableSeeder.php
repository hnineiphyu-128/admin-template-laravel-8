<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            [
                'id'    => 1,
                'title' => 'Super Admin',
            ],
            [
                'id'    => 2,
                'title' => 'Manager',
            ],
            [
                'id'    => 3,
                'title' => 'Staff',
            ],
            [
                'id'    => 4,
                'title' => 'User',
            ],
        ];

        Role::insert($roles);
    }
}
