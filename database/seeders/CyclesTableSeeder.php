<?php

namespace Database\Seeders;

use App\Models\Cycle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CyclesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cycle::create(['name' => 'Midle School']);
        Cycle::create(['name' => 'high School']);
    }
}
