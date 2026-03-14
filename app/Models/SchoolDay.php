<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolDay extends Model
{
    protected $fillable = [
        'date',
        'day_type',
        'title',
        'description',
        'semester',
        'academic_year',
        'total_present',
        'total_absent',
        'total_late',
    ];

    protected $casts = [
        'date'          => 'date',
        'total_present' => 'integer',
        'total_absent'  => 'integer',
        'total_late'    => 'integer',
    ];

    // ── Scopes ────────────────────────────────────────────────

    public function scopeHolidays($query)
    {
        return $query->where('day_type', 'Holiday');
    }

    public function scopeEvents($query)
    {
        return $query->where('day_type', 'Event');
    }

    public function scopeExams($query)
    {
        return $query->where('day_type', 'Exam');
    }

    public function scopeRegular($query)
    {
        return $query->where('day_type', 'Regular');
    }

    public function scopeBySemester($query, string $semester)
    {
        return $query->where('semester', $semester);
    }

    public function scopeByAcademicYear($query, string $year)
    {
        return $query->where('academic_year', $year);
    }
}