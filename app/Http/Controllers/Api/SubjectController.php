<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * GET /api/subjects
     * All subjects, filterable by program_id, year_level, semester, search.
     *
     * Query params:
     *   program_id  — filter by program
     *   year_level  — 1, 2, 3, 4
     *   semester    — 1st / 2nd / Summer
     *   search      — search code or title
     *   per_page    — default 30
     */
    public function index(Request $request)
    {
        $query = Subject::with('program.department')
            ->orderBy('year_level')
            ->orderBy('semester')
            ->orderBy('code');

        if ($programId = $request->input('program_id')) {
            $query->where('program_id', (int) $programId);
        }

        if ($yearLevel = $request->input('year_level')) {
            $query->where('year_level', (int) $yearLevel);
        }

        if ($semester = $request->input('semester')) {
            $query->where('semester', $semester);
        }

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('code',  'like', "%{$search}%")
                  ->orWhere('title', 'like', "%{$search}%");
            });
        }

        $perPage = min((int) $request->input('per_page', 30), 100);

        return response()->json($query->paginate($perPage));
    }

    /**
     * GET /api/subjects/{id}
     * Single subject with program + department.
     */
    public function show(int $id)
    {
        $subject = Subject::with('program.department')->findOrFail($id);
        return response()->json($subject);
    }
}