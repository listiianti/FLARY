@extends('layouts.app-admin')

@section('title', 'Kelola Peminjam')

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
        <h2 class="h3 fw-bold text-dark mb-1">Kelola Peminjam</h2>
        <p class="text-muted small mb-0">Daftar seluruh pengguna dengan role peminjam.</p>
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
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>Terdaftar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="small">
                    @forelse($users as $i => $user)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td class="fw-bold">{{ $user->name }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->alamat ?? '-' }}</td>
                        <td>{{ $user->created_at->translatedFormat('d M Y') }}</td>
                        <td>
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger rounded-3">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted py-3">Belum ada data peminjam.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection