@extends('layouts.app-petugas')

@section('title', 'Catat Pengembalian')

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
        <h2 class="h3 fw-bold text-dark mb-1">Catat Pengembalian</h2>
        <p class="text-muted small mb-0">Catat buku yang sudah dikembalikan oleh peminjam.</p>
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
                        <th>Sisa Hari</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="small">
                    @forelse($peminjaman as $i => $item)
                    @php
                        $sisaHari = (int) \Carbon\Carbon::now()->startOfDay()
                                        ->diffInDays(\Carbon\Carbon::parse($item->tanggal_kembali)->startOfDay(), false);
                    @endphp
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td class="fw-bold">{{ $item->user->name ?? '-' }}</td>
                        <td>{{ $item->buku->judul ?? '-' }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal_pinjam)->translatedFormat('d M Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal_kembali)->translatedFormat('d M Y') }}</td>
                        <td>
                            @if($sisaHari < 0)
                                <span class="badge bg-danger rounded-pill">Terlambat {{ abs($sisaHari) }} hari</span>
                            @elseif($sisaHari == 0)
                                <span class="badge bg-warning text-dark rounded-pill">Hari ini!</span>
                            @else
                                <span class="badge bg-success rounded-pill">{{ $sisaHari }} hari lagi</span>
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('petugas.pengembalian.catat', $item->id) }}" method="POST"
                                  onsubmit="return confirm('Catat pengembalian buku ini?')">
                                @csrf @method('PATCH')
                                <button class="btn btn-sm text-white rounded-3"
                                        style="background:linear-gradient(135deg,#6200ea,#9d4edd);">
                                    <i class="fas fa-undo me-1"></i>Catat
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted py-3">Tidak ada buku yang sedang dipinjam.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection