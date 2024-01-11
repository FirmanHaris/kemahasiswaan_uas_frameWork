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
        Schema::create('beasiswa', function (Blueprint $table) {
            $table->id('id_beasiswa');
            $table->string('nama_beasiswa', 100);
            $table->string('jenis_beasiswa', 100);
            $table->date('mulai_pendaftaran');
            $table->date('batas_pendaftaran');
            $table->decimal('min_ipk', 4);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beasiswa');
    }
};
