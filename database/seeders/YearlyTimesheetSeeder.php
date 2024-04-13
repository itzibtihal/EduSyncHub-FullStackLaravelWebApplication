<?php

namespace Database\Seeders;

use App\Models\YearlyTimesheet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class YearlyTimesheetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        YearlyTimesheet::create([
            'year' => 2023,
            'file' => 'timesheet_2023.xlsx',
        ]);

        YearlyTimesheet::create([
            'year' => 2024,
            'file' => 'timesheet_2024.xlsx',
        ]);
    }
}
