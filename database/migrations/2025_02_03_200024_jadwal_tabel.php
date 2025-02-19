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
        Schema::create('jadwal', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('id_dosen')->constrained('dosen');
            $table->foreignUuid('id_mk')->constrained('mata_kuliah');
            $table->foreignUuid('id_kelas')->constrained('kelas');
            $table->foreignUuid('id_ruang')->constrained('ruang');
            $table->foreignUuid('id_semester')->constrained('semester');
            $table->integer('id_sks');
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->enum('hari', ['senin', 'selasa', 'rabu', 'kamis', 'jumat']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal');
    }
};
