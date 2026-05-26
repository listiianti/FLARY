@extends('layouts.app')

@section('title', 'Jelajah Buku')

@section('content')

<style>
    :root {
        --primary-gradient: linear-gradient(135deg, #6200ea, #9d4edd);
        --bg-light: #f8f9fa;
    }

    .book-card {
        border: none;
        border-radius: 16px;
        background-color: #ffffff;
        transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        overflow: hidden;
    }

    .book-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1) !important;
    }

    .book-cover-wrapper {
        position: relative;
        height: 260px;
        background-color: #eee;
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
        top: 15px;
        left: 15px;
        background: rgba(255, 255, 255, 0.9);
        color: #333;
        font-weight: 600;
        font-size: 11px;
        padding: 6px 14px;
        border-radius: 30px;
    }

    .search-box {
        border-radius: 12px;
        padding: 12px 20px;
        border: 1px solid #dee2e6;
        background-color: #fff;
    }

    .search-box:focus {
        border-color: #6200ea;
        box-shadow: 0 0 0 0.25rem rgba(98, 0, 234, 0.1);
    }

    .filter-btn {
        border-radius: 10px;
        padding: 10px 20px;
        font-weight: 500;
        transition: all 0.2s;
    }

    .filter-btn.active {
        background: var(--primary-gradient);
        color: #fff;
        border-color: transparent;
    }
</style>

<div class="container-fluid">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">

        <div>
            <h2 class="fw-bold mb-1">Jelajah Buku 📚</h2>
            <p class="text-muted mb-0">
                Temukan berbagai buku menarik untuk dibaca.
            </p>
        </div>

        <div class="badge bg-white text-dark border shadow-sm p-3">
            <i class="fas fa-book text-primary me-2"></i>
            120+ Buku Tersedia
        </div>

    </div>

    <!-- Search -->
    <div class="row mb-4">

        <div class="col-md-8 mb-3 mb-md-0">
            <input type="text"
                class="form-control search-box"
                placeholder="Cari judul buku atau penulis...">
        </div>

        <div class="col-md-4 d-flex gap-2">

            <button class="btn btn-outline-secondary filter-btn active w-100">
                Semua
            </button>

            <button class="btn btn-outline-secondary filter-btn w-100">
                Teknologi
            </button>

        </div>

    </div>

    <!-- Books -->
    <div class="row g-4">

        <!-- Card 1 -->
        <div class="col-md-6 col-lg-3">

            <div class="card book-card shadow-sm h-100">

                <div class="book-cover-wrapper">

                    <span class="category-badge">
                        Teknologi
                    </span>

                    <img src="https://images.unsplash.com/photo-1512820790803-83ca734da794?q=80&w=800"
                        class="book-cover"
                        alt="Book">

                </div>

                <div class="card-body">

                    <h5 class="fw-bold">
                        Belajar Laravel 11
                    </h5>

                    <p class="text-muted small mb-3">
                        Panduan lengkap membangun website modern menggunakan Laravel.
                    </p>

                    <button class="btn btn-primary w-100 rounded-3">
                        Pinjam Buku
                    </button>

                </div>

            </div>

        </div>

        <!-- Card 2 -->
        <div class="col-md-6 col-lg-3">

            <div class="card book-card shadow-sm h-100">

                <div class="book-cover-wrapper">

                    <span class="category-badge">
                        UI/UX
                    </span>

                    <img src="https://images.unsplash.com/photo-1544717305-2782549b5136?q=80&w=800"
                        class="book-cover"
                        alt="Book">

                </div>

                <div class="card-body">

                    <h5 class="fw-bold">
                        UI UX Design Modern
                    </h5>

                    <p class="text-muted small mb-3">
                        Belajar desain modern untuk aplikasi mobile dan website.
                    </p>

                    <button class="btn btn-primary w-100 rounded-3">
                        Pinjam Buku
                    </button>

                </div>

            </div>

        </div>

        <!-- Card 3 -->
        <div class="col-md-6 col-lg-3">

            <div class="card book-card shadow-sm h-100">

                <div class="book-cover-wrapper">

                    <span class="category-badge">
                        Flutter
                    </span>

                    <img src="https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?q=80&w=800"
                        class="book-cover"
                        alt="Book">

                </div>

                <div class="card-body">

                    <h5 class="fw-bold">
                        Dasar Flutter
                    </h5>

                    <p class="text-muted small mb-3">
                        Panduan membuat aplikasi Android menggunakan Flutter.
                    </p>

                    <button class="btn btn-primary w-100 rounded-3">
                        Pinjam Buku
                    </button>

                </div>

            </div>

        </div>

        <!-- Card 4 -->
        <div class="col-md-6 col-lg-3">

            <div class="card book-card shadow-sm h-100">

                <div class="book-cover-wrapper">

                    <span class="category-badge">
                        Pemrograman
                    </span>

                    <img src="https://images.unsplash.com/photo-1495446815901-a7297e633e8d?q=80&w=800"
                        class="book-cover"
                        alt="Book">

                </div>

                <div class="card-body">

                    <h5 class="fw-bold">
                        UML Dasar
                    </h5>

                    <p class="text-muted small mb-3">
                        Memahami diagram UML untuk pengembangan software.
                    </p>

                    <button class="btn btn-primary w-100 rounded-3">
                        Pinjam Buku
                    </button>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection