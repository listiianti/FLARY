<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Perpustakaan Digital</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #6200ea, #9d4edd);
            --pink-gradient: linear-gradient(135deg, #ff758f, #ff7fa5);
            /* 🌟 Mengubah background menjadi gradasi warna yang lebih hidup dan cerah */
            --bg-gradient: linear-gradient(135deg, #f3f0ff 0%, #fff0f5 50%, #e8f5e9 100%);
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg-gradient);
            min-height: 100vh;
        }

        h1, h2, h3, .logo {
            font-family: 'Poppins', sans-serif;
        }

        /* Sidebar Styling */
        .sidebar {
            width: 280px;
            min-height: 100vh;
            background-color: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(10px); /* Efek kaca transparan premium */
            border-right: 1px solid rgba(233, 236, 239, 0.5);
            box-shadow: 4px 0 20px rgba(0, 0, 0, 0.02);
        }

        .nav-link {
            color: #495057;
            font-weight: 500;
            padding: 12px 20px !important;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .nav-link i {
            transition: transform 0.3s ease;
        }

        .nav-link:hover:not(.active) {
            background-color: rgba(0, 0, 0, 0.05);
            color: #212529;
            transform: translateX(4px);
        }

        .nav-link:hover i {
            transform: scale(1.1);
        }

        .nav-link.active {
            background: var(--primary-gradient);
            color: #ffffff !important;
            box-shadow: 0 4px 12px rgba(98, 0, 234, 0.2);
        }

        .nav-link.logout-btn {
            color: #dc3545;
        }

        .nav-link.logout-btn:hover {
            background-color: #fff5f5;
            color: #bd2130;
        }

        /* Card Animation & Hover */
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

        /* Quick Action Glassmorphism look */
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

        /* Table Styling */
        .table-container {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(5px);
            border-radius: 16px;
            border: 1px solid rgba(233, 236, 239, 0.6);
        }
    </style>
</head>
<body>

    <div class="d-flex">
        <aside class="sidebar d-flex flex-column p-4 flex-shrink-0">
            <div class="mb-4 ps-2">
                <h1 class="h4 fw-bold mb-0">
                    <span style="background: linear-gradient(45deg, #6200ea, #ff758f); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                        Flary<span class="fw-light text-secondary">Lib</span>
                    </span>
                </h1>
                <small class="text-muted" style="font-size: 11px; letter-spacing: 1px;">DIGITAL LIBRARY</small>
            </div>
            
            <div class="d-flex align-items-center p-3 mb-4 bg-light rounded-4" style="background-color: rgba(248, 249, 250, 0.7) !important;">
                <div class="bg-white shadow-sm text-primary rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 45px; height: 45px; background: var(--pink-gradient) !important; color: white !important;">
                    <i class="fas fa-user-astronaut"></i>
                </div>
                <div class="user-info">
                    <strong class="d-block small fw-bold text-dark">{{ auth()->user()->name ?? 'M. Rizqy Almadani' }}</strong>
                    <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill" style="font-size: 10px;">Peminjam Aktif</span>
                </div>
            </div>

            <ul class="nav nav-pills flex-column mb-auto gap-2">
                <li class="nav-item">
                    <a href="{{ route('beranda') }}" class="nav-link active"><i class="fas fa-chart-pie me-3"></i> Beranda</a>
                </li>
                <li>
                    <a href="{{ route('buku.index') }}" class="nav-link"><i class="fas fa-book-open me-3"></i> Jelajah Buku</a>
                </li>
                <li>
                    <a href="#" class="nav-link"><i class="fas fa-history me-3"></i> Riwayat Pinjam</a>
                </li>
                <li>
                    <a href="#" class="nav-link"><i class="fas fa-heart me-3"></i> Koleksi Saya</a>
                </li>
            </ul>

            <div class="border-top pt-3">
                <a href="#" class="nav-link logout-btn" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-power-off me-3"></i> Keluar Aplikasi
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </aside>

        <main class="flex-grow-1 p-4 p-md-5" style="max-height: 100vh; overflow-y: auto;">
            <header class="d-flex justify-content-between align-items-center mb-5">
                <div>
                    <h2 class="h3 fw-bold text-dark mb-1">Selamat Datang Kembali 👋</h2>
                    <p class="text-muted small mb-0">Yuk, temukan ilmu baru dan selesaikan bacaanmu hari ini.</p>
                </div>
                <div class="text-end d-none d-sm-block">
                    <span class="badge bg-white shadow-sm text-dark p-2 border border-secondary-subtle">
                        <i class="far fa-calendar-alt text-primary me-2"></i>{{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}
                    </span>
                </div>
            </header>

            <section class="row g-4 mb-5">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card stat-card shadow-sm p-3 bg-white">
                        <div class="card-body d-flex justify-content-between align-items-center p-2">
                            <div>
                                <span class="d-block display-6 fw-bold text-dark mb-1">3</span>
                                <p class="text-muted small mb-0 fw-medium">Buku Dipinjam</p>
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
                                <span class="d-block display-6 fw-bold text-dark mb-1">12</span>
                                <p class="text-muted small mb-0 fw-medium">Total Riwayat</p>
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
                                <span class="d-block display-6 fw-bold text-dark mb-1">0</span>
                                <p class="text-muted small mb-0 fw-medium">Denda Tertunggak</p>
                            </div>
                            <div class="icon-box bg-danger bg-opacity-10 text-danger">
                                <i class="fas fa-wallet"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <div class="row g-4 mb-5">
                <div class="col-12 col-lg-8">
                    <div class="table-container p-4 shadow-sm h-100">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h3 class="h6 fw-bold text-dark mb-0"><i class="fas fa-hourglass-half text-primary me-2"></i> Sedang Kamu Pinjam</h3>
                            <a href="#" class="small text-decoration-none text-primary">Lihat Semua</a>
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
                                        <td class="fw-bold text-dark">UML Dasar untuk Pemula</td>
                                        <td>20 Mei 2026</td>
                                        <td>27 Mei 2026</td>
                                        <td><span class="badge bg-warning text-dark rounded-pill">3 Hari Lagi</span></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-dark">Belajar Laravel 11 Pembuat Proyek</td>
                                        <td>18 Mei 2026</td>
                                        <td>25 Mei 2026</td>
                                        <td><span class="badge bg-danger rounded-pill">Hari Ini!</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-4">
                    <div class="quick-action-box p-4 shadow-sm h-100">
                        <h3 class="h6 fw-bold text-dark mb-4"><i class="fas fa-bolt text-warning me-2"></i> Aksi Cepat</h3>
                        <div class="d-grid gap-3">
                            <a href="{{ route('buku.index') }}" class="btn btn-action text-start">
                                <i class="fas fa-search text-primary me-3"></i> Cari Buku Baru
                            </a>
                            <a href="#" class="btn btn-action text-start">
                                <i class="fas fa-history text-success me-3"></i> Cetak Riwayat Pinjam
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>