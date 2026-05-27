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
        z-index: 2;
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

    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
        <div>
            <h2 class="fw-bold mb-1">Jelajah Buku 📚</h2>
            <p class="text-muted mb-0">
                Temukan berbagai buku menarik untuk dibaca.
            </p>
        </div>

        <div class="badge bg-white text-dark border shadow-sm p-3">
            <i class="fas fa-book text-primary me-2"></i>
            {{ $bukus->count() }}+ Buku Tersedia
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-8 mb-3 mb-md-0">
            <input type="text"
                id="search-input"
                class="form-control search-box"
                placeholder="Cari judul buku atau penulis..."
                value="{{ request('search') }}">
        </div>

        <div class="col-md-4 d-flex gap-2">
            <button class="btn btn-outline-secondary filter-btn active w-100" onclick="filterKategori('', this)">
                Semua
            </button>
            <button class="btn btn-outline-secondary filter-btn w-100" onclick="filterKategori('Teknologi', this)">
                Teknologi
            </button>
        </div>
    </div>

    <div class="row g-4" id="buku-grid">
        @include('buku._list')
    </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('search-input');
        let kategoriAktif = ''; 
        let timeout = null;

        function fetchBuku() {
            const keyword = searchInput.value;
            
            // 🌟 DIUBAH: Sekarang menembak ke route('buku.search') agar murni merender potongan kartu buku tanpa layout sidebar
            const url = `{{ route('buku.search') }}?search=${encodeURIComponent(keyword)}&kategori=${encodeURIComponent(kategoriAktif)}`;

            fetch(url)
            .then(response => response.text())
            .then(html => {
                // Mengganti isi grid buku secara real-time tanpa duplikat layout/sidebar
                document.getElementById('buku-grid').innerHTML = html;
            })
            .catch(error => console.error('Error fetching data:', error));
        }

        // Live Search saat mengetik (Debounce 300ms)
        searchInput.addEventListener('keyup', function () {
            clearTimeout(timeout);
            timeout = setTimeout(fetchBuku, 300);
        });

        // Filter saat tombol kategori diklik
        window.filterKategori = function(namaKategori, element) {
            kategoriAktif = namaKategori;

            document.querySelectorAll('.filter-btn').forEach(btn => btn.classList.remove('active'));
            element.classList.add('active');

            fetchBuku();
        }
    });
</script>

@endsection