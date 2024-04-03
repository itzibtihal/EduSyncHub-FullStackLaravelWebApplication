<?php

namespace Database\Seeders;

use App\Models\Speciality;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecialitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //specialities parent
        Speciality::create(['name' => 'Scientific Specialization ']);
        Speciality::create(['name' => 'Literary and Linguistic Specialization']);
        Speciality::create(['name' => 'Economic and Social Specialization']);
        Speciality::create(['name' => 'Technical Specialization']);
        Speciality::create(['name' => 'Health and Life Sciences Specialization']);
        Speciality::create(['name' => 'Arts and Humanities Specialization']);

        //specialities child of parent id 1 (Scientific Specialization)
        Speciality::create(['name' => 'Physics']);
        Speciality::create(['name' => 'Chemistry']);
        Speciality::create(['name' => 'Biology and Geology']);
        Speciality::create(['name' => 'Mathematics']);

        //specialities child of parent id 2 (Literary and Linguistic Specialization)
        Speciality::create(['name' => 'Arabic Literature and Linguistics']);
        Speciality::create(['name' => 'French Literature and Linguistics']);
        Speciality::create(['name' => 'English Literature and Linguistics']);
        Speciality::create(['name' => 'Spanish Literature and Linguistics']);

        //specialities child of parent id 3 (Economic and Social Specialization)        
        Speciality::create(['name' => 'Economics and Sociology']);
        Speciality::create(['name' => 'Economics and Management']);
        Speciality::create(['name' => 'Economics and Geography']);
        Speciality::create(['name' => 'Sociology and Anthropology']);

        //specialities child of parent id 4 (Technical Specialization)
        Speciality::create(['name' => 'Electrical Engineering']);
        Speciality::create(['name' => 'Mechanical Engineering']);
        Speciality::create(['name' => 'Civil Engineering']);
        Speciality::create(['name' => 'Computer Science and Networks']);

        //specialities child of parent id 5 (Health and Life Sciences Specialization)
        Speciality::create(['name' => 'Fine Arts']);
        Speciality::create(['name' => 'Music and Performing Arts']);
        Speciality::create(['name' => 'History and Archaeology']);
        Speciality::create(['name' => 'Philosophy and Ethics']);

        //specialities child of parent id 6 (Arts and Humanities Specialization)
        Speciality::create(['name' => 'Biology and Chemistry']);
        Speciality::create(['name' => 'Health Sciences']);
        Speciality::create(['name' => 'Nutrition and Dietetics']);
        Speciality::create(['name' => 'Biotechnology and Genetics']);


        
    }
}
