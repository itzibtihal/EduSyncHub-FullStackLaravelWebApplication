<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Create director role
        Role::create([
            'name' => 'director',
        ]);

        // Create professor role
        Role::create([
            'name' => 'professor',
        ]);

        // Create student role
        Role::create([
            'name' => 'student',
        ]);
    }
}
