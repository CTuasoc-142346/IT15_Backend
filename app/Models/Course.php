<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'department_id', 'code', 'name', 'units',
        'instructor', 'schedule', 'room', 'slots', 'type', 'status',
    ];

    protected $casts = [
        'units' => 'integer',
        'slots' => 'integer',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'enrollments');
    }

    public function getEnrolledCountAttribute(): int
    {
        return $this->enrollments()->where('status', 'Enrolled')->count();
    }

    public function getSlotsAvailableAttribute(): int
    {
        return max(0, $this->slots - $this->enrolled_count);
    }
}