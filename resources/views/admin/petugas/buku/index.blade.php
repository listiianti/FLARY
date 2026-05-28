@extends('layouts.app-petugas')

@section('title', 'Kelola Buku')

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

    <header class="d-flex justify-content-between align-items-center mb-5 flex-wrap gap-3">
        <div>
            <h2 class="h3 fw-bold text-dark mb-1">Kelola Buku</h2>
            <p class="text-muted small mb-0">Tambah, edit, atau hapus koleksi buku perpustakaan.</p>
        </div>
        <a href="{{ route('petugas.buku.create') }}"
           class="btn text-white px-4 py-2 rounded-3"
           style="background: linear-gradient(135deg,#6200ea,#9d4edd);">
            <i class="fas fa-plus me-2"></i>Tambah Buku
        </a>
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
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Kategori</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="small">
                    @forelse($bukus as $i => $buku)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td class="fw-bold">{{ $buku->judul }}</td>
                        <td>{{ $buku->penulis }}</td>
                        <td>
                            <span class="badge rounded-pill" style="background:#f3e8ff;color:#6200ea;">
                                {{ $buku->kategori->first()->nama_kategori ?? 'Umum' }}
                            </span>
                        </td>
                        <td>
                            <span class="badge {{ $buku->stok > 0 ? 'bg-success' : 'bg-danger' }} rounded-pill">
                                {{ $buku->stok }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('petugas.buku.edit', $buku->id) }}"
                               class="btn btn-sm btn-outline-primary rounded-3 me-1">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('petugas.buku.destroy', $buku->id) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Yakin ingin menghapus buku ini?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger rounded-3">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted py-3">Belum ada data buku.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection