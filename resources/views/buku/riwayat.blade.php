@extends('layouts.app')

@section('title', 'Riwayat Pinjam')

@section('content')

<style>
    .top-header{
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 35px;
        flex-wrap: wrap;
        gap: 20px;
    }

    .top-header h1{
        font-size: 32px;
        font-weight: 700;
        color: #222;
    }

    .top-header p{
        color: #666;
        font-size: 15px;
        margin-bottom: 0;
    }

    .date-box{
        background: white;
        padding: 12px 20px;
        border-radius: 14px;
        border: 1px solid #eee;
        font-weight: 600;
        box-shadow: 0 3px 10px rgba(0,0,0,.04);
    }

    .summary-card{
        background: rgba(255,255,255,.9);
        backdrop-filter: blur(5px);
        border-radius: 20px;
        padding: 25px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 5px 20px rgba(0,0,0,.04);
        height: 100%;
        cursor: pointer;
        transition: all 0.3s;
    }

    .summary-card:hover{
        transform: translateY(-4px);
        box-shadow: 0 10px 30px rgba(0,0,0,.08);
    }

    .summary-card h2{
        font-size: 34px;
        font-weight: 700;
        margin-bottom: 5px;
    }

    .summary-card p{
        margin-bottom: 0;
        color: #666;
        font-size: 14px;
    }

    .summary-icon{
        width: 70px;
        height: 70px;
        border-radius: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 28px;
    }

    .purple{ background: #ede7ff; color: #6d28d9; }
    .green{ background: #e7fff0; color: #15803d; }
    .red{ background: #ffe8e8; color: #dc2626; }

    .card-box{
        background: rgba(255,255,255,.9);
        backdrop-filter: blur(5px);
        border-radius: 20px;
        padding: 25px;
        box-shadow: 0 5px 20px rgba(0,0,0,.04);
    }

    .search-wrapper{
        position: relative;
        display: flex;
        gap: 12px;
    }

    .search-wrapper input{
        height: 50px;
        border-radius: 12px;
        border: 1px solid #ddd;
        padding-left: 15px;
        min-width: 280px;
    }

    .search-wrapper button{
        border: none;
        background: linear-gradient(135deg, #6200ea, #9d4edd);
        color: white;
        border-radius: 12px;
        padding: 0 22px;
        font-weight: 600;
    }

    .autocomplete-box{
        position: absolute;
        top: 54px;
        left: 0;
        right: 60px;
        background: white;
        border: 1px solid #eee;
        border-radius: 12px;
        box-shadow: 0 8px 24px rgba(0,0,0,.1);
        z-index: 999;
        display: none;
        overflow: hidden;
    }

    .autocomplete-item{
        padding: 12px 16px;
        cursor: pointer;
        font-size: 14px;
        transition: background 0.15s;
        border-bottom: 1px solid #f5f5f5;
    }

    .autocomplete-item:last-child{
        border-bottom: none;
    }

    .autocomplete-item:hover{
        background: #f3f0ff;
    }

    .autocomplete-item mark{
        background: #ede7ff;
        color: #6d28d9;
        font-weight: 700;
        border-radius: 3px;
        padding: 0 2px;
    }

    .table{ margin-top: 20px; }
    .table thead{ background: #f8f9fa; }
    .table th{ padding: 18px !important; font-size: 14px; }
    .table td{ padding: 18px !important; vertical-align: middle; font-size: 14px; }

    .status{
        padding: 7px 14px;
        border-radius: 30px;
        font-size: 12px;
        font-weight: 600;
    }

    .returned{ background: #d8f5e5; color: #15803d; }
    .late{ background: #ffe0e0; color: #dc2626; }
    .borrowed{ background: #fff4cc; color: #ca8a04; }

    mark.highlight{
        background: #ede7ff;
        color: #6d28d9;
        font-weight: 700;
        border-radius: 3px;
        padding: 0 2px;
    }
</style>

<div class="container-fluid">

    <!-- Header -->
    <div class="top-header">
        <div>
            <h1>Riwayat Peminjaman 📚</h1>
            <p>Lihat semua aktivitas peminjaman bukumu di sini.</p>
        </div>
        <div class="date-box">
            <i class="fa-solid fa-calendar-days text-primary"></i>
            {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}
        </div>
    </div>

    <!-- Summary -->
    <div class="row g-4 mb-4">

        <div class="col-md-4">
            <a href="{{ route('buku.riwayat') }}" class="text-decoration-none">
                <div class="summary-card">
                    <div>
                        <h2>{{ $riwayat->count() }}</h2>
                        <p>Total Pinjam</p>
                    </div>
                    <div class="summary-icon purple">
                        <i class="fa-solid fa-book"></i>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <div class="summary-card">
                <div>
                    <h2>{{ $riwayat->where('status', 'dikembalikan')->count() }}</h2>
                    <p>Sudah Kembali</p>
                </div>
                <div class="summary-icon green">
                    <i class="fa-solid fa-circle-check"></i>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="summary-card">
                <div>
                    <h2>{{ $riwayat->where('status', 'terlambat')->count() }}</h2>
                    <p>Terlambat</p>
                </div>
                <div class="summary-icon red">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                </div>
            </div>
        </div>

    </div>

    <!-- Table -->
    <div class="card-box">

        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-3">
            <h4 class="fw-bold mb-0">
                <i class="fa-solid fa-clock-rotate-left text-primary"></i>
                Data Riwayat
            </h4>
            <div class="search-wrapper">
                <div style="position:relative;">
                    <input
                        type="text"
                        id="searchInput"
                        class="form-control"
                        placeholder="Cari judul buku..."
                        autocomplete="off"
                    >
                    <div class="autocomplete-box" id="autocompleteBox"></div>
                </div>
                <button type="button" id="searchBtn">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>Judul Buku</th>
                        <th>Tanggal Pinjam</th>
                        <th>Batas Kembali</th>
                        <th>Tanggal Kembali</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @forelse($riwayat as $item)
                    <tr class="riwayat-row">
                        <td class="fw-semibold judul-buku">
                            {{ $item->buku->judul ?? '-' }}
                        </td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal_pinjam)->translatedFormat('d F Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal_kembali)->translatedFormat('d F Y') }}</td>
                        <td>{{ $item->tanggal_dikembalikan ? \Carbon\Carbon::parse($item->tanggal_dikembalikan)->translatedFormat('d F Y') : '-' }}</td>
                        <td>
                            @if($item->status == 'dikembalikan')
                                <span class="status returned">Sudah Kembali</span>
                            @elseif($item->status == 'terlambat')
                                <span class="status late">Terlambat</span>
                            @else
                                <span class="status borrowed">Dipinjam</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">
                            <i class="fa-solid fa-book-open fa-2x mb-2 d-block"></i>
                            Belum ada riwayat peminjaman.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            <div id="noResult" class="text-center text-muted py-4" style="display:none;">
                <i class="fa-solid fa-magnifying-glass fa-2x mb-2 d-block"></i>
                Buku "<span id="keyword"></span>" tidak ditemukan.
            </div>
        </div>

    </div>

</div>

<script>
    const searchInput   = document.getElementById('searchInput');
    const searchBtn     = document.getElementById('searchBtn');
    const autocompleteBox = document.getElementById('autocompleteBox');
    const rows          = document.querySelectorAll('.riwayat-row');
    const noResult      = document.getElementById('noResult');
    const keywordSpan   = document.getElementById('keyword');

    // Kumpulkan semua judul dari tabel
    const allJudul = [];
    rows.forEach(row => {
        allJudul.push(row.querySelector('.judul-buku').textContent.trim());
    });

    function escapeRegex(str) {
        return str.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
    }

    function highlightText(text, query) {
        if (!query) return text;
        const regex = new RegExp(`(${escapeRegex(query)})`, 'gi');
        return text.replace(regex, '<mark class="highlight">$1</mark>');
    }

    function doSearch(q) {
        q = q.trim();
        let found = 0;

        rows.forEach(row => {
            const judulEl  = row.querySelector('.judul-buku');
            const judulAsli = judulEl.textContent.trim();

            if (judulAsli.toLowerCase().includes(q.toLowerCase()) || q === '') {
                row.style.display = '';
                // Highlight huruf yang cocok
                judulEl.innerHTML = q ? highlightText(judulAsli, q) : judulAsli;
                found++;
            } else {
                row.style.display = 'none';
                judulEl.innerHTML = judulAsli;
            }
        });

        // Prioritas: baris yang dimulai dengan query tampil di atas
        if (q) {
            const tbody = document.getElementById('tableBody');
            const visibleRows = [...rows].filter(r => r.style.display !== 'none');
            const startsWith = visibleRows.filter(r =>
                r.querySelector('.judul-buku').textContent.trim().toLowerCase().startsWith(q.toLowerCase())
            );
            const contains = visibleRows.filter(r =>
                !r.querySelector('.judul-buku').textContent.trim().toLowerCase().startsWith(q.toLowerCase())
            );
            [...startsWith, ...contains].forEach(r => tbody.appendChild(r));
        }

        noResult.style.display = (found === 0 && q !== '') ? 'block' : 'none';
        keywordSpan.textContent = searchInput.value;
    }

    // Autocomplete
    searchInput.addEventListener('input', function () {
        const q = this.value.trim().toLowerCase();
        autocompleteBox.innerHTML = '';

        if (q.length === 0) {
            autocompleteBox.style.display = 'none';
            doSearch('');
            return;
        }

        // Prioritas: mulai dari kata, lalu mengandung kata
        const startsWith = allJudul.filter(j => j.toLowerCase().startsWith(q));
        const contains   = allJudul.filter(j => !j.toLowerCase().startsWith(q) && j.toLowerCase().includes(q));
        const suggestions = [...new Set([...startsWith, ...contains])].slice(0, 6);

        if (suggestions.length > 0) {
            suggestions.forEach(judul => {
                const item = document.createElement('div');
                item.className = 'autocomplete-item';
                item.innerHTML = highlightText(judul, this.value.trim());
                item.addEventListener('click', () => {
                    searchInput.value = judul;
                    autocompleteBox.style.display = 'none';
                    doSearch(judul);
                });
                autocompleteBox.appendChild(item);
            });
            autocompleteBox.style.display = 'block';
        } else {
            autocompleteBox.style.display = 'none';
        }

        doSearch(q);
    });

    searchBtn.addEventListener('click', () => {
        autocompleteBox.style.display = 'none';
        doSearch(searchInput.value);
    });

    searchInput.addEventListener('keydown', (e) => {
        if (e.key === 'Enter') {
            autocompleteBox.style.display = 'none';
            doSearch(searchInput.value);
        }
        if (e.key === 'Escape') {
            autocompleteBox.style.display = 'none';
        }
    });

    // Tutup autocomplete kalau klik di luar
    document.addEventListener('click', (e) => {
        if (!searchInput.contains(e.target) && !autocompleteBox.contains(e.target)) {
            autocompleteBox.style.display = 'none';
        }
    });
</script>

@endsection