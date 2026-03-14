<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('school_days', function (Blueprint $table) {
            $table->id();
            $table->date('date')->unique();
            $table->enum('day_type', [
                'Regular', 'Holiday', 'Event', 'Exam', 'Suspension', 'No Class'
            ])->default('Regular');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('semester', 20)->nullable();       // e.g. 1st Semester
            $table->string('academic_year', 20)->nullable();  // e.g. 2025-2026
            $table->unsignedSmallInteger('total_present')->default(0);
            $table->unsignedSmallInteger('total_absent')->default(0);
            $table->unsignedSmallInteger('total_late')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('school_days');
    }
};