<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_name',    // legacy fallback
        'title',
        'text',
        'category_id',
        'student_id',   // nullable FK to students
    ];

    protected $appends = ['author_name'];

    // ── Relationships ──────────────────────────────────────────

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    // ── Accessor: full name from student, fallback to user_name ─
    public function getAuthorNameAttribute(): string
    {
        if ($this->student) {
            return trim($this->student->first_name . ' ' . $this->student->last_name);
        }
        return $this->user_name ?? 'Anonymous';
    }
}