<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();

            // ── Basic info ──────────────────────────────────────
            $table->string('student_number', 20)->unique();  // e.g. S2025-0001
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();

            // ── Demographics ────────────────────────────────────
            $table->enum('gender', ['Male', 'Female', 'Other'])->nullable();
            $table->date('birthdate')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->string('contact_number', 20)->nullable();
            $table->string('guardian_name')->nullable();
            $table->string('guardian_contact', 20)->nullable();

            // ── Academic info ───────────────────────────────────
            $table->string('year_level', 20)->nullable();    // e.g. 1st Year
            $table->string('department')->nullable();        // e.g. College of Computer Studies
            $table->date('enrollment_date')->nullable();
            $table->enum('status', ['Active', 'Inactive', 'Dropped', 'Graduated'])
                  ->default('Active');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};