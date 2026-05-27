<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kategoribuku_relasi', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_buku')
                ->constrained('buku')
                ->onDelete('cascade');

            $table->foreignId('id_kategori')
                ->constrained('kategoribuku')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kategoribuku_relasi');
    }
};