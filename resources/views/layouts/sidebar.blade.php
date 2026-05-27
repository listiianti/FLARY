<aside class="sidebar d-flex flex-column p-4 flex-shrink-0">

    <div class="mb-4 ps-2">
        <h1 class="h4 fw-bold mb-0">
            <span style="
                background: linear-gradient(45deg, #6200ea, #ff758f);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
            ">
                Flary
            </span>
        </h1>

        <small class="text-muted"
            style="font-size: 11px; letter-spacing: 1px;">
            DIGITAL LIBRARY
        </small>
    </div>

    <div class="d-flex align-items-center p-3 mb-4 bg-light rounded-4">

        <div class="bg-white shadow-sm rounded-circle d-flex align-items-center justify-content-center me-3"
            style="width:45px;height:45px;background:linear-gradient(135deg,#ff758f,#ff7fa5)!important;color:white;">

            <i class="fas fa-user"></i>
        </div>

        <div>
            <strong class="d-block small fw-bold text-dark">
                {{ Auth::user()->name ?? 'User' }}
            </strong>

            <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill"
                style="font-size:10px;">
                Peminjam Aktif
            </span>
        </div>

    </div>

    <ul class="nav nav-pills flex-column gap-2">

        <li>
            <a href="{{ route('beranda') }}"
               class="nav-link {{ request()->routeIs('beranda') ? 'active' : '' }}">
                <i class="fas fa-chart-pie me-3"></i>
                Beranda
            </a>
        </li>

        <li>
            <a href="{{ route('buku.index') }}"
               class="nav-link {{ request()->routeIs('buku.index') ? 'active' : '' }}">
                <i class="fas fa-book-open me-3"></i>
                Jelajah Buku
            </a>
        </li>

        <li>
            <a href="{{ route('buku.riwayat') }}"
               class="nav-link {{ request()->routeIs('buku.riwayat') ? 'active' : '' }}">
                <i class="fas fa-history me-3"></i>
                Riwayat Pinjam
            </a>
        </li>

        <li>
            <a href="{{ route('buku.koleksi') }}"
               class="nav-link {{ request()->routeIs('buku.koleksi') ? 'active' : '' }}">
                <i class="fas fa-heart me-3"></i>
                Koleksi Saya
            </a>
        </li>

    </ul>

    <div class="border-top pt-3 mt-auto">

        <a href="#"
           class="nav-link text-danger"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">

            <i class="fas fa-power-off me-3"></i>
            Logout
        </a>

        <form id="logout-form"
              action="{{ route('logout') }}"
              method="POST"
              style="display:none;">
            @csrf
        </form>

    </div>

</aside>