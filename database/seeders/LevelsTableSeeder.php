<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //MIDDLE SCHOOL LEVELS
        Level::create(['name' => 'Level 1', 'cycle_id' => 1]); 
        Level::create(['name' => 'Level 2', 'cycle_id' => 1]);
        Level::create(['name' => 'Level 3', 'cycle_id' => 1]);

        //HIGH SCHOOL LEVELS
        Level::create(['name' => 'Level 1', 'cycle_id' => 2]); 
        Level::create(['name' => 'Level 2', 'cycle_id' => 2]);
        Level::create(['name' => 'Level 3', 'cycle_id' => 2]);
    }
}
