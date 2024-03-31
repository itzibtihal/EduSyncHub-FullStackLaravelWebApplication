<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Get role IDs or create if they don't exist
        $teacherRoleId = Role::firstOrCreate(['name' => 'professor'])->id;
        $studentRoleId = Role::firstOrCreate(['name' => 'student'])->id;
        $directorRoleId = Role::firstOrCreate(['name' => 'director'])->id;

        // Insert users
        User::create([
            'lastname' => 'Teacher',
            'firstname' => 'John',
            'email' => 'teacher@example.com',
            'password' => Hash::make('12345678'),
            'role_id' => $teacherRoleId,
        ]);

        User::create([
            'lastname' => 'Student',
            'firstname' => 'Jane',
            'email' => 'student@example.com',
            'password' => Hash::make('12345678'),
            'role_id' => $studentRoleId,
        ]);

        User::create([
            'lastname' => 'Director',
            'firstname' => 'Doe',
            'email' => 'director@example.com',
            'password' => Hash::make('12345678'),
            'role_id' => $directorRoleId,
        ]);
    }
}
