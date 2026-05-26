@extends('layouts.app')

@section('title', 'Beranda')

@section('content')

<style>
    :root {
        --primary-gradient: linear-gradient(135deg, #6200ea, #9d4edd);
        --pink-gradient: linear-gradient(135deg, #ff758f, #ff7fa5);
        --bg-gradient: linear-gradient(135deg, #f3f0ff 0%, #fff0f5 50%, #e8f5e9 100%);
    }

    body {
        font-family: 'Inter', sans-serif;
        background: var(--bg-gradient);
    }

    h1, h2, h3, .logo {
        font-family: 'Poppins', sans-serif;
    }

    .stat-card {
        border: none;
        border-radius: 16px;
        background: rgba(255, 255, 255, 0.9) !important;
        backdrop-filter: blur(5px);
        transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 24px rgba(98, 0, 234, 0.1) !important;
    }

    .icon-box {
        width: 60px;
        height: 60px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
    }

    .quick-action-box {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(5px);
        border: 1px solid rgba(233, 236, 239, 0.6);
        border-radius: 16px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.01);
    }

    .btn-action {
        padding: 12px 24px;
        border-radius: 12px;
        font-weight: 500;
        transition: all 0.2s;
        border: 1px solid #dee2e6;
        background-color: #ffffff;
        text-decoration: none;
        color: #495057;
        display: inline-block;
    }

    .btn-action:hover {
        background: var(--primary-gradient);
        color: #ffffff;
        border-color: transparent;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(98, 0, 234, 0.15);
    }

    .table-container {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(5px);
        border-radius: 16px;
        border: 1px solid rgba(233, 236, 239, 0.6);
    }
</style>

<div class="container-fluid">

    <header class="d-flex justify-content-between align-items-center mb-5 flex-wrap gap-3">

        <div>
            <h2 class="h3 fw-bold text-dark mb-1">
                Selamat Datang Kembali 👋
            </h2>

            <p class="text-muted small mb-0">
                Yuk, temukan ilmu baru dan selesaikan bacaanmu hari ini.
            </p>
        </div>

        <div class="text-end d-none d-sm-block">
            <span class="badge bg-white shadow-sm text-dark p-2 border border-secondary-subtle">
                <i class="far fa-calendar-alt text-primary me-2"></i>
                {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}
            </span>
        </div>

    </header>

    <!-- Statistik -->
    <section class="row g-4 mb-5">

        <div class="col-12 col-md-6 col-lg-4">
            <div class="card stat-card shadow-sm p-3 bg-white">
                <div class="card-body d-flex justify-content-between align-items-center p-2">

                    <div>
                        <span class="d-block display-6 fw-bold text-dark mb-1">
                            3
                        </span>

                        <p class="text-muted small mb-0 fw-medium">
                            Buku Dipinjam
                        </p>
                    </div>

                    <div class="icon-box bg-primary bg-opacity-10 text-primary">
                        <i class="fas fa-book-reader"></i>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4">
            <div class="card stat-card shadow-sm p-3 bg-white">
                <div class="card-body d-flex justify-content-between align-items-center p-2">

                    <div>
                        <span class="d-block display-6 fw-bold text-dark mb-1">
                            12
                        </span>

                        <p class="text-muted small mb-0 fw-medium">
                            Total Riwayat
                        </p>
                    </div>

                    <div class="icon-box bg-success bg-opacity-10 text-success">
                        <i class="fas fa-check-circle"></i>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4">
            <div class="card stat-card shadow-sm p-3 bg-white">
                <div class="card-body d-flex justify-content-between align-items-center p-2">

                    <div>
                        <span class="d-block display-6 fw-bold text-dark mb-1">
                            0
                        </span>

                        <p class="text-muted small mb-0 fw-medium">
                            Denda Tertunggak
                        </p>
                    </div>

                    <div class="icon-box bg-danger bg-opacity-10 text-danger">
                        <i class="fas fa-wallet"></i>
                    </div>

                </div>
            </div>
        </div>

    </section>

    <!-- Table + Quick Action -->
    <div class="row g-4 mb-5">

        <div class="col-12 col-lg-8">

            <div class="table-container p-4 shadow-sm h-100">

                <div class="d-flex justify-content-between align-items-center mb-4">

                    <h3 class="h6 fw-bold text-dark mb-0">
                        <i class="fas fa-hourglass-half text-primary me-2"></i>
                        Sedang Kamu Pinjam
                    </h3>

                    <a href="#" class="small text-decoration-none text-primary">
                        Lihat Semua
                    </a>

                </div>

                <div class="table-responsive">

                    <table class="table table-hover align-middle mb-0">

                        <thead class="table-light">
                            <tr class="small text-muted">
                                <th>Judul Buku</th>
                                <th>Tgl Pinjam</th>
                                <th>Batas Kembali</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody class="small">

                            <tr>
                                <td class="fw-bold text-dark">
                                    UML Dasar untuk Pemula
                                </td>

                                <td>20 Mei 2026</td>

                                <td>27 Mei 2026</td>

                                <td>
                                    <span class="badge bg-warning text-dark rounded-pill">
                                        3 Hari Lagi
                                    </span>
                                </td>
                            </tr>

                            <tr>
                                <td class="fw-bold text-dark">
                                    Belajar Laravel 11 Pembuat Proyek
                                </td>

                                <td>18 Mei 2026</td>

                                <td>25 Mei 2026</td>

                                <td>
                                    <span class="badge bg-danger rounded-pill">
                                        Hari Ini!
                                    </span>
                                </td>
                            </tr>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

        <div class="col-12 col-lg-4">

            <div class="quick-action-box p-4 shadow-sm h-100">

                <h3 class="h6 fw-bold text-dark mb-4">
                    <i class="fas fa-bolt text-warning me-2"></i>
                    Aksi Cepat
                </h3>

                <div class="d-grid gap-3">

                    <a href="{{ route('buku.index') }}" class="btn btn-action text-start">
                        <i class="fas fa-search text-primary me-3"></i>
                        Cari Buku Baru
                    </a>

                    <a href="#" class="btn btn-action text-start">
                        <i class="fas fa-history text-success me-3"></i>
                        Cetak Riwayat Pinjam
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection