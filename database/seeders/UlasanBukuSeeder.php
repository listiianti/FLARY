<?php

namespace Database\Seeders;

use App\Models\Buku;
use App\Models\UlasanBuku;
use Illuminate\Database\Seeder;

class UlasanBukuSeeder extends Seeder
{
    public function run(): void
    {
        $bukuIds = Buku::pluck('id')->toArray();

        $data = [
            ['id_user' => 3, 'id_buku' => $bukuIds[0],  'ulasan' => 'Buku yang sangat bagus untuk belajar Laravel, penjelasannya mudah dipahami.', 'rating' => 5],
            ['id_user' => 3, 'id_buku' => $bukuIds[15], 'ulasan' => 'Laskar Pelangi adalah novel yang sangat menginspirasi, wajib dibaca!', 'rating' => 5],
            ['id_user' => 3, 'id_buku' => $bukuIds[30], 'ulasan' => 'Atomic Habits mengubah cara pandang saya tentang kebiasaan sehari-hari.', 'rating' => 5],
            ['id_user' => 3, 'id_buku' => $bukuIds[34], 'ulasan' => 'Penjelasan fisika dasar yang sangat lengkap dan mudah dimengerti.', 'rating' => 4],
            ['id_user' => 2, 'id_buku' => $bukuIds[4],  'ulasan' => 'Referensi MySQL yang sangat lengkap, cocok untuk developer.', 'rating' => 4],
            ['id_user' => 2, 'id_buku' => $bukuIds[19], 'ulasan' => 'Buku sejarah Indonesia yang komprehensif dan informatif.', 'rating' => 4],
        ];

        foreach ($data as $d) {
            UlasanBuku::create($d);
        }
    }
}