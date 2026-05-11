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
        Schema::create('ulasanbuku', function (Blueprint $table) {
            $table->id('id_ulasan');
            $table->integer('Rating');
            $table->string('ulasan');
            $table->string('id_user');
            $table->string('id_buku');

            $table->foreign('id_user')
                ->references('id_user')
                ->on('users')
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
        Schema::dropIfExists('ulasanbuku');
    }
};
