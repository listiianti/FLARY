@extends('layouts.app')

@section('title', 'Koleksi Saya')

@section('content')

<style>
    .book-card {
        border: none;
        border-radius: 16px;
        background-color: #ffffff;
        transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        overflow: hidden;
    }

    .book-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.1) !important;
    }

    .book-cover-wrapper {
        position: relative;
        height: 220px;
        overflow: hidden;
    }

    .book-cover {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .book-card:hover .book-cover {
        transform: scale(1.06);
    }

    .category-badge {
        position: absolute;
        top: 12px;
        left: 12px;
        background: rgba(255,255,255,0.9);
        color: #333;
        font-weight: 600;
        font-size: 11px;
        padding: 5px 12px;
        border-radius: 30px;
    }

    .btn-hapus {
        border: 2px solid #ff4d4d;
        color: #ff4d4d;
        background: white;
        border-radius: 10px;
        padding: 8px 16px;
        font-weight: 600;
        font-size: 13px;
        width: 100%;
        transition: all 0.2s;
    }

    .btn-hapus:hover {
        background: #ff4d4d;
        color: white;
    }

    .btn-lihat {
        background: linear-gradient(135deg, #6200ea, #9d4edd);
        color: white;
        border: none;
        border-radius: 10px;
        padding: 8px 16px;
        font-weight: 600;
        font-size: 13px;
        width: 100%;
        transition: all 0.2s;
        text-decoration: none;
        display: block;
        text-align: center;
    }

    .btn-lihat:hover {
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(98,0,234,0.3);
    }
</style>

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold">Koleksi Saya ❤️</h2>
            <p class="text-muted">Buku favorit dan yang sudah kamu simpan.</p>
        </div>
        <div class="badge bg-white text-dark border shadow-sm p-3">
            <i class="fas fa-heart text-danger me-2"></i>
            {{ $koleksi->count() }} Buku Tersimpan
        </div>
    </div>

    @if(session('sukses_koleksi'))
        <div class="alert alert-success rounded-3 mb-4">
            <i class="fas fa-check-circle me-2"></i>
            {{ session('sukses_koleksi') }}
        </div>
    @endif

    @if($koleksi->count() > 0)
        <div class="row g-4">
            @foreach($koleksi as $item)
                <div class="col-md-6 col-lg-3">
                    <div class="card book-card shadow-sm h-100">

                        <div class="book-cover-wrapper">
                            <span class="category-badge">
                                {{ $item->buku->kategori->first()->nama_kategori ?? 'Umum' }}
                            </span>
                            @if($item->buku->gambar)
                                <img src="{{ asset('storage/' . $item->buku->gambar) }}"
                                     class="book-cover" alt="{{ $item->buku->judul }}">
                            @else
                                <img src="https://images.unsplash.com/photo-1495446815901-a7297e633e8d?q=80&w=800"
                                     class="book-cover" alt="{{ $item->buku->judul }}">
                            @endif
                        </div>

                        <div class="card-body d-flex flex-column">
                            <h5 class="fw-bold text-truncate" title="{{ $item->buku->judul }}">
                                {{ $item->buku->judul }}
                            </h5>
                            <p class="text-muted small mb-3">
                                Oleh: {{ $item->buku->penulis }}
                            </p>

                            <div class="mt-auto d-flex flex-column gap-2">
                                <a href="{{ route('buku.show', $item->buku->id) }}"
                                   class="btn-lihat">
                                    <i class="fas fa-eye me-1"></i> Lihat Buku
                                </a>

                                <form action="{{ route('koleksi.destroy', $item->buku->id) }}"
                                      method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-hapus">
                                        <i class="fas fa-trash me-1"></i> Hapus Koleksi
                                    </button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-5">
            <div class="p-5 rounded-4 bg-white shadow-sm d-inline-block">
               <i class="fas fa-heart-broken text-muted mb-3" style="font-size: 3rem; opacity: 0.3;"></i>
                <p class="text-dark fw-medium mb-2">Koleksi kamu masih kosong</p>
                <p class="text-muted small mb-4">Tambahkan buku favoritmu dari halaman Jelajah Buku</p>
                <a href="{{ route('buku.index') }}"
                   class="btn btn-primary rounded-3 px-4">
                    <i class="fas fa-book-open me-2"></i>
                    Jelajah Buku
                </a>
            </div>
        </div>
    @endif

</div>

@endsection