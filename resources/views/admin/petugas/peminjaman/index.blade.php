@extends('layouts.app-petugas')

@section('title', 'Kelola Peminjaman')

@section('content')
<style>
    .table-container {
        background: rgba(255,255,255,0.9);
        backdrop-filter: blur(5px);
        border-radius: 16px;
        border: 1px solid rgba(233,236,239,0.6);
    }
</style>

<div class="container-fluid">

    <header class="mb-5">
        <h2 class="h3 fw-bold text-dark mb-1">Kelola Peminjaman</h2>
        <p class="text-muted small mb-0">Approve atau tolak permintaan peminjaman buku.</p>
    </header>

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
                        <th>Tgl Pinjam</th>
                        <th>Batas Kembali</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="small">
                    @forelse($peminjaman as $i => $item)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td class="fw-bold">{{ $item->user->name ?? '-' }}</td>
                        <td>{{ $item->buku->judul ?? '-' }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal_pinjam)->translatedFormat('d M Y') }}</td>
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
                        <td>
                            @if($item->status === 'menunggu')
                                <form action="{{ route('petugas.peminjaman.approve', $item->id) }}" method="POST" class="d-inline">
                                    @csrf @method('PATCH')
                                    <button class="btn btn-sm btn-success rounded-3 me-1">
                                        <i class="fas fa-check"></i> Approve
                                    </button>
                                </form>
                                <form action="{{ route('petugas.peminjaman.tolak', $item->id) }}" method="POST" class="d-inline">
                                    @csrf @method('PATCH')
                                    <button class="btn btn-sm btn-danger rounded-3">
                                        <i class="fas fa-times"></i> Tolak
                                    </button>
                                </form>
                            @else
                                <span class="text-muted small">—</span>
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
@endsection