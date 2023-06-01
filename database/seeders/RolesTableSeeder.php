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
                'title' => 'Hotel Manager',
            ],
            [
                'id'    => 3,
                'title' => 'Reservation',
            ],
        ];

        Role::insert($roles);
    }
}