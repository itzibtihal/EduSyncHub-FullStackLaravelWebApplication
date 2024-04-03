<?php

namespace Database\Seeders;

use App\Models\SpecialityParent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use function Ramsey\Uuid\v1;

class SpecialityParentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [1, [7, 8, 9, 10]],
            [2, [11, 12, 13, 14]],
            [3, [15, 16, 17, 18]],
            [4, [19, 20, 21, 22]],
            [5, [23, 24, 25, 26]],
            [6, [27, 28, 29, 30]],
        ];

        foreach ($data as $item) {
            $parentId = $item[0];
            $specialities = $item[1];

            foreach ($specialities as $specialityId) {
                SpecialityParent::create([
                    'parent_id' => $parentId,
                    'speciality_id' => $specialityId,
                ]);
            }
        }
    }
}
