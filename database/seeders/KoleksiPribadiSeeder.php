<?php

namespace Database\Seeders;

use App\Models\Buku;
use App\Models\KoleksiPribadi;
use Illuminate\Database\Seeder;

class KoleksiPribadiSeeder extends Seeder
{
    public function run(): void
    {
        $bukuIds = Buku::pluck('id')->toArray();

        $data = [
            ['id_user' => 3, 'id_buku' => $bukuIds[0]],
            ['id_user' => 3, 'id_buku' => $bukuIds[15]],
            ['id_user' => 3, 'id_buku' => $bukuIds[30]],
            ['id_user' => 3, 'id_buku' => $bukuIds[34]], // max index 34 karena ada 35 buku
            ['id_user' => 3, 'id_buku' => $bukuIds[10]],
            ['id_user' => 2, 'id_buku' => $bukuIds[4]],
            ['id_user' => 2, 'id_buku' => $bukuIds[19]],
        ];

        foreach ($data as $d) {
            KoleksiPribadi::create($d);
        }
    }
}