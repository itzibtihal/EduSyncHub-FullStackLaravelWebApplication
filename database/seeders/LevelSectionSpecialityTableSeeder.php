<?php

namespace Database\Seeders;

use App\Models\LevelSectionSpeciality;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LevelSectionSpecialityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['speciality_id' => 1, 'level_id' => 1, 'section_id' => 1, 'subject_id' => 1],
            ['speciality_id' => 2, 'level_id' => 2, 'section_id' => 2, 'subject_id' => 2],
            
        ];

        // Seed the pivot table with the data
        foreach ($data as $row) {
            LevelSectionSpeciality::create($row);
        }
    }
}
