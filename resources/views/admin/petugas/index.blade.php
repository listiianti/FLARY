@extends('layouts.app-admin')

@section('title', 'Manajemen Petugas')

@section('content')

<style>
    .main-card {
        border: none;
        border-radius: 20px;
        background: white;
        box-shadow: 0 10px 40px rgba(0,0,0,0.08);
    }

    .btn-tambah {
        background: linear-gradient(135deg, #6200ea, #9d4edd);
        color: white;
        border: none;
        border-radius: 12px;
        padding: 10px 24px;
        font-weight: 600;
        font-size: 14px;
        transition: all 0.3s;
        text-decoration: none;
        display: inline-block;
    }

    .btn-tambah:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(98,0,234,0.3);
        color: white;
    }

    .btn-hapus {
        border: 2px solid #ff4d4d;
        color: #ff4d4d;
        background: white;
        border-radius: 8px;
        padding: 5px 14px;
        font-weight: 600;
        font-size: 12px;
        transition: all 0.2s;
    }

    .btn-hapus:hover {
        background: #ff4d4d;
        color: white;
    }

    .avatar-circle {
        width: 38px;
        height: 38px;
        border-radius: 50%;
        background: linear-gradient(135deg, #6200ea, #9d4edd);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 700;
        font-size: 14px;
        flex-shrink: 0;
    }

    table thead th {
        font-size: 13px;
        font-weight: 600;
        color: #888;
        border-bottom: 2px solid #f0f0f0;
        padding: 14px 16px;
    }

    table tbody td {
        font-size: 14px;
        padding: 14px 16px;
        vertical-align: middle;
        border-bottom: 1px solid #f5f5f5;
    }

    table tbody tr:last-child td {
        border-bottom: none;
    }

    table tbody tr:hover td {
        background: #fafafa;
    }
</style>

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-1">Manajemen Petugas</h4>
            <p class="text-muted small mb-0">Kelola akun petugas perpustakaan.</p>
        </div>
        <a href="{{ route('admin.petugas.create') }}" class="btn-tambah">
            <i class="fas fa-plus me-2"></i> Tambah Petugas
        </a>
    </div>

    @if(session('sukses'))
        <div class="alert alert-success rounded-3 mb-4">
            <i class="fas fa-check-circle me-2"></i>{{ session('sukses') }}
        </div>
    @endif

    <div class="main-card p-4">
        @if($petugas->count() > 0)
            <div class="table-responsive">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($petugas as $index => $p)
                            <tr>
                                <td class="text-muted">{{ $index + 1 }}</td>
                                <td>
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="avatar-circle">
                                            {{ strtoupper(substr($p->name, 0, 1)) }}
                                        </div>
                                        <span class="fw-semibold">{{ $p->name }}</span>
                                    </div>
                                </td>
                                <td>{{ $p->username }}</td>
                                <td>{{ $p->email }}</td>
                                <td>{{ $p->alamat ?? '-' }}</td>
                                <td>
                                    <form action="{{ route('admin.petugas.destroy', $p->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin hapus petugas ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-hapus">
                                            <i class="fas fa-trash me-1"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="text-center py-5 text-muted">
                <i class="fas fa-users mb-3" style="font-size: 2.5rem; opacity: 0.3;"></i>
                <p class="mb-0">Belum ada petugas terdaftar.</p>
            </div>
        @endif
    </div>

</div>

@endsection