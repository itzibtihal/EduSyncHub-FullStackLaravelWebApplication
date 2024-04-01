<?php

namespace Database\Seeders;

use App\Models\Institution;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttachInstitutionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::find(3);

        if ($user) {
            
            for ($i = 1; $i <= 12; $i++) {
                $institution = Institution::find($i);
                if ($institution) {
                    $user->institutions()->attach($institution);
                }
            }
        } else {
            $this->command->info('User with ID 1 not found.');
        }
    }
}
