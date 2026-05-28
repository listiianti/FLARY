@extends('layouts.app-admin')

@section('title', 'Beranda Admin')

@section('content')
<style>
    .stat-card {
        border: none; border-radius: 16px;
        background: rgba(255,255,255,0.9) !important;
        backdrop-filter: blur(5px);
        transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
    }
    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 24px rgba(26,35,126,0.1) !important;
    }
    .icon-box {
        width: 60px; height: 60px; border-radius: 14px;
        display: flex; align-items: center; justify-content: center; font-size: 24px;
    }
    .table-container {
        background: rgba(255,255,255,0.9);
        backdrop-filter: blur(5px);
        border-radius: 16px;
        border: 1px solid rgba(233,236,239,0.6);
    }
    .chart-container {
        background: rgba(255,255,255,0.9);
        backdrop-filter: blur(5px);
        border-radius: 16px;
        border: 1px solid rgba(233,236,239,0.6);
    }
</style>

<div class="container-fluid">

    <header class="d-flex justify-content-between align-items-center mb-5 flex-wrap gap-3">
        <div>
            <h2 class="h3 fw-bold text-dark mb-1">Beranda Admin 🛡️</h2>
            <p class="text-muted small mb-0">Pantau seluruh aktivitas perpustakaan digital Flary.</p>
        </div>
        <span class="badge bg-white shadow-sm text-dark p-2 border border-secondary-subtle">
            <i class="far fa-calendar-alt text-primary me-2"></i>
            {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}
        </span>
    </header>

    {{-- STATISTIK --}}
    <div class="row g-4 mb-5">
        <div class="col-6 col-md-2">
            <div class="card stat-card shadow-sm p-3 h-100">
                <div class="card-body p-2">
                    <div class="icon-box bg-primary bg-opacity-10 text-primary mb-3">
                        <i class="fas fa-book"></i>
                    </div>
                    <span class="d-block display-6 fw-bold text-dark">{{ $totalBuku }}</span>
                    <p class="text-muted small mb-0">Total Buku</p>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-2">
            <div class="card stat-card shadow-sm p-3 h-100">
                <div class="card-body p-2">
                    <div class="icon-box bg-success bg-opacity-10 text-success mb-3">
                        <i class="fas fa-book-reader"></i>
                    </div>
                    <span class="d-block display-6 fw-bold text-dark">{{ $totalDipinjam }}</span>
                    <p class="text-muted small mb-0">Dipinjam</p>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-2">
            <div class="card stat-card shadow-sm p-3 h-100">
                <div class="card-body p-2">
                    <div class="icon-box bg-danger bg-opacity-10 text-danger mb-3">
                        <i class="fas fa-exclamation-circle"></i>
                    </div>
                    <span class="d-block display-6 fw-bold text-dark">{{ $totalTerlambat }}</span>
                    <p class="text-muted small mb-0">Terlambat</p>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-2">
            <div class="card stat-card shadow-sm p-3 h-100">
                <div class="card-body p-2">
                    <div class="icon-box bg-info bg-opacity-10 text-info mb-3">
                        <i class="fas fa-users"></i>
                    </div>
                    <span class="d-block display-6 fw-bold text-dark">{{ $totalPengguna }}</span>
                    <p class="text-muted small mb-0">Peminjam</p>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-2">
            <div class="card stat-card shadow-sm p-3 h-100">
                <div class="card-body p-2">
                    <div class="icon-box bg-purple bg-opacity-10 mb-3" style="background:#f3e8ff;">
                        <i class="fas fa-user-tie" style="color:#6200ea;"></i>
                    </div>
                    <span class="d-block display-6 fw-bold text-dark">{{ $totalPetugas }}</span>
                    <p class="text-muted small mb-0">Petugas</p>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-2">
            <div class="card stat-card shadow-sm p-3 h-100">
                <div class="card-body p-2">
                    <div class="icon-box bg-warning bg-opacity-10 text-warning mb-3">
                        <i class="fas fa-wallet"></i>
                    </div>
                    <span class="d-block h5 fw-bold text-dark">Rp {{ number_format($totalDenda, 0, ',', '.') }}</span>
                    <p class="text-muted small mb-0">Total Denda</p>
                </div>
            </div>
        </div>
    </div>

    {{-- TABEL + AKSI CEPAT --}}
    <div class="row g-4 mb-5">
        <div class="col-12 col-lg-8">
            <div class="table-container p-4 shadow-sm h-100">
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
                                <th>Batas Kembali</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody class="small">
                            @forelse($peminjaman as $item)
                            <tr>
                                <td class="fw-bold">{{ $item->user->name ?? '-' }}</td>
                                <td>{{ $item->buku->judul ?? '-' }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal_kembali)->translatedFormat('d M Y') }}</td>
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
                                <td colspan="4" class="text-center text-muted py-3">Belum ada data peminjaman.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-4">
            <div class="chart-container p-4 shadow-sm h-100">
                <h3 class="h6 fw-bold text-dark mb-4">
                    <i class="fas fa-bolt text-warning me-2"></i>Aksi Cepat
                </h3>
                <div class="d-grid gap-3">
                    <a href="{{ route('petugas.buku.create') }}" class="btn btn-outline-primary rounded-3 text-start">
                        <i class="fas fa-plus me-2"></i>Tambah Buku Baru
                    </a>
                    <a href="{{ route('admin.petugas.create') }}" class="btn btn-outline-secondary rounded-3 text-start">
                        <i class="fas fa-user-plus me-2"></i>Tambah Petugas
                    </a>
                    <a href="{{ route('admin.laporan.index') }}" class="btn btn-outline-success rounded-3 text-start">
                        <i class="fas fa-chart-bar me-2"></i>Lihat Laporan
                    </a>
                    <a href="{{ route('petugas.pengembalian.index') }}" class="btn btn-outline-warning rounded-3 text-start">
                        <i class="fas fa-undo me-2"></i>Catat Pengembalian
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection