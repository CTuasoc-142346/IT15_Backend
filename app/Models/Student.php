<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_number',
        'first_name',
        'last_name',
        'email',
        'gender',
        'birthdate',
        'address',
        'city',
        'province',
        'contact_number',
        'guardian_name',
        'guardian_contact',
        'year_level',
        'status',
        'department',
        'enrollment_date',
    ];

    protected $casts = [
        'birthdate'        => 'date',
        'enrollment_date'  => 'date',
    ];

    // ── Relationships ──────────────────────────────────────────

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'enrollments')->withTimestamps();
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    // ── Accessors ──────────────────────────────────────────────

    public function getFullNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }
}