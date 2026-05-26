<?php

namespace Database\Seeders;

use App\Models\Peminjaman;
use Illuminate\Database\Seeder;

class PeminjamanSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['id_user' => 3, 'id_buku' => 1, 'tanggal_pinjam' => '2024-01-05', 'tanggal_kembali' => '2024-01-15', 'status' => 'dikembalikan'],
            ['id_user' => 3, 'id_buku' => 5, 'tanggal_pinjam' => '2024-02-01', 'tanggal_kembali' => null, 'status' => 'dipinjam'],
            ['id_user' => 3, 'id_buku' => 16, 'tanggal_pinjam' => '2024-02-10', 'tanggal_kembali' => '2024-02-20', 'status' => 'dikembalikan'],
            ['id_user' => 3, 'id_buku' => 31, 'tanggal_pinjam' => '2024-03-01', 'tanggal_kembali' => null, 'status' => 'dipinjam'],
            ['id_user' => 3, 'id_buku' => 46, 'tanggal_pinjam' => '2024-03-15', 'tanggal_kembali' => '2024-03-25', 'status' => 'dikembalikan'],
        ];

        foreach ($data as $d) {
            Peminjaman::create($d);
        }
    }
}