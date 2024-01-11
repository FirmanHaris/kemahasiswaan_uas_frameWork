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
        Schema::create('pengurus_lemawa', function (Blueprint $table) {
            $table->id('id_pengurus_lemawa');
            $table->foreignId('id_lemawa');
            $table->string('nama');
            $table->enum('jabatan', ['ketua', 'sekretaris', 'bendahara', 'anggota'])->default('anggota');
            $table->string('foto');
            $table->foreign('id_lemawa')->references('id_lemawa')->on('lemawa')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengurus_lemawa');
    }
};
