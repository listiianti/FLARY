@extends('layouts.app-petugas')

@section('title', 'Kelola Denda')

@section('content')
<style>
    .stat-card {
        border: none; border-radius: 16px;
        background: rgba(255,255,255,0.9) !important;
        backdrop-filter: blur(5px);
    }
    .table-container {
        background: rgba(255,255,255,0.9);
        backdrop-filter: blur(5px);
        border-radius: 16px;
        border: 1px solid rgba(233,236,239,0.6);
    }
</style>

<div class="container-fluid">

    <header class="mb-5">
        <h2 class="h3 fw-bold text-dark mb-1">Kelola Denda</h2>
        <p class="text-muted small mb-0">Daftar peminjam yang memiliki denda keterlambatan.</p>
    </header>

    {{-- TOTAL DENDA --}}
    <div class="row g-4 mb-5">
        <div class="col-12 col-md-4">
            <div class="card stat-card shadow-sm p-3">
                <div class="card-body d-flex justify-content-between align-items-center p-2">
                    <div>
                        <span class="d-block h4 fw-bold text-dark mb-1">
                            Rp {{ number_format($totalDenda, 0, ',', '.') }}
                        </span>
                        <p class="text-muted small mb-0 fw-medium">Total Denda Tertunggak</p>
                    </div>
                    <div style="width:60px;height:60px;border-radius:14px;" class="d-flex align-items-center justify-content-center bg-danger bg-opacity-10 text-danger fs-4">
                        <i class="fas fa-wallet"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="card stat-card shadow-sm p-3">
                <div class="card-body d-flex justify-content-between align-items-center p-2">
                    <div>
                        <span class="d-block h4 fw-bold text-dark mb-1">{{ $denda->count() }}</span>
                        <p class="text-muted small mb-0 fw-medium">Jumlah Kasus Denda</p>
                    </div>
                    <div style="width:60px;height:60px;border-radius:14px;" class="d-flex align-items-center justify-content-center bg-warning bg-opacity-10 text-warning fs-4">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(session('sukses'))
        <div class="alert alert-success rounded-3 border-0 shadow-sm mb-4">
            <i class="fas fa-check-circle me-2"></i>{{ session('sukses') }}
        </div>
    @endif

    <div class="table-container p-4 shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr class="small text-muted">
                        <th>#</th>
                        <th>Peminjam</th>
                        <th>Judul Buku</th>
                        <th>Batas Kembali</th>
                        <th>Hari Terlambat</th>
                        <th>Total Denda</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="small">
                    @forelse($denda as $i => $item)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>
                            <div class="fw-bold">{{ $item->user->name ?? '-' }}</div>
                            <div class="text-muted small">{{ $item->user->email ?? '' }}</div>
                        </td>
                        <td>{{ $item->buku->judul ?? '-' }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal_kembali)->translatedFormat('d M Y') }}</td>
                        <td><span class="badge bg-danger rounded-pill">{{ $item->hari_terlambat }} hari</span></td>
                        <td class="fw-bold text-danger">Rp {{ number_format($item->total_denda, 0, ',', '.') }}</td>
                        <td>
                            @if($item->status === 'terlambat')
                                <span class="badge bg-danger rounded-pill">Belum Kembali</span>
                            @else
                                <span class="badge bg-warning text-dark rounded-pill">Sudah Kembali</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <button type="button"
                                    class="btn btn-sm btn-outline-primary rounded-pill"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modal-detail-{{ $item->id }}">
                                    <i class="fas fa-eye me-1"></i>Detail
                                </button>
                                @if($item->status !== 'dikembalikan')
                                <form action="{{ route('petugas.denda.lunas', $item->id) }}" method="POST">
                                    @csrf @method('PATCH')
                                    <button type="submit"
                                        class="btn btn-sm btn-success rounded-pill"
                                        onclick="return confirm('Tandai denda ini sebagai lunas?')">
                                        <i class="fas fa-check me-1"></i>Lunas
                                    </button>
                                </form>
                                @endif
                            </div>
                        </td>
                    </tr>

                    {{-- MODAL DETAIL --}}
                    <div class="modal fade" id="modal-detail-{{ $item->id }}" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content rounded-4 border-0 shadow">
                                <div class="modal-header border-0 pb-0">
                                    <h5 class="modal-title fw-bold">Detail Peminjam</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body pt-2">
                                    <table class="table table-borderless small mb-0">
                                        <tr>
                                            <td class="text-muted" width="40%">Nama</td>
                                            <td class="fw-bold">{{ $item->user->name ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Email</td>
                                            <td>{{ $item->user->email ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Judul Buku</td>
                                            <td>{{ $item->buku->judul ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Tgl Pinjam</td>
                                            <td>{{ \Carbon\Carbon::parse($item->tanggal_pinjam)->translatedFormat('d M Y') }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Batas Kembali</td>
                                            <td>{{ \Carbon\Carbon::parse($item->tanggal_kembali)->translatedFormat('d M Y') }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Hari Terlambat</td>
                                            <td><span class="badge bg-danger rounded-pill">{{ $item->hari_terlambat }} hari</span></td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Total Denda</td>
                                            <td class="fw-bold text-danger">Rp {{ number_format($item->total_denda, 0, ',', '.') }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Status</td>
                                            <td>
                                                @if($item->status === 'terlambat')
                                                    <span class="badge bg-danger rounded-pill">Belum Kembali</span>
                                                @else
                                                    <span class="badge bg-success rounded-pill">Lunas</span>
                                                @endif
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="modal-footer border-0 pt-0">
                                    <button type="button" class="btn btn-secondary rounded-pill btn-sm" data-bs-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted py-3">Tidak ada denda tertunggak.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection