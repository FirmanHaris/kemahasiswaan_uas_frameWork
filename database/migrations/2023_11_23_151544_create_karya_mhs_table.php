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
        Schema::create('karya_mhs', function (Blueprint $table) {
            $table->id('id_karya');
            $table->string('judul_karya', 100);
            $table->enum('jenis_karya', ['teknologi', 'non teknologi']);
            $table->enum('prodi', ['teknik informatika', 'sistem informasi']);
            $table->string('keterangan');
            $table->string('gambar_karya');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karya_mhs');
    }
};
