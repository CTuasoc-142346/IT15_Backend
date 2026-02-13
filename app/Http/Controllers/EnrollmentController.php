<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;

class EnrollmentController extends Controller
{
    public function enroll(Request $request)
    {
        $student = Student::findOrFail($request->student_id);
        $course = Course::findOrFail($request->course_id);

        // Prevent duplicate enrollment
        if ($student->courses()->where('course_id', $course->id)->exists()) {
            return back()->with('error', 'Student already enrolled in this course.');
        }

        // Check capacity
        if ($course->students()->count() >= $course->capacity) {
            return back()->with('error', 'Course is full.');
        }

        // Enroll
        $student->courses()->attach($course->id);

        return back()->with('success', 'Enrollment successful.');
    }
}
