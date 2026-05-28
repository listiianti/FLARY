<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'buku';

    protected $fillable = [
        'judul',
        'penulis',
        'penerbit',
        'tahun_terbit',
        'stok',
        'deskripsi',
    ];

    public function kategori()
    {
        return $this->belongsToMany(KategoriBuku::class, 'kategoribuku_relasi', 'id_buku', 'id_kategori');
    }

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class, 'id_buku');
    }

    public function koleksiPribadi()
    {
        return $this->hasMany(KoleksiPribadi::class, 'id_buku');
    }

    public function ulasan()
    {
        return $this->hasMany(UlasanBuku::class, 'id_buku');
    }
}