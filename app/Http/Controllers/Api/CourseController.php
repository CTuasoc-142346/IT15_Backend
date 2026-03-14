<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Department;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * GET /api/courses
     * Paginated, filterable course list.
     *
     * Query params:
     *   search        — searches code, name, instructor
     *   department_id — filter by department (integer)
     *   type          — filter by type (Lecture | Laboratory | Lecture & Lab)
     *   status        — filter by status (Active | Inactive | Full)
     *   per_page      — default 20, max 100
     */
    public function index(Request $request)
    {
        $query = Course::with('department')->withCount('enrollments');

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('code',       'like', "%{$search}%")
                  ->orWhere('name',     'like', "%{$search}%")
                  ->orWhere('instructor','like', "%{$search}%");
            });
        }

        if ($departmentId = $request->input('department_id')) {
            $query->where('department_id', (int) $departmentId);
        }

        if ($type = $request->input('type')) {
            $query->where('type', $type);
        }

        if ($status = $request->input('status')) {
            $query->where('status', $status);
        }

        $perPage = min((int) $request->input('per_page', 20), 100);
        $courses = $query->orderBy('code')->paginate($perPage);

        return response()->json($courses);
    }

    /**
     * GET /api/courses/{id}
     * Single course with department and enrollment count.
     */
    public function show(int $id)
    {
        $course = Course::with('department')->withCount('enrollments')->findOrFail($id);
        return response()->json($course);
    }

    /**
     * GET /api/courses/{id}/students
     * Students enrolled in a specific course (paginated).
     */
    public function students(Request $request, int $id)
    {
        $course  = Course::findOrFail($id);
        $perPage = min((int) $request->input('per_page', 20), 100);
        $students = $course->students()
            ->orderBy('last_name')
            ->paginate($perPage);

        return response()->json([
            'course'   => $course,
            'students' => $students,
        ]);
    }

    /**
     * GET /api/courses/stats
     * Aggregate stats for dashboard widgets.
     */
    public function stats()
    {
        $total = Course::count();

        // Count courses per department via JOIN so we get the department name
        $byDepartment = Course::join('departments', 'courses.department_id', '=', 'departments.id')
            ->selectRaw('departments.name as department, departments.code as dept_code, COUNT(courses.id) as count')
            ->groupBy('departments.id', 'departments.name', 'departments.code')
            ->orderByDesc('count')
            ->get();

        $byType = Course::selectRaw('type, COUNT(*) as count')
            ->groupBy('type')
            ->pluck('count', 'type');

        // Top 5 most enrolled courses
        $mostEnrolled = Course::with('department')
            ->withCount('enrollments')
            ->orderByDesc('enrollments_count')
            ->limit(5)
            ->get(['id', 'code', 'name', 'department_id', 'slots']);

        return response()->json([
            'total'         => $total,
            'by_department' => $byDepartment,
            'by_type'       => $byType,
            'most_enrolled' => $mostEnrolled,
        ]);
    }
}