<?php

namespace Database\Seeders;

use App\Models\UlasanBuku;
use Illuminate\Database\Seeder;

class UlasanBukuSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['id_user' => 3, 'id_buku' => 1, 'ulasan' => 'Buku yang sangat bagus untuk belajar Laravel, penjelasannya mudah dipahami.', 'rating' => 5],
            ['id_user' => 3, 'id_buku' => 16, 'ulasan' => 'Laskar Pelangi adalah novel yang sangat menginspirasi, wajib dibaca!', 'rating' => 5],
            ['id_user' => 3, 'id_buku' => 31, 'ulasan' => 'Atomic Habits mengubah cara pandang saya tentang kebiasaan sehari-hari.', 'rating' => 5],
            ['id_user' => 3, 'id_buku' => 46, 'ulasan' => 'Penjelasan fisika dasar yang sangat lengkap dan mudah dimengerti.', 'rating' => 4],
            ['id_user' => 2, 'id_buku' => 5, 'ulasan' => 'Referensi MySQL yang sangat lengkap, cocok untuk developer.', 'rating' => 4],
            ['id_user' => 2, 'id_buku' => 61, 'ulasan' => 'Buku sejarah Indonesia yang komprehensif dan informatif.', 'rating' => 4],
        ];

        foreach ($data as $d) {
            UlasanBuku::create($d);
        }
    }
}