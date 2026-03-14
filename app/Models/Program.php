<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'department_id', 'code', 'name',
        'duration_years', 'total_units', 'description', 'status',
    ];

    protected $casts = [
        'duration_years' => 'integer',
        'total_units'    => 'integer',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }
}