<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Perpustakaan Digital</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f4f7f6;
        }
        /* Custom styling khusus sidebar yang tidak dicover penuh oleh utility Bootstrap */
        .sidebar {
            width: 280px;
            min-height: 100vh;
            background-color: #ffffff;
            border-right: 1px solid #dee2e6;
        }
        .logo span {
            color: #6200ea;
        }
        .nav-link {
            color: #333333;
            font-weight: 500;
            padding: 12px 20px !important;
            border-radius: 8px;
            transition: all 0.2s ease;
        }
        .nav-link:hover:not(.active) {
            background-color: #f8f9fa;
            color: #000000;
        }
        .nav-link.active {
            background-color: #fff0f6;
            color: #d81b60 !important;
            border-left: 4px solid #f8bbd0;
            border-radius: 0 8px 8px 0;
        }
        .nav-link.logout-btn {
            color: #dc3545;
        }
        .nav-link.logout-btn:hover {
            background-color: #fff5f5;
            color: #bd2130;
        }
    </style>
</head>
<body>

    <div class="d-flex">
        <aside class="sidebar d-flex flex-column p-3 flex-shrink-0">
            <h1 class="h4 fw-bold mb-4 ps-2 logo">
                <span class="bg-gradient text-transparent bg-clip-text" style="background: linear-gradient(45deg, #a020f0, #40e0d0); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                    Perpustakaan <span>Digital</span>
                </span>
            </h1>
            
            <div class="d-flex align-items-center p-2 mb-4 border-bottom pb-3">
                <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 45px; height: 45px;">
                    <i class="fas fa-user fs-5"></i>
                </div>
                <div class="user-info">
                    <strong class="d-block small fw-bold text-dark">{{ Auth::user()->name ?? 'User' }}</strong>
                    <span class="text-muted small">Peminjam</span>
                </div>
            </div>

            <ul class="nav nav-pills flex-column mb-auto gap-1">
                <li class="nav-item">
                    <a href="#" class="nav-link active"><i class="fas fa-home me-2"></i> Beranda</a>
                </li>
                <li>
                    <a href="#" class="nav-link"><i class="fas fa-book me-2"></i> Buku</a>
                </li>
                <li>
                    <a href="#" class="nav-link"><i class="fas fa-history Pall me-2"></i> Riwayat</a>
                </li>
                <li>
                    <a href="#" class="nav-link"><i class="fas fa-bookmark me-2"></i> Koleksi</a>
                </li>
            </ul>

            <div class="border-top pt-2">
                <a href="#" class="nav-link logout-btn" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt me-2"></i> Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </aside>

        <main class="flex-grow-1 p-4 p-md-5">
            <header class="mb-4">
                <h2 class="h3 fw-bold text-dark">Peminjam Dashboard</h2>
            </header>

            <section class="row mb-5">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card shadow-sm border-light overflow-hidden">
                        <div class="card-body d-flex justify-content-between align-items-center p-4">
                            <div class="p-3 bg-light border rounded-3 text-secondary fs-3">
                                <i class="fas fa-clipboard-list"></i>
                            </div>
                            <div class="text-end">
                                <span class="d-block h1 fw-bold mb-0">1</span>
                                <p class="text-muted small mb-0">Total Peminjaman Saya</p>
                            </div>
                        </div>
                        <a href="#" class="card-footer bg-light border-top d-flex justify-content-between align-items-center text-decoration-none text-dark py-2 px-4 small">
                            <span>Lihat Riwayat</span>
                            <i class="fas fa-arrow-right text-muted"></i>
                        </a>
                    </div>
                </div>
            </section>

            <section class="p-4 bg-secondary bg-opacity-10 border rounded-3">
                <h3 class="h6 fw-bold mb-3"><i class="fas fa-bolt text-warning me-1"></i> Aksi Cepat</h3>
                <div class="d-flex gap-3 flex-wrap">
                    <button class="btn btn-light border-secondary-subtle px-4 py-2 small d-flex align-items-center gap-2">
                        <i class="fas fa-book-open"></i> Lihat Buku
                    </button>
                    <button class="btn btn-light border-secondary-subtle px-4 py-2 small d-flex align-items-center gap-2">
                        <i class="fas fa-clock"></i> Riwayat Pinjam
                    </button>
                </div>
            </section>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>