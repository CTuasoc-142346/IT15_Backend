<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    public function run()
    {
        Course::create([
            'course_code' => 'CSE101',
            'course_name' => 'Introduction to Computer Science',
            'capacity' => 2,
        ]);

        Course::create([
            'course_code' => 'MATH101',
            'course_name' => 'Basic Mathematics',
            'capacity' => 3,
        ]);

        Course::create([
            'course_code' => 'ENG101',
            'course_name' => 'English Communication',
            'capacity' => 2,
        ]);
    }
}
