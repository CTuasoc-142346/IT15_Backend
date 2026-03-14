<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,         // users (admin accounts)
            CategorySeeder::class,     // post categories
            DepartmentSeeder::class,   // departments  ← NEW (must run before programs & courses)
            ProgramSeeder::class,      // programs     ← NEW (depends on departments)
            SubjectSeeder::class,      // subjects     ← NEW (depends on programs)
            CourseSeeder::class,       // courses      ← REBUILT (depends on departments)
            StudentSeeder::class,      // students
            EnrollmentSeeder::class,   // enrollments  (depends on students + courses)
            SchoolDaySeeder::class,    // academic calendar
            PostSeeder::class,         // posts        (depends on categories)
        ]);
    }
}