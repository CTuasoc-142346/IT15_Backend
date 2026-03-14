<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->cascadeOnDelete();
            $table->foreignId('course_id')->constrained()->cascadeOnDelete();
            $table->enum('status', ['Enrolled', 'Dropped', 'Completed', 'Failed'])->default('Enrolled');
            $table->string('academic_year', 20)->nullable();  // e.g. 2025-2026
            $table->enum('semester', ['1st', '2nd', 'Summer'])->default('1st');
            $table->timestamps();
            $table->unique(['student_id', 'course_id', 'academic_year', 'semester']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('enrollments');
    }
};