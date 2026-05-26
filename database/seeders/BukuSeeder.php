<?php

namespace Database\Seeders;

use App\Models\Buku;
use Illuminate\Database\Seeder;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $daftarBuku = [
            [
                'judul'        => 'Laskar Pelangi',
                'pengarang'    => 'Andrea Hirata',
                'tahun_terbit' => 2005,
                'stok'         => 15,
            ],
            [
                'judul'        => 'Bumi',
                'pengarang'    => 'Tere Liye',
                'tahun_terbit' => 2014,
                'stok'         => 22,
            ],
            [
                'judul'        => 'Filosofi Teras',
                'pengarang'    => 'Henry Manampiring',
                'tahun_terbit' => 2018,
                'stok'         => 10,
            ],
            [
                'judul'        => 'Laut Bercerita',
                'pengarang'    => 'Leila S. Chudori',
                'tahun_terbit' => 2017,
                'stok'         => 8,
            ],
            [
                'judul'        => 'Atomic Habits',
                'pengarang'    => 'James Clear',
                'tahun_terbit' => 2018,
                'stok'         => 30,
            ],
        ];

        foreach ($daftarBuku as $buku) {
            Buku::create($buku);
        }
    }
}