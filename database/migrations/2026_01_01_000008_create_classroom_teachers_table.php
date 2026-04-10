<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('classroom_teachers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kelas_id')->constrained('classrooms');
            $table->foreignId('guru_id')->constrained('teachers');
            $table->timestamps();
            $table->unique(['kelas_id', 'guru_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classroom_teachers');
    }
};
