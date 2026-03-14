<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('department_id')->constrained()->cascadeOnDelete();
            $table->string('code', 20)->unique();            // e.g. CCS-DSA-01
            $table->string('name');
            $table->unsignedTinyInteger('units')->default(3);
            $table->string('instructor')->nullable();
            $table->string('schedule')->nullable();          // e.g. MWF 7:30-9:00
            $table->string('room')->nullable();
            $table->unsignedSmallInteger('slots')->default(40);
            $table->enum('type', ['Lecture', 'Laboratory', 'Lecture & Lab'])->default('Lecture');
            $table->enum('status', ['Active', 'Inactive', 'Full'])->default('Active');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};