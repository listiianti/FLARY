@extends('layouts.app')

@section('title', 'Jelajah Buku')

@section('content')

<style>
    :root {
        --primary-gradient: linear-gradient(135deg, #6200ea, #9d4edd);
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

    .search-wrapper {
        position: relative;
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

    .suggestions-box {
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background: #fff;
        border: 1px solid #dee2e6;
        border-radius: 12px;
        box-shadow: 0 8px 24px rgba(0,0,0,0.1);
        z-index: 100;
        margin-top: 4px;
        overflow: hidden;
        display: none;
    }

    .suggestion-item {
        padding: 10px 16px;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 10px;
        transition: background 0.15s;
    }

    .suggestion-item:hover {
        background-color: #f3f0ff;
    }

    .suggestion-icon {
        width: 36px;
        height: 36px;
        border-radius: 8px;
        background: var(--primary-gradient);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-weight: 700;
        font-size: 13px;
        flex-shrink: 0;
    }

    .suggestion-judul {
        font-weight: 600;
        font-size: 13px;
        color: #222;
    }

    .suggestion-meta {
        font-size: 11px;
        color: #888;
    }

    .filter-btn {
        border-radius: 10px;
        padding: 8px 18px;
        font-weight: 500;
        font-size: 13px;
        transition: all 0.2s;
        white-space: nowrap;
    }

    .filter-btn.active {
        background: var(--primary-gradient);
        color: #fff;
        border-color: transparent;
    }

    .filter-scroll {
        display: flex;
        gap: 8px;
        overflow-x: auto;
        padding-bottom: 6px;
        scrollbar-width: none;
    }

    .filter-scroll::-webkit-scrollbar {
        display: none;
    }
</style>

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
        <div>
            <h2 class="fw-bold mb-1">Jelajah Buku 📚</h2>
            <p class="text-muted mb-0">Temukan berbagai buku menarik untuk dibaca.</p>
        </div>
        <div class="badge bg-white text-dark border shadow-sm p-3">
            <i class="fas fa-book text-primary me-2"></i>
            {{ $bukus->count() }}+ Buku Tersedia
        </div>
    </div>

    {{-- Search Bar --}}
    <div class="mb-3 search-wrapper">
        <input type="text"
            id="search-input"
            class="form-control search-box"
            placeholder="Cari judul buku atau penulis..."
            autocomplete="off">
        <div class="suggestions-box" id="suggestions-box"></div>
    </div>

    {{-- Filter Kategori --}}
    <div class="filter-scroll mb-4">
        <button class="btn btn-outline-secondary filter-btn active" onclick="filterKategori('', this)">Semua</button>
        <button class="btn btn-outline-secondary filter-btn" onclick="filterKategori('Teknologi', this)">Teknologi</button>
        <button class="btn btn-outline-secondary filter-btn" onclick="filterKategori('Fiksi', this)">Fiksi</button>
        <button class="btn btn-outline-secondary filter-btn" onclick="filterKategori('Non-Fiksi', this)">Non-Fiksi</button>
        <button class="btn btn-outline-secondary filter-btn" onclick="filterKategori('Sains', this)">Sains</button>
        <button class="btn btn-outline-secondary filter-btn" onclick="filterKategori('Sejarah', this)">Sejarah</button>
        <button class="btn btn-outline-secondary filter-btn" onclick="filterKategori('Pendidikan', this)">Pendidikan</button>
        <button class="btn btn-outline-secondary filter-btn" onclick="filterKategori('Bisnis', this)">Bisnis</button>
    </div>

    {{-- Label kategori aktif --}}
    <div id="label-kategori" class="mb-3" style="display: none;">
        <span class="text-muted">Menampilkan kategori: </span>
        <span id="nama-kategori-aktif" class="fw-bold text-primary"></span>
    </div>

    {{-- Grid Buku --}}
    <div class="row g-4" id="buku-grid">
        @include('buku._list')
    </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput    = document.getElementById('search-input');
        const suggestionsBox = document.getElementById('suggestions-box');
        const labelKategori  = document.getElementById('label-kategori');
        const namaKategoriEl = document.getElementById('nama-kategori-aktif');
        const suggestionsUrl = "{{ route('buku.suggestions') }}";
        const searchUrl      = "{{ route('buku.search') }}";

        let kategoriAktif = '';
        let timeout = null;

        // ── Fetch grid buku ──
        function fetchBuku() {
            const keyword = searchInput.value;
            const url = `${searchUrl}?search=${encodeURIComponent(keyword)}&kategori=${encodeURIComponent(kategoriAktif)}`;

            fetch(url)
                .then(r => r.text())
                .then(html => {
                    document.getElementById('buku-grid').innerHTML = html;
                });
        }

        // ── Highlight kata yang diketik ──
        function highlight(text, keyword) {
            const regex = new RegExp(`(${keyword.replace(/[.*+?^${}()|[\]\\]/g, '\\$&')})`, 'gi');
            return text.replace(regex, '<mark style="background:#ede7f6;color:#6200ea;font-weight:700;border-radius:3px;padding:0 2px;">$1</mark>');
        }

        // ── Fetch suggestions ──
        function fetchSuggestions() {
            const keyword = searchInput.value.trim();

            if (keyword.length === 0) {
                suggestionsBox.style.display = 'none';
                suggestionsBox.innerHTML = '';
                fetchBuku();
                return;
            }

            const url = `${suggestionsUrl}?search=${encodeURIComponent(keyword)}&kategori=${encodeURIComponent(kategoriAktif)}`;

            fetch(url)
                .then(r => r.json())
                .then(data => {
                    if (data.length === 0) {
                        suggestionsBox.style.display = 'none';
                        suggestionsBox.innerHTML = '';
                        return;
                    }

                    suggestionsBox.innerHTML = data.map(buku => {
                        const inisial = buku.judul.split(' ').slice(0, 2).map(w => w[0].toUpperCase()).join('');
                        const judulHighlight   = highlight(buku.judul, keyword);
                        const penulisHighlight = highlight(buku.penulis, keyword);

                        return `
                            <div class="suggestion-item" onclick="pilihSuggestion('${buku.judul.replace(/'/g, "\\'")}', ${buku.id})">
                                <div class="suggestion-icon">${inisial}</div>
                                <div>
                                    <div class="suggestion-judul">${judulHighlight}</div>
                                    <div class="suggestion-meta">${penulisHighlight} &bull; ${buku.kategori}</div>
                                </div>
                            </div>
                        `;
                    }).join('');

                    suggestionsBox.style.display = 'block';
                });

            fetchBuku();
        }

        // ── Pilih suggestion ──
        window.pilihSuggestion = function(judul, id) {
            searchInput.value = judul;
            suggestionsBox.style.display = 'none';
            fetchBuku();
        }

        // ── Sembunyikan suggestions saat klik di luar ──
        document.addEventListener('click', function(e) {
            if (!searchInput.contains(e.target) && !suggestionsBox.contains(e.target)) {
                suggestionsBox.style.display = 'none';
            }
        });

        // ── Event search input ──
        searchInput.addEventListener('input', function () {
            clearTimeout(timeout);
            timeout = setTimeout(fetchSuggestions, 250);
        });

        // ── Filter kategori ──
        window.filterKategori = function(namaKategori, element) {
            kategoriAktif = namaKategori;

            document.querySelectorAll('.filter-btn').forEach(btn => btn.classList.remove('active'));
            element.classList.add('active');

            if (namaKategori) {
                labelKategori.style.display = 'block';
                namaKategoriEl.textContent = namaKategori;
            } else {
                labelKategori.style.display = 'none';
            }

            searchInput.value = '';
            suggestionsBox.style.display = 'none';
            fetchBuku();
        }
    });
</script>

@endsection