@extends('layouts.app-admin')

@section('title', 'Laporan Statistik')

@section('content')
<style>
    .stat-card {
        border: none; border-radius: 16px;
        background: rgba(255,255,255,0.9) !important;
        backdrop-filter: blur(5px);
    }
    .table-container, .chart-container {
        background: rgba(255,255,255,0.9);
        backdrop-filter: blur(5px);
        border-radius: 16px;
        border: 1px solid rgba(233,236,239,0.6);
    }
</style>

<div class="container-fluid">

    <header class="mb-5">
        <h2 class="h3 fw-bold text-dark mb-1">Laporan & Statistik</h2>
        <p class="text-muted small mb-0">Ringkasan aktivitas perpustakaan secara keseluruhan.</p>
    </header>

    {{-- RINGKASAN --}}
    <div class="row g-4 mb-5">
        <div class="col-12 col-md-4">
            <div class="card stat-card shadow-sm p-3">
                <div class="card-body d-flex justify-content-between align-items-center p-2">
                    <div>
                        <span class="d-block display-6 fw-bold text-dark">{{ $peminjaman->count() }}</span>
                        <p class="text-muted small mb-0">Total Peminjaman</p>
                    </div>
                    <div style="width:60px;height:60px;border-radius:14px;" class="d-flex align-items-center justify-content-center bg-primary bg-opacity-10 text-primary fs-4">
                        <i class="fas fa-book-reader"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="card stat-card shadow-sm p-3">
                <div class="card-body d-flex justify-content-between align-items-center p-2">
                    <div>
                        <span class="d-block display-6 fw-bold text-dark">{{ $bukuTerpopuler->count() }}</span>
                        <p class="text-muted small mb-0">Buku Terpopuler</p>
                    </div>
                    <div style="width:60px;height:60px;border-radius:14px;" class="d-flex align-items-center justify-content-center bg-success bg-opacity-10 text-success fs-4">
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="card stat-card shadow-sm p-3">
                <div class="card-body d-flex justify-content-between align-items-center p-2">
                    <div>
                        <span class="d-block h5 fw-bold text-dark">Rp {{ number_format($totalDenda, 0, ',', '.') }}</span>
                        <p class="text-muted small mb-0">Total Denda</p>
                    </div>
                    <div style="width:60px;height:60px;border-radius:14px;" class="d-flex align-items-center justify-content-center bg-danger bg-opacity-10 text-danger fs-4">
                        <i class="fas fa-wallet"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-5">

        {{-- GRAFIK PER BULAN --}}
        <div class="col-12 col-lg-7">
            <div class="chart-container p-4 shadow-sm h-100">
                <h3 class="h6 fw-bold text-dark mb-4">
                    <i class="fas fa-chart-bar text-primary me-2"></i>Peminjaman per Bulan
                </h3>
                <canvas id="chartBulan" height="120"></canvas>
            </div>
        </div>

        {{-- BUKU TERPOPULER --}}
        <div class="col-12 col-lg-5">
            <div class="table-container p-4 shadow-sm h-100">
                <h3 class="h6 fw-bold text-dark mb-4">
                    <i class="fas fa-star text-warning me-2"></i>Buku Terpopuler
                </h3>
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0 small">
                        <thead class="table-light">
                            <tr class="text-muted">
                                <th>#</th>
                                <th>Judul</th>
                                <th>Dipinjam</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($bukuTerpopuler as $i => $buku)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td class="fw-bold">{{ $buku->judul }}</td>
                                <td>
                                    <span class="badge bg-primary rounded-pill">{{ $buku->peminjaman_count }}x</span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center text-muted py-3">Belum ada data.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    {{-- TABEL SEMUA PEMINJAMAN --}}
    <div class="table-container p-4 shadow-sm">
        <h3 class="h6 fw-bold text-dark mb-4">
            <i class="fas fa-list text-primary me-2"></i>Semua Riwayat Peminjaman
        </h3>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0 small">
                <thead class="table-light">
                    <tr class="text-muted">
                        <th>#</th>
                        <th>Peminjam</th>
                        <th>Judul Buku</th>
                        <th>Tgl Pinjam</th>
                        <th>Batas Kembali</th>
                        <th>Dikembalikan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($peminjaman as $i => $item)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td class="fw-bold">{{ $item->user->name ?? '-' }}</td>
                        <td>{{ $item->buku->judul ?? '-' }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal_pinjam)->translatedFormat('d M Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal_kembali)->translatedFormat('d M Y') }}</td>
                        <td>{{ $item->tanggal_dikembalikan ? \Carbon\Carbon::parse($item->tanggal_dikembalikan)->translatedFormat('d M Y') : '-' }}</td>
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
                        <td colspan="7" class="text-center text-muted py-3">Belum ada data peminjaman.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

<script>
    const bulan = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'];
    const dataBulan = @json($perBulan);

    const labels = dataBulan.map(d => bulan[d.bulan - 1]);
    const values = dataBulan.map(d => d.total);

    new Chart(document.getElementById('chartBulan'), {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Jumlah Peminjaman',
                data: values,
                backgroundColor: 'rgba(98, 0, 234, 0.2)',
                borderColor: 'rgba(98, 0, 234, 1)',
                borderWidth: 2,
                borderRadius: 8,
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: false } },
            scales: {
                y: { beginAtZero: true, ticks: { stepSize: 1 } }
            }
        }
    });
</script>

@endsection