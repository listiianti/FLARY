<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Daftarin seeder Buku yang kemarin kita buat di sini
        $this->call([
            BukuSeeder::class,
        ]);
    }
}