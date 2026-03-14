<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Course;
use App\Models\Student;

class EnrollmentSeeder extends Seeder
{
    public function run(): void
    {
        $courses  = Course::select('id', 'slots')->get();
        $students = Student::pluck('id')->toArray();

        if ($courses->isEmpty() || empty($students)) {
            return;
        }

        $enrollments = [];
        $now         = now();

        foreach ($courses as $course) {
            // Enroll up to 80% of available slots per course
            $count      = (int) round($course->slots * 0.8);
            $selected   = collect($students)->shuffle()->take($count);

            foreach ($selected as $studentId) {
                $enrollments[] = [
                    'student_id'    => $studentId,
                    'course_id'     => $course->id,
                    'status'        => 'Enrolled',
                    'academic_year' => '2025-2026',
                    'semester'      => '1st',
                    'created_at'    => $now,
                    'updated_at'    => $now,
                ];
            }
        }

        // Insert in chunks, ignoring duplicates from the unique constraint
        foreach (array_chunk($enrollments, 200) as $chunk) {
            DB::table('enrollments')->insertOrIgnore($chunk);
        }

        $total = DB::table('enrollments')->count();
        $this->command->info("✅  EnrollmentSeeder: {$total} enrollments seeded.");
    }
}