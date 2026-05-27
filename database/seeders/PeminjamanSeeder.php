<?php

namespace Database\Seeders;

use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Database\Seeder;

class PeminjamanSeeder extends Seeder
{
    public function run(): void
    {
        $bukuIds = Buku::pluck('id')->shuffle()->take(5)->values();

        $data = [
            ['tanggal_pinjam' => '2024-01-05', 'tanggal_kembali' => '2024-01-15', 'status' => 'dikembalikan'],
            ['tanggal_pinjam' => '2024-02-01', 'tanggal_kembali' => null,         'status' => 'dipinjam'],
            ['tanggal_pinjam' => '2024-02-10', 'tanggal_kembali' => '2024-02-20', 'status' => 'dikembalikan'],
            ['tanggal_pinjam' => '2024-03-01', 'tanggal_kembali' => null,         'status' => 'dipinjam'],
            ['tanggal_pinjam' => '2024-03-15', 'tanggal_kembali' => '2024-03-25', 'status' => 'dikembalikan'],
        ];

        foreach ($data as $i => $d) {
            Peminjaman::create([
                'id_user' => 3,
                'id_buku' => $bukuIds[$i],
                ...$d,
            ]);
        }
    }
}