<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('department_id')->constrained()->cascadeOnDelete();
            $table->string('code', 20)->unique();            // e.g. BSIT, BSCS
            $table->string('name');
            $table->unsignedTinyInteger('duration_years')->default(4);
            $table->unsignedSmallInteger('total_units')->default(0);
            $table->text('description')->nullable();
            $table->enum('status', ['Active', 'Phased Out', 'Inactive'])->default('Active');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};