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
        Schema::create('lemawa', function (Blueprint $table) {
            $table->id('id_lemawa');
            $table->string('nama_lembaga', 100);
            $table->enum('status', ['aktif', 'non aktif'])->default('aktif');
            $table->string('logo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lemawa');
    }
};
