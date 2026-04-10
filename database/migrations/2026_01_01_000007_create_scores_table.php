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
        Schema::create('scores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained('students');
            $table->foreignId('mapel_id')->constrained('subjects');
            $table->foreignId('guru_id')->constrained('teachers');
            $table->decimal('nilai_pengetahuan', 8, 2)->nullable();
            $table->decimal('nilai_keterampilan', 8, 2)->nullable();
            $table->integer('semester')->nullable();
            $table->string('tahun_ajaran')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scores');
    }
};
