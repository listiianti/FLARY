<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriBuku extends Model
{
    protected $table = 'kategoribuku';

    protected $fillable = [
        'nama_kategori',
    ];

    public function buku()
    {
        return $this->belongsToMany(Buku::class, 'kategoribuku_relasi', 'id_kategori', 'id_buku');
    }
}