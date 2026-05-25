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

        /* Sidebar Styling (Sama dengan Beranda agar Konsisten) */
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
        }

        .book-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1) !important;
        }

        .book-cover-wrapper {
            position: relative;
            height: 260px;
            background-color: #eee;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .book-cover {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .book-card:hover .book-cover {
            transform: scale(1.06);
        }

        /* Badge Kategori */
        .category-badge {
            position: absolute;
            top: 15px;
            left: 15px;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(4px);
            color: #333;
            font-weight: 600;
            font-size: 11px;
            padding: 6px 14px;
            border-radius: 30px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
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

        .filter-btn {
            border-radius: 10px;
            padding: 10px 20px;
            font-weight: 500;
            transition: all 0.2s;
        }

        .filter-btn.active {
            background: var(--primary-gradient);
            color: #fff;
            border-color: transparent;
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
                <div class="bg-white shadow-sm text-primary rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 45px; height: 45px; background: linear-gradient(135deg, #ff758f, #ff7fa5) !important; color: white !important;">
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
                <a href="#" class="nav-link logout-btn" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">