<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'program_id', 'code', 'title', 'units',
        'semester', 'year_level', 'prerequisites', 'type',
    ];

    protected $casts = [
        'units'      => 'integer',
        'year_level' => 'integer',
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}