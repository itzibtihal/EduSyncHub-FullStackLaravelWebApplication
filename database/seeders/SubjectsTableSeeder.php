<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subjects = [
            ['name' => 'Mathematics', 'description' => 'Introduction to mathematics'],
            ['name' => 'Science', 'description' => 'Science subjects'],
            ['name' => 'English', 'description' => 'English language'],
            ['name' => 'History', 'description' => 'History subjects'],
            ['name' => 'Geography', 'description' => 'Geography subjects'],
            ['name' => 'Computer Science', 'description' => 'Computer Science subjects'],
            ['name' => 'Physical Education', 'description' => 'Physical Education subjects'],
            ['name' => 'Art', 'description' => 'Art subjects'],
            ['name' => 'Music', 'description' => 'Music subjects'],
            ['name' => 'Drama', 'description' => 'Drama subjects'],
            ['name' => 'Design Technology', 'description' => 'Design Technology subjects'],
            ['name' => 'Business Studies', 'description' => 'Business Studies subjects'],
            ['name' => 'Economics', 'description' => 'Economics subjects'],
            ['name' => 'Accounting', 'description' => 'Accounting subjects'],
            ['name' => 'Physical Science', 'description' => 'Physical Science subjects'],
            ['name' => 'Biology', 'description' => 'Biology subjects'],
            ['name' => 'Chemistry', 'description' => 'Chemistry subjects'],
            ['name' => 'Physics', 'description' => 'Physics subjects'],
            ['name' => 'Agriculture', 'description' => 'Agriculture subjects'],
            ['name' => 'Home Economics', 'description' => 'Home Economics subjects'],
            ['name' => 'French', 'description' => 'French subjects'],
            ['name' => 'Spanish', 'description' => 'Spanish subjects'],
            ['name' => 'German', 'description' => 'German subjects'],
            ['name' => 'Chinese', 'description' => 'Chinese subjects'],
            ['name' => 'Japanese', 'description' => 'Japanese subjects'],
            ['name' => 'Korean', 'description' => 'Korean subjects'],
            ['name' => 'Arabic', 'description' => 'Arabic subjects'],
            ['name' => 'Swahili', 'description' => 'Swahili subjects'],
            ['name' => 'Portuguese', 'description' => 'Portuguese subjects'],
            ['name' => 'Russian', 'description' => 'Russian subjects'],
            
        ];

        foreach ($subjects as $subject) {
            Subject::create($subject);
        }
    }
}
