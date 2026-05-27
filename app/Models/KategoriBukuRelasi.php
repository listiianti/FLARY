<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriBukuRelasi extends Model
{
    protected $table = 'kategoribuku_relasi';

    protected $fillable = [
        'id_buku',
        'id_kategori',
    ];

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'id_buku');
    }

    public function kategori()
    {
        return $this->belongsTo(KategoriBuku::class, 'id_kategori');
    }
}