@extends('layouts.app-admin')

@section('title', 'Tambah Petugas')

@section('content')

<style>
    .form-card {
        border: none;
        border-radius: 20px;
        background: white;
        box-shadow: 0 10px 40px rgba(0,0,0,0.08);
    }

    .form-control, .form-select {
        border-radius: 10px;
        border: 1px solid #e0e0e0;
        padding: 12px 16px;
        font-size: 14px;
        transition: all 0.2s;
    }

    .form-control:focus, .form-select:focus {
        border-color: #6200ea;
        box-shadow: 0 0 0 0.25rem rgba(98,0,234,0.1);
    }

    .form-label {
        font-weight: 600;
        font-size: 13px;
        color: #555;
        margin-bottom: 6px;
    }

    .btn-simpan {
        background: linear-gradient(135deg, #6200ea, #9d4edd);
        color: white;
        border: none;
        border-radius: 12px;
        padding: 12px 30px;
        font-weight: 600;
        font-size: 15px;
        transition: all 0.3s;
    }

    .btn-simpan:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(98,0,234,0.3);
        color: white;
    }

    .btn-batal {
        border: 2px solid #e0e0e0;
        color: #666;
        background: white;
        border-radius: 12px;
        padding: 12px 30px;
        font-weight: 600;
        font-size: 15px;
        transition: all 0.3s;
        text-decoration: none;
        display: inline-block;
    }

    .btn-batal:hover {
        border-color: #aaa;
        color: #333;
    }

    .back-btn {
        color: #6200ea;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 24px;
        transition: all 0.2s;
    }

    .back-btn:hover {
        color: #9d4edd;
        transform: translateX(-4px);
    }
</style>

<div class="container-fluid">

    <a href="{{ route('admin.petugas.index') }}" class="back-btn">
        <i class="fas fa-arrow-left"></i>
        Kembali ke Daftar Petugas
    </a>

    <div class="form-card p-4 p-md-5">

        <div class="mb-4">
            <h4 class="fw-bold mb-1">Tambah Petugas Baru</h4>
            <p class="text-muted small">Isi form berikut untuk menambahkan akun petugas perpustakaan.</p>
        </div>

        @if($errors->any())
            <div class="alert alert-danger rounded-3 mb-4">
                <i class="fas fa-exclamation-circle me-2"></i>
                <strong>Terdapat kesalahan:</strong>
                <ul class="mb-0 mt-2">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.petugas.store') }}" method="POST">
            @csrf

            <div class="row g-4">

                <div class="col-md-6">
                    <label class="form-label">
                        <i class="fas fa-user me-1 text-primary"></i> Nama Lengkap
                    </label>
                    <input type="text" name="nama" class="form-control"
                           placeholder="Masukkan nama lengkap"
                           value="{{ old('nama') }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">
                        <i class="fas fa-at me-1 text-primary"></i> Username
                    </label>
                    <input type="text" name="username" class="form-control"
                           placeholder="Masukkan username"
                           value="{{ old('username') }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">
                        <i class="fas fa-envelope me-1 text-primary"></i> Email
                    </label>
                    <input type="email" name="email" class="form-control"
                           placeholder="Masukkan email"
                           value="{{ old('email') }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">
                        <i class="fas fa-map-marker-alt me-1 text-primary"></i> Alamat
                    </label>
                    <input type="text" name="alamat" class="form-control"
                           placeholder="Masukkan alamat"
                           value="{{ old('alamat') }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">
                        <i class="fas fa-lock me-1 text-primary"></i> Password
                    </label>
                    <input type="password" name="password" class="form-control"
                           placeholder="Minimal 8 karakter" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">
                        <i class="fas fa-lock me-1 text-primary"></i> Konfirmasi Password
                    </label>
                    <input type="password" name="password_confirmation" class="form-control"
                           placeholder="Ulangi password" required>
                </div>

            </div>

            <div class="d-flex gap-3 mt-5">
                <button type="submit" class="btn-simpan">
                    <i class="fas fa-save me-2"></i> Simpan Petugas
                </button>
                <a href="{{ route('admin.petugas.index') }}" class="btn-batal">
                    <i class="fas fa-times me-2"></i> Batal
                </a>
            </div>

        </form>
    </div>

</div>

@endsection