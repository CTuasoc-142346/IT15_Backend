<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    /**
     * GET /api/departments
     * All departments (used for dropdown).
     */
    public function departments()
    {
        $departments = Department::withCount('programs')
            ->where('status', 'Active')
            ->orderBy('name')
            ->get();

        return response()->json($departments);
    }

    /**
     * GET /api/programs
     * All programs, optionally filtered by department_id.
     *
     * Query params:
     *   department_id — filter by department (integer)
     *   search        — search code or name
     *   status        — filter by status (Active / Phased Out / Inactive)
     */
    public function index(Request $request)
    {
        $query = Program::with('department')->orderBy('code');

        if ($departmentId = $request->input('department_id')) {
            $query->where('department_id', (int) $departmentId);
        }

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('code', 'like', "%{$search}%")
                  ->orWhere('name', 'like', "%{$search}%");
            });
        }

        if ($status = $request->input('status')) {
            $query->where('status', $status);
        }

        return response()->json($query->get());
    }

    /**
     * GET /api/programs/{id}
     * Single program with subjects grouped by year_level → semester.
     */
    public function show(int $id)
    {
        $program = Program::with(['department', 'subjects'])->findOrFail($id);

        // Group subjects: year_level → semester → [subjects]
        $curriculum = [];
        foreach ($program->subjects->sortBy(['year_level', 'semester', 'code']) as $subject) {
            $yr  = $subject->year_level;
            $sem = $subject->semester;
            $curriculum[$yr][$sem][] = [
                'id'            => $subject->id,
                'code'          => $subject->code,
                'title'         => $subject->title,
                'units'         => $subject->units,
                'type'          => $subject->type,
                'prerequisites' => $subject->prerequisites,
            ];
        }

        // Build year labels
        $yearLabels = ['1st Year', '2nd Year', '3rd Year', '4th Year', '5th Year'];
        $semLabels  = ['1st' => '1st Semester', '2nd' => '2nd Semester', 'Summer' => 'Summer'];

        $structuredCurriculum = [];
        foreach ($curriculum as $yr => $semesters) {
            $semData = [];
            foreach ($semesters as $sem => $subjects) {
                $semData[] = [
                    'semester'      => $sem,
                    'semester_label'=> $semLabels[$sem] ?? $sem,
                    'total_units'   => array_sum(array_column($subjects, 'units')),
                    'subjects'      => $subjects,
                ];
            }
            $structuredCurriculum[] = [
                'year_level'  => $yr,
                'year_label'  => $yearLabels[$yr - 1] ?? "{$yr}th Year",
                'semesters'   => $semData,
            ];
        }

        return response()->json([
            'id'             => $program->id,
            'code'           => $program->code,
            'name'           => $program->name,
            'duration_years' => $program->duration_years,
            'total_units'    => $program->total_units,
            'description'    => $program->description,
            'status'         => $program->status,
            'department'     => $program->department,
            'curriculum'     => $structuredCurriculum,
            'subjects_count' => $program->subjects->count(),
        ]);
    }
}