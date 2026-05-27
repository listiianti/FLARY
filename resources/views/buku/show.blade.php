@extends('layouts.app')

@section('title', $buku->judul)

@section('content')

<style>
    .detail-card {
        border: none;
        border-radius: 20px;
        background: white;
        box-shadow: 0 10px 40px rgba(0,0,0,0.08);
    }

    .book-cover-detail {
        width: 100%;
        height: 380px;
        object-fit: cover;
        border-radius: 16px;
        box-shadow: 0 15px 40px rgba(0,0,0,0.15);
    }

    .category-pill {
        background: linear-gradient(135deg, #6200ea, #9d4edd);
        color: white;
        padding: 6px 16px;
        border-radius: 30px;
        font-size: 13px;
        font-weight: 600;
        display: inline-block;
    }

    .info-row {
        display: flex;
        align-items: center;
        padding: 14px 0;
        border-bottom: 1px solid #f0f0f0;
    }

    .info-row:last-child {
        border-bottom: none;
    }

    .info-label {
        width: 140px;
        font-size: 13px;
        color: #999;
        font-weight: 500;
        flex-shrink: 0;
    }

    .info-value {
        font-size: 14px;
        font-weight: 600;
        color: #333;
    }

    .btn-pinjam {
        background: linear-gradient(135deg, #6200ea, #9d4edd);
        color: white;
        border: none;
        border-radius: 12px;
        padding: 14px 30px;
        font-weight: 600;
        font-size: 15px;
        width: 100%;
        transition: all 0.3s;
    }

    .btn-pinjam:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(98,0,234,0.3);
        color: white;
    }

    .btn-koleksi {
        border: 2px solid #ff758f;
        color: #ff758f;
        background: white;
        border-radius: 12px;
        padding: 14px 30px;
        font-weight: 600;
        font-size: 15px;
        width: 100%;
        transition: all 0.3s;
    }

    .btn-koleksi:hover {
        background: linear-gradient(135deg, #ff758f, #ff7fa5);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(255,117,143,0.3);
    }

    .back-btn {
        color: #6200ea;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 24px;
        transition: all 0.2s;
    }

    .back-btn:hover {
        color: #9d4edd;
        transform: translateX(-4px);
    }

    .star-rating {
        display: flex;
        flex-direction: row-reverse;
        gap: 4px;
        justify-content: flex-end;
    }

    .star-rating input {
        display: none;
    }

    .star-rating label {
        font-size: 28px;
        color: #ddd;
        cursor: pointer;
        transition: color 0.2s;
    }

    .star-rating input:checked ~ label,
    .star-rating label:hover,
    .star-rating label:hover ~ label {
        color: #ffc107;
    }

    .ulasan-card {
        border: 1px solid #f0f0f0;
        border-radius: 16px;
        padding: 20px;
        margin-bottom: 16px;
        background: #fafafa;
        transition: all 0.2s;
    }

    .ulasan-card:hover {
        box-shadow: 0 4px 15px rgba(0,0,0,0.06);
        background: white;
    }

    .avatar-circle {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        background: linear-gradient(135deg, #6200ea, #9d4edd);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 700;
        font-size: 16px;
        flex-shrink: 0;
    }

    .form-ulasan {
        border: none;
        border-radius: 16px;
        background: white;
        box-shadow: 0 10px 40px rgba(0,0,0,0.08);
    }

    textarea.form-control {
        border-radius: 12px;
        border: 1px solid #e0e0e0;
        padding: 14px;
        resize: none;
        transition: all 0.2s;
    }

    textarea.form-control:focus {
        border-color: #6200ea;
        box-shadow: 0 0 0 0.25rem rgba(98,0,234,0.1);
    }

    .btn-kirim-ulasan {
        background: linear-gradient(135deg, #6200ea, #9d4edd);
        color: white;
        border: none;
        border-radius: 12px;
        padding: 12px 30px;
        font-weight: 600;
        transition: all 0.3s;
    }

    .btn-kirim-ulasan:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(98,0,234,0.3);
        color: white;
    }
</style>

<div class="container-fluid">

    {{-- TOMBOL KEMBALI --}}
    <a href="{{ route('buku.index') }}" class="back-btn">
        <i class="fas fa-arrow-left"></i>
        Kembali ke Daftar Buku
    </a>

    {{-- DETAIL BUKU --}}
    <div class="detail-card p-4 p-md-5 mb-4">
        <div class="row g-5">

            {{-- COVER BUKU --}}
            <div class="col-md-4 text-center">
                <img
                    src="https://images.unsplash.com/photo-1495446815901-a7297e633e8d?q=80&w=800"
                    class="book-cover-detail"
                    alt="{{ $buku->judul }}"
                >
                <div class="mt-3">
                    <span class="category-pill">
                        {{ $buku->kategori->first()->nama_kategori ?? 'Umum' }}
                    </span>
                </div>
            </div>

            {{-- INFO BUKU --}}
            <div class="col-md-8">

                <h2 class="fw-bold mb-1" style="font-family: 'Poppins', sans-serif;">
                    {{ $buku->judul }}
                </h2>

                <p class="text-muted mb-4">
                    oleh <span class="fw-semibold text-dark">{{ $buku->penulis }}</span>
                </p>

                <div class="mb-4">
                    <div class="info-row">
                        <span class="info-label">
                            <i class="fas fa-user-edit me-2 text-primary"></i> Penulis
                        </span>
                        <span class="info-value">{{ $buku->penulis }}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">
                            <i class="fas fa-building me-2 text-primary"></i> Penerbit
                        </span>
                        <span class="info-value">{{ $buku->penerbit }}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">
                            <i class="fas fa-calendar me-2 text-primary"></i> Tahun Terbit
                        </span>
                        <span class="info-value">{{ $buku->tahun_terbit }}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">
                            <i class="fas fa-tag me-2 text-primary"></i> Kategori
                        </span>
                        <span class="info-value">
                            {{ $buku->kategori->first()->nama_kategori ?? 'Umum' }}
                        </span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">
                            <i class="fas fa-star me-2 text-warning"></i> Rating
                        </span>
                        <span class="info-value">
                            @if($buku->ulasan && $buku->ulasan->count() > 0)
                                @php $avgRating = round($buku->ulasan->avg('rating'), 1); @endphp
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="fas fa-star {{ $i <= $avgRating ? 'text-warning' : 'text-muted' }}"
                                       style="font-size: 14px;"></i>
                                @endfor
                                <span class="ms-1 text-muted" style="font-size: 13px;">
                                    ({{ $avgRating }}/5 dari {{ $buku->ulasan->count() }} ulasan)
                                </span>
                            @else
                                <span class="text-muted" style="font-size: 13px;">Belum ada rating</span>
                            @endif
                        </span>
                    </div>
                </div>

                {{-- TOMBOL AKSI --}}
                <div class="row g-3">
                    <div class="col-md-6">
                        <button class="btn-pinjam">
                            <i class="fas fa-book-reader me-2"></i>
                            Pinjam Buku
                        </button>
                    </div>
                 <div class="col-md-6">
                        @php
                            $sudahDikoleksi = \App\Models\KoleksiPribadi::where('id_user', Auth::id())
                                                ->where('id_buku', $buku->id)
                                                ->exists();
                        @endphp

                        @if($sudahDikoleksi)
                            <button class="btn-koleksi" disabled style="opacity:0.6; cursor:not-allowed;">
                                <i class="fas fa-heart me-2"></i>
                                Sudah di Koleksi
                            </button>
                        @else
                            <form action="{{ route('koleksi.store', $buku->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn-koleksi">
                                    <i class="fas fa-heart me-2"></i>
                                    Tambah ke Koleksi
                                </button>
                            </form>
                        @endif

                        @if(session('sukses_koleksi'))
                            <small class="text-success d-block mt-2">
                                <i class="fas fa-check-circle me-1"></i>
                                {{ session('sukses_koleksi') }}
                            </small>
                        @endif

                        @if(session('error_koleksi'))
                            <small class="text-danger d-block mt-2">
                                <i class="fas fa-exclamation-circle me-1"></i>
                                {{ session('error_koleksi') }}
                            </small>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="row g-4">

        {{-- FORM TULIS ULASAN --}}
        <div class="col-md-5">
            <div class="form-ulasan p-4">

                <h5 class="fw-bold mb-4">
                    <i class="fas fa-pen text-primary me-2"></i>
                    Tulis Ulasan
                </h5>

                @if(session('sukses_ulasan'))
                    <div class="alert alert-success rounded-3 mb-3">
                        <i class="fas fa-check-circle me-2"></i>
                        {{ session('sukses_ulasan') }}
                    </div>
                @endif

                @if(session('error_ulasan'))
                    <div class="alert alert-danger rounded-3 mb-3">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        {{ session('error_ulasan') }}
                    </div>
                @endif

                <form action="{{ route('ulasan.store', $buku->id) }}" method="POST">
                    @csrf

                    {{-- RATING BINTANG --}}
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Rating</label>
                        <div class="star-rating">
                            <input type="radio" name="rating" id="star5" value="5">
                            <label for="star5"><i class="fas fa-star"></i></label>
                            <input type="radio" name="rating" id="star4" value="4">
                            <label for="star4"><i class="fas fa-star"></i></label>
                            <input type="radio" name="rating" id="star3" value="3">
                            <label for="star3"><i class="fas fa-star"></i></label>
                            <input type="radio" name="rating" id="star2" value="2">
                            <label for="star2"><i class="fas fa-star"></i></label>
                            <input type="radio" name="rating" id="star1" value="1">
                            <label for="star1"><i class="fas fa-star"></i></label>
                        </div>
                        @error('rating')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- TEKS ULASAN --}}
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Ulasan Kamu</label>
                        <textarea
                            name="ulasan"
                            class="form-control"
                            rows="5"
                            placeholder="Bagikan pendapatmu tentang buku ini...">{{ old('ulasan') }}</textarea>
                        @error('ulasan')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <button type="submit" class="btn-kirim-ulasan w-100">
                        <i class="fas fa-paper-plane me-2"></i>
                        Kirim Ulasan
                    </button>

                </form>
            </div>
        </div>

        {{-- DAFTAR ULASAN --}}
        <div class="col-md-7">
            <div class="detail-card p-4">

                <h5 class="fw-bold mb-4">
                    <i class="fas fa-comments text-warning me-2"></i>
                    Ulasan Pembaca
                    <span class="badge bg-primary-subtle text-primary ms-2">
                        {{ $buku->ulasan->count() }}
                    </span>
                </h5>

                @if($buku->ulasan && $buku->ulasan->count() > 0)
                    @foreach($buku->ulasan as $ulasan)
                        <div class="ulasan-card">
                            <div class="d-flex gap-3 align-items-start">

                                <div class="avatar-circle">
                                    {{ strtoupper(substr($ulasan->user->name ?? 'U', 0, 1)) }}
                                </div>

                                <div class="flex-grow-1">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <strong class="d-block">
                                                {{ $ulasan->user->name ?? 'Pengguna' }}
                                            </strong>
                                            <small class="text-muted">
                                                {{ $ulasan->created_at->diffForHumans() }}
                                            </small>
                                        </div>
                                        <div>
                                            @for($i = 1; $i <= 5; $i++)
                                                <i class="fas fa-star {{ $i <= $ulasan->rating ? 'text-warning' : 'text-muted' }}"
                                                   style="font-size: 12px;"></i>
                                            @endfor
                                        </div>
                                    </div>
                                    <p class="text-muted small mt-2 mb-0">
                                        {{ $ulasan->ulasan }}
                                    </p>
                                </div>

                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="text-center py-5 text-muted">
                        <i class="fas fa-comment-slash mb-3" style="font-size: 2.5rem; opacity: 0.3;"></i>
                        <p class="mb-0">Belum ada ulasan. Jadilah yang pertama!</p>
                    </div>
                @endif

            </div>
        </div>

    </div>

</div>

@endsection