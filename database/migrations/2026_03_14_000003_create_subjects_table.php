<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('program_id')->constrained()->cascadeOnDelete();
            $table->string('code', 30)->unique();            // e.g. IT101, CS201
            $table->string('title');
            $table->unsignedTinyInteger('units')->default(3);
            $table->enum('semester', ['1st', '2nd', 'Summer'])->default('1st');
            $table->unsignedTinyInteger('year_level');       // 1, 2, 3, 4
            $table->string('prerequisites')->nullable();     // e.g. "IT101" or "None"
            $table->enum('type', ['Lecture', 'Laboratory', 'Lecture & Lab'])->default('Lecture');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('subjects');
    }
};