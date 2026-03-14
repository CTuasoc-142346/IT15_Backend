<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * GET /api/students
     * Returns a paginated, filterable list of students.
     *
     * Query params:
     *   search      — searches first_name, last_name, student_number, email
     *   department  — filter by department name
     *   year_level  — filter by year level  (e.g. "1st Year")
     *   status      — filter by status       (Active | Inactive | Graduated | Dropped)
     *   gender      — filter by gender        (Male | Female)
     *   per_page    — results per page (default 20, max 100)
     */
    public function index(Request $request)
    {
        $query = Student::query();

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('first_name',      'like', "%{$search}%")
                  ->orWhere('last_name',     'like', "%{$search}%")
                  ->orWhere('student_number','like', "%{$search}%")
                  ->orWhere('email',         'like', "%{$search}%");
            });
        }

        foreach (['department', 'year_level', 'status', 'gender'] as $filter) {
            if ($value = $request->input($filter)) {
                $query->where($filter, $value);
            }
        }

        $perPage = min((int) $request->input('per_page', 20), 100);

        $students = $query
            ->orderBy('last_name')
            ->orderBy('first_name')
            ->paginate($perPage);

        return response()->json($students);
    }

    /**
     * GET /api/students/{id}
     * Returns a single student with their enrolled courses.
     */
    public function show(int $id)
    {
        $student = Student::with('courses')->findOrFail($id);
        return response()->json($student);
    }

    /**
     * GET /api/students/stats
     * Returns aggregate statistics for dashboard widgets.
     */
    public function stats()
    {
        $total = Student::count();

        $byStatus = Student::selectRaw('status, COUNT(*) as count')
            ->groupBy('status')
            ->pluck('count', 'status');

        $byDepartment = Student::selectRaw('department, COUNT(*) as count')
            ->groupBy('department')
            ->orderByDesc('count')
            ->get();

        $byYearLevel = Student::selectRaw('year_level, COUNT(*) as count')
            ->groupBy('year_level')
            ->pluck('count', 'year_level');

        $byGender = Student::selectRaw('gender, COUNT(*) as count')
            ->groupBy('gender')
            ->pluck('count', 'gender');

        return response()->json([
            'total'         => $total,
            'by_status'     => $byStatus,
            'by_department' => $byDepartment,
            'by_year_level' => $byYearLevel,
            'by_gender'     => $byGender,
        ]);
    }
}