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
        Schema::create('kategoribuku_relasi', function (Blueprint $table) {
            $table->id('id_kategoribuku');
            $table->string('id_buku');
            $table->string('id_kategori');
            $table->foreign('id_kategori')
                ->references('id_kategori')
                ->on('kategoribuku')
                ->onDelete('cascade');

            $table->foreign('id_buku')
                ->references('id_buku')
                ->on('buku')
                ->onDelete('cascade');    
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategoribuku_relasi');
    }
};
