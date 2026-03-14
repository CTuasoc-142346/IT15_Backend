<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SchoolDay;
use Illuminate\Http\Request;

class SchoolDayController extends Controller
{
    /**
     * GET /api/school-days
     * Returns a filterable list of school days.
     *
     * Query params:
     *   month         — filter by month number (1-12)
     *   year          — filter by year (e.g. 2025)
     *   semester      — filter by semester
     *   academic_year — filter by academic year string (e.g. "2025-2026")
     *   day_type      — filter by type (Regular | Holiday | Event | Exam | Suspension | No Class)
     *   per_page      — results per page (default 40, max 366)
     */
    public function index(Request $request)
    {
        $query = SchoolDay::query();

        if ($month = $request->input('month')) {
            $query->whereMonth('date', (int) $month);
        }

        if ($year = $request->input('year')) {
            $query->whereYear('date', (int) $year);
        }

        foreach (['semester', 'academic_year', 'day_type'] as $filter) {
            if ($value = $request->input($filter)) {
                $query->where($filter, $value);
            }
        }

        $perPage = min((int) $request->input('per_page', 40), 366);

        $days = $query->orderBy('date')->paginate($perPage);

        return response()->json($days);
    }

    /**
     * GET /api/school-days/{date}
     * Returns a single day by its date string (YYYY-MM-DD).
     */
    public function show(string $date)
    {
        $day = SchoolDay::where('date', $date)->firstOrFail();
        return response()->json($day);
    }

    /**
     * GET /api/school-days/upcoming
     * Returns the next N non-Regular / non-weekend days (events, exams, holidays).
     *
     * Query params:
     *   limit — how many to return (default 5, max 20)
     */
    public function upcoming(Request $request)
    {
        $limit = min((int) $request->input('limit', 5), 20);

        $days = SchoolDay::whereDate('date', '>=', now()->toDateString())
            ->whereNotIn('day_type', ['Regular', 'No Class'])
            ->orderBy('date')
            ->limit($limit)
            ->get();

        return response()->json($days);
    }

    /**
     * GET /api/school-days/stats
     * Returns attendance aggregates and calendar summary.
     */
    public function stats(Request $request)
    {
        $ay = $request->input('academic_year', '2025-2026');

        $query = SchoolDay::byAcademicYear($ay);

        $totalDays      = (clone $query)->count();
        $regularDays    = (clone $query)->regular()->count();
        $holidays       = (clone $query)->holidays()->count();
        $eventDays      = (clone $query)->events()->count();
        $examDays       = (clone $query)->exams()->count();

        // Attendance totals across all regular + exam days
        $attendance = (clone $query)
            ->whereIn('day_type', ['Regular', 'Exam'])
            ->selectRaw('
                SUM(total_present) as total_present,
                SUM(total_absent)  as total_absent,
                SUM(total_late)    as total_late,
                AVG(total_present) as avg_present,
                AVG(total_absent)  as avg_absent
            ')
            ->first();

        // Monthly breakdown of average attendance
        $monthly = (clone $query)
            ->whereIn('day_type', ['Regular', 'Exam'])
            ->selectRaw("
                DATE_FORMAT(date, '%Y-%m') as month,
                ROUND(AVG(total_present), 0) as avg_present,
                ROUND(AVG(total_absent),  0) as avg_absent,
                ROUND(AVG(total_late),    0) as avg_late,
                COUNT(*) as class_days
            ")
            ->groupByRaw("DATE_FORMAT(date, '%Y-%m')")
            ->orderBy('month')
            ->get();

        // Breakdown by day type
        $byType = (clone $query)
            ->selectRaw('day_type, COUNT(*) as count')
            ->groupBy('day_type')
            ->pluck('count', 'day_type');

        return response()->json([
            'academic_year'  => $ay,
            'total_days'     => $totalDays,
            'regular_days'   => $regularDays,
            'holidays'       => $holidays,
            'event_days'     => $eventDays,
            'exam_days'      => $examDays,
            'by_type'        => $byType,
            'attendance'     => $attendance,
            'monthly'        => $monthly,
        ]);
    }
}