<?php

namespace Database\Seeders;

use App\Models\KoleksiPribadi;
use Illuminate\Database\Seeder;

class KoleksiPribadiSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['id_user' => 3, 'id_buku' => 1],
            ['id_user' => 3, 'id_buku' => 16],
            ['id_user' => 3, 'id_buku' => 31],
            ['id_user' => 3, 'id_buku' => 46],
            ['id_user' => 3, 'id_buku' => 61],
            ['id_user' => 2, 'id_buku' => 5],
            ['id_user' => 2, 'id_buku' => 20],
        ];

        foreach ($data as $d) {
            KoleksiPribadi::create($d);
        }
    }
}