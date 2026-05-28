<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Flary Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #1a237e, #283593);
            --accent-gradient: linear-gradient(135deg, #6200ea, #9d4edd);
            --bg-gradient: linear-gradient(135deg, #e8eaf6 0%, #f3e5f5 50%, #e8f5e9 100%);
        }
        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg-gradient);
            min-height: 100vh;
        }
        .sidebar {
            width: 280px;
            min-height: 100vh;
            background: rgba(255,255,255,.88);
            backdrop-filter: blur(10px);
            border-right: 1px solid rgba(233,236,239,.5);
        }
        .nav-link {
            color: #495057;
            font-weight: 500;
            padding: 12px 20px !important;
            border-radius: 12px;
            transition: .3s;
        }
        .nav-link:hover {
            background: rgba(0,0,0,.05);
            transform: translateX(4px);
        }
        .nav-link.active {
            background: var(--primary-gradient);
            color: white !important;
            box-shadow: 0 4px 12px rgba(26,35,126,.25);
        }
        main { flex: 1; padding: 40px; }
    </style>
</head>
<body>
<div class="d-flex">
    @include('layouts.sidebar-admin')
    <main>
        @yield('content')
    </main>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>