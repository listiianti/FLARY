<?php

namespace Database\Seeders;

use App\Models\KategoriBuku;
use Illuminate\Database\Seeder;

class KategoriBukuSeeder extends Seeder
{
    public function run(): void
    {
        $kategori = [
            'Teknologi',
            'Fiksi',
            'Non-Fiksi',
            'Sains',
            'Sejarah',
            'Pendidikan',
            'Bisnis',
        ];

        foreach ($kategori as $nama) {
            KategoriBuku::create(['nama_kategori' => $nama]);
        }
    }
}