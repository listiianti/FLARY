<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jelajah Buku - FlaryLib</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #6200ea, #9d4edd);
            --bg-light: #f8f9fa;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-light);
        }

        h1, h2, h3, h4, h5, .logo {
            font-family: 'Poppins', sans-serif;
        }

        /* Sidebar Styling */
        .sidebar {
            width: 280px;
            min-height: 100vh;
            background-color: #ffffff;
            border-right: 1px solid #e9ecef;
            box-shadow: 4px 0 20px rgba(0, 0, 0, 0.02);
        }

        .nav-link {
            color: #495057;
            font-weight: 500;
            padding: 12px 20px !important;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .nav-link:hover:not(.active) {
            background-color: #f1f3f5;
            color: #212529;
            transform: translateX(4px);
        }

        .nav-link.active {
            background: var(--primary-gradient);
            color: #ffffff !important;
            box-shadow: 0 4px 12px rgba(98, 0, 234, 0.2);
        }

        .nav-link.logout-btn:hover {
            background-color: #fff5f5;
            color: #dc3545;
        }

        /* Buku Card Styling */
        .book-card {
            border: none;
            border-radius: 16px;
            background-color: #ffffff;
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0,0,0,0.03);
        }

        .book-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1) !important;
        }

        .book-cover-wrapper {
            position: relative;
            height: 240px;
            background: linear-gradient(135deg, #e0c3fc 0%, #8ec5fc 100%);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            padding: 20px;
            color: #2c3e50;
            text-align: center;
        }

        .book-icon {
            font-size: 3.5rem;
            margin-bottom: 10px;
            opacity: 0.85;
            color: #6200ea;
        }

        /* Badge Kategori & Stok */
        .category-badge {
            position: absolute;
            top: 15px;
            left: 15px;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(4px);
            color: #6200ea;
            font-weight: 600;
            font-size: 11px;
            padding: 4px 12px;
            border-radius: 30px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
        }

        .stock-badge {
            position: absolute;
            bottom: 15px;
            right: 15px;
            font-size: 11px;
            padding: 4px 10px;
            border-radius: 8px;
        }

        /* Search & Filter Section */
        .search-box {
            border-radius: 12px;
            padding: 12px 20px;
            border: 1px solid #dee2e6;
            background-color: #fff;
            box-shadow: 0 2px 8px rgba(0,0,0,0.01);
        }

        .search-box:focus {
            border-color: #6200ea;
            box-shadow: 0 0 0 0.25rem rgba(98, 0, 234, 0.1);
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
            
            <div class="d-flex align-items-center p-3 mb-4 bg-light rounded-4">
                <div class="shadow-sm rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 45px; height: 45px; background: linear-gradient(135deg, #ff758f, #ff7fa5); color: white;">
                    <i class="fas fa-user-astronaut"></i>
                </div>
                <div class="user-info">
                    <strong class="d-block small fw-bold text-dark">{{ Auth::user()->name ?? 'User' }}</strong>
                    <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill" style="font-size: 10px;">Peminjam Aktif</span>
                </div>
            </div>

            <ul class="nav nav-pills flex-column mb-auto gap-2">
                <li class="nav-item">
                    <a href="{{ route('beranda') }}" class="nav-link"><i class="fas fa-chart-pie me-3"></i> Beranda</a>
                </li>
                <li>
                    <a href="{{ route('buku.index') }}" class="nav-link active"><i class="fas fa-book-open me-3"></i> Jelajah Buku</a>
                </li>
                <li>
                    <a href="#" class="nav-link"><i class="fas fa-history me-3"></i> Riwayat Pinjam</a>
                </li>
                <li>
                    <a href="#" class="nav-link"><i class="fas fa-heart me-3"></i> Koleksi Saya</a>
                </li>
            </ul>

            <div class="border-top pt-3">
                <a href="{{ route('logout') }}" class="nav-link logout-btn">
                    <i class="fas fa-sign-out-alt me-3"></i> Keluar
                </a>
            </div>
        </aside>

        <main class="flex-grow-1 p-5" style="max-height: 100vh; overflow-y: auto;">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="fw-bold mb-1">Jelajah Koleksi Buku</h2>
                    <p class="text-muted small">Temukan buku-buku terbaik pilihan Seeder Database kami</p>
                </div>
                <div class="w-25">
                    <input type="text" class="form-control search-box" placeholder="Cari judul atau pengarang...">
                </div>
            </div>

            <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
                @forelse($bukus as $buku)
                    <div class="col">
                        <div class="card book-card h-100">
                            <div class="book-cover-wrapper">
                                <span class="category-badge">ID: #{{ $buku->id_buku }}</span>
                                <i class="fas fa-book book-icon"></i>
                                <span class="badge {{ $buku->stok > 10 ? 'bg-success' : 'bg-warning' }} stock-badge">
                                    Stok: {{ $buku->stok }}
                                </span>
                            </div>
                            <div class="card-body d-flex flex-column p-4">
                                <h5 class="card-title fw-bold text-dark mb-1 fs-6 text-truncate" title="{{ $buku->judul }}">
                                    {{ $buku->judul }}
                                </h5>
                                <p class="text-secondary small mb-3">
                                    <i class="fas fa-pen-nib me-1" style="font-size: 11px;"></i> {{ $buku->pengarang }}
                                </p>
                                <div class="mt-auto d-flex justify-content-between align-items-center pt-2 border-top">
                                    <span class="text-muted small">Tahun {{ $buku->tahun_terbit }}</span>
                                    <button class="btn btn-sm btn-outline-primary rounded-pill px-3" style="font-size: 12px; font-weight: 600;">
                                        Pinjam
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <p class="text-muted">Belum ada data buku. Silakan jalankan seeder terlebih dahulu!</p>
                    </div>
                @endforelse
            </div>
        </main>
    </div>

</body>
</html>