<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
                User::create([
                'name' => 'Administrator',
                'username' => 'admin',
                'email' => 'admin@flary.com',
                'password' => Hash::make('password'),
                'alamat' => 'Jl. Admin No. 1',
                'role' => 'admin',
            ]);

            User::create([
                'name' => 'Petugas Perpustakaan',
                'username' => 'petugas',
                'email' => 'petugas@flary.com',
                'password' => Hash::make('password'),
                'alamat' => 'Jl. Petugas No. 2',
                'role' => 'petugas',
            ]);

            User::create([
                'name' => 'Budi Santoso',
                'username' => 'budi',
                'email' => 'budi@gmail.com',
                'password' => Hash::make('password'),
                'alamat' => 'Jl. Peminjam No. 3',
                'role' => 'peminjam',
            ]);
    }
}