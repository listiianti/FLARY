@extends('layouts.app-petugas')

@section('title', 'Dashboard Petugas')

@section('content')
<style>
    .stat-card {
        border: none;
        border-radius: 16px;
        background: rgba(255,255,255,0.9) !important;
        backdrop-filter: blur(5px);
        transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
    }
    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 24px rgba(98,0,234,0.1) !important;
    }
    .icon-box {
        width: 60px; height: 60px;
        border-radius: 14px;
        display: flex; align-items: center; justify-content: center;
        font-size: 24px;
    }
    .table-container {
        background: rgba(255,255,255,0.9);
        backdrop-filter: blur(5px);
        border-radius: 16px;
        border: 1px solid rgba(233,236,239,0.6);
    }
</style>

<div class="container-fluid">

    <header class="d-flex justify-content-between align-items-center mb-5 flex-wrap gap-3">
        <div>
            <h2 class="h3 fw-bold text-dark mb-1">Dashboard Petugas 👋</h2>
            <p class="text-muted small mb-0">Pantau aktivitas perpustakaan hari ini.</p>
        </div>
        <span class="badge bg-white shadow-sm text-dark p-2 border border-secondary-subtle">
            <i class="far fa-calendar-alt text-primary me-2"></i>
            {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}
        </span>
    </header>

    {{-- STATISTIK --}}
    <div class="row g-4 mb-5">
        <div class="col-6 col-md-3">
            <div class="card stat-card shadow-sm p-3 h-100">
                <div class="card-body d-flex justify-content-between align-items-center p-2">
                    <div>
                        <span class="d-block h3 fw-bold text-dark mb-1">{{ $totalBuku }}</span>
                        <p class="text-muted small mb-0 fw-medium">Total Buku</p>
                    </div>
                    <div class="icon-box bg-primary bg-opacity-10 text-primary flex-shrink-0">
                        <i class="fas fa-book"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card stat-card shadow-sm p-3 h-100">
                <div class="card-body d-flex justify-content-between align-items-center p-2">
                    <div>
                        <span class="d-block h3 fw-bold text-dark mb-1">{{ $totalDipinjam }}</span>
                        <p class="text-muted small mb-0 fw-medium">Sedang Dipinjam</p>
                    </div>
                    <div class="icon-box bg-success bg-opacity-10 text-success flex-shrink-0">
                        <i class="fas fa-book-reader"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card stat-card shadow-sm p-3 h-100">
                <div class="card-body d-flex justify-content-between align-items-center p-2">
                    <div>
                        <span class="d-block h3 fw-bold text-dark mb-1">{{ $totalTerlambat }}</span>
                        <p class="text-muted small mb-0 fw-medium">Terlambat</p>
                    </div>
                    <div class="icon-box bg-danger bg-opacity-10 text-danger flex-shrink-0">
                        <i class="fas fa-exclamation-circle"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card stat-card shadow-sm p-3 h-100">
                <div class="card-body d-flex justify-content-between align-items-center p-2">
                    <div>
                        <span class="d-block h3 fw-bold text-dark mb-1">{{ $totalPengguna }}</span>
                        <p class="text-muted small mb-0 fw-medium">Total Peminjam</p>
                    </div>
                    <div class="icon-box bg-warning bg-opacity-10 text-warning flex-shrink-0">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- TABEL PEMINJAMAN TERBARU --}}
    <div class="table-container p-4 shadow-sm">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="h6 fw-bold text-dark mb-0">
                <i class="fas fa-clock text-primary me-2"></i>Peminjaman Terbaru
            </h3>
            <a href="{{ route('petugas.peminjaman.index') }}" class="small text-decoration-none text-primary">Lihat Semua</a>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr class="small text-muted">
                        <th>Peminjam</th>
                        <th>Judul Buku</th>
                        <th>Tgl Pinjam</th>
                        <th>Batas Kembali</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody class="small">
                    @forelse($peminjaman as $item)
                    <tr>
                        <td class="fw-bold">{{ $item->user->name ?? '-' }}</td>
                        <td>{{ $item->buku->judul ?? '-' }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal_pinjam)->translatedFormat('d F Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal_kembali)->translatedFormat('d F Y') }}</td>
                        <td>
                            @if($item->status === 'dipinjam')
                                <span class="badge bg-success rounded-pill">Dipinjam</span>
                            @elseif($item->status === 'terlambat')
                                <span class="badge bg-danger rounded-pill">Terlambat</span>
                            @elseif($item->status === 'dikembalikan')
                                <span class="badge bg-secondary rounded-pill">Dikembalikan</span>
                            @elseif($item->status === 'ditolak')
                                <span class="badge bg-dark rounded-pill">Ditolak</span>
                            @else
                                <span class="badge bg-warning text-dark rounded-pill">Menunggu</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted py-3">Belum ada data peminjaman.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection