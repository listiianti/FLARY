<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    // Tentukan primary key kustom sesuai diagram
    protected $primaryKey = 'id_buku';

    // Atribut yang diizinkan untuk pengisian massal (Mass Assignment)
    protected $fillable = [
        'judul',
        'pengarang',
        'tahun_terbit',
        'stok'
    ];
}