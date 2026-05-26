<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ulasan_buku', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_user')
                ->constrained('users')
                ->onDelete('cascade');

            $table->foreignId('id_buku')
                ->constrained('buku')
                ->onDelete('cascade');

            $table->text('ulasan');
            $table->integer('rating');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ulasan_buku');
    }
};