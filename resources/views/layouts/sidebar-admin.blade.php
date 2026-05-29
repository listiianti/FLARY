<aside class="sidebar d-flex flex-column p-4 flex-shrink-0">

    {{-- LOGO --}}
    <div class="mb-4 text-center">
        <a href="{{ route('admin.dashboard') }}">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 120" style="height:80px; width:auto;">
              <defs>
                <linearGradient id="fga" x1="0%" y1="0%" x2="100%" y2="0%">
                  <stop offset="0%" style="stop-color:#a855f7"/>
                  <stop offset="100%" style="stop-color:#ec4899"/>
                </linearGradient>
              </defs>
              <g transform="translate(10, 5) scale(0.55)">
                <ellipse cx="100" cy="175" rx="28" ry="14" fill="#e05a5a"/>
                <ellipse cx="78" cy="187" rx="14" ry="8" fill="#e05a5a"/>
                <ellipse cx="100" cy="193" rx="12" ry="7" fill="#c94040"/>
                <ellipse cx="122" cy="187" rx="14" ry="8" fill="#e05a5a"/>
                <line x1="72" y1="150" x2="52" y2="170" stroke="#c94040" stroke-width="3" stroke-linecap="round"/>
                <line x1="76" y1="157" x2="54" y2="173" stroke="#c94040" stroke-width="3" stroke-linecap="round"/>
                <line x1="128" y1="150" x2="148" y2="170" stroke="#c94040" stroke-width="3" stroke-linecap="round"/>
                <line x1="124" y1="157" x2="146" y2="173" stroke="#c94040" stroke-width="3" stroke-linecap="round"/>
                <ellipse cx="100" cy="140" rx="42" ry="50" fill="#e86060"/>
                <ellipse cx="100" cy="150" rx="26" ry="30" fill="#f07070" opacity="0.5"/>
                <path d="M60 120 Q30 105 22 90 Q18 77 28 73 Q38 69 44 80 Q48 89 56 97 Z" fill="#e05a5a"/>
                <ellipse cx="26" cy="81" rx="10" ry="7" fill="#c94040" transform="rotate(-20,26,81)"/>
                <path d="M140 120 Q170 105 178 90 Q182 77 172 73 Q162 69 156 80 Q152 89 144 97 Z" fill="#e05a5a"/>
                <ellipse cx="174" cy="81" rx="10" ry="7" fill="#c94040" transform="rotate(20,174,81)"/>
                <rect x="38" y="83" width="124" height="80" rx="5" fill="#7c3aed"/>
                <rect x="38" y="83" width="10" height="80" rx="3" fill="#5b21b6"/>
                <rect x="100" y="83" width="62" height="80" rx="0" fill="#f3e8ff"/>
                <line x1="108" y1="100" x2="155" y2="100" stroke="#c084fc" stroke-width="1.5" stroke-linecap="round"/>
                <line x1="108" y1="110" x2="155" y2="110" stroke="#c084fc" stroke-width="1.5" stroke-linecap="round"/>
                <line x1="108" y1="120" x2="145" y2="120" stroke="#c084fc" stroke-width="1.5" stroke-linecap="round"/>
                <line x1="108" y1="130" x2="150" y2="130" stroke="#c084fc" stroke-width="1.5" stroke-linecap="round"/>
                <ellipse cx="100" cy="83" rx="38" ry="34" fill="#e86060"/>
                <line x1="82" y1="51" x2="72" y2="27" stroke="#c94040" stroke-width="2.5" stroke-linecap="round"/>
                <circle cx="71" cy="25" r="4" fill="#e05a5a"/>
                <line x1="118" y1="51" x2="128" y2="27" stroke="#c94040" stroke-width="2.5" stroke-linecap="round"/>
                <circle cx="129" cy="25" r="4" fill="#e05a5a"/>
                <circle cx="85" cy="75" r="10" fill="white"/>
                <circle cx="115" cy="75" r="10" fill="white"/>
                <circle cx="87" cy="76" r="5.5" fill="#2d2d2d"/>
                <circle cx="117" cy="76" r="5.5" fill="#2d2d2d"/>
                <circle cx="89" cy="74" r="2" fill="white"/>
                <circle cx="119" cy="74" r="2" fill="white"/>
                <rect x="75" y="68" width="20" height="15" rx="5" fill="none" stroke="#a855f7" stroke-width="2.5"/>
                <rect x="105" y="68" width="20" height="15" rx="5" fill="none" stroke="#a855f7" stroke-width="2.5"/>
                <line x1="95" y1="75" x2="105" y2="75" stroke="#a855f7" stroke-width="2.5"/>
                <line x1="75" y1="75" x2="68" y2="73" stroke="#a855f7" stroke-width="2" stroke-linecap="round"/>
                <line x1="125" y1="75" x2="132" y2="73" stroke="#a855f7" stroke-width="2" stroke-linecap="round"/>
                <path d="M88 93 Q100 103 112 93" fill="none" stroke="#c94040" stroke-width="2.5" stroke-linecap="round"/>
              </g>
              <text x="125" y="62" font-family="'Segoe UI', Arial, sans-serif" font-size="44" font-weight="700" fill="url(#fga)">Flary</text>
              <text x="128" y="88" font-family="'Segoe UI', Arial, sans-serif" font-size="14" font-weight="400" fill="#888888" letter-spacing="4">DIGITAL LIBRARY</text>
            </svg>
        </a>
        <div class="mt-1">
            <span class="badge rounded-pill px-3 py-1" style="background:linear-gradient(135deg,#1a237e,#283593);font-size:11px;">
                <i class="fas fa-shield-alt me-1"></i> Administrator
            </span>
        </div>
    </div>

    {{-- USER INFO --}}
    <div class="d-flex align-items-center p-3 mb-4 bg-light rounded-4">
        <div class="rounded-circle d-flex align-items-center justify-content-center me-3"
            style="width:45px;height:45px;background:linear-gradient(135deg,#1a237e,#283593);color:white;flex-shrink:0;">
            <i class="fas fa-user-shield"></i>
        </div>
        <div>
            <strong class="d-block small fw-bold text-dark">{{ Auth::user()->name ?? 'Admin' }}</strong>
            <span class="badge rounded-pill" style="font-size:10px;background:#e8eaf6;color:#1a237e;">
                Super Admin
            </span>
        </div>
    </div>

    {{-- NAVIGASI --}}
    <ul class="nav nav-pills flex-column gap-2">
        <li>
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-chart-line me-3"></i>Dashboard
            </a>
        </li>
        <li class="mt-2">
            <small class="text-muted fw-semibold px-3" style="font-size:10px;letter-spacing:1px;">MANAJEMEN BUKU</small>
        </li>
        <li>
            <a href="{{ route('petugas.buku.index') }}" class="nav-link {{ request()->routeIs('petugas.buku.*') ? 'active' : '' }}">
                <i class="fas fa-book me-3"></i>Kelola Buku
            </a>
        </li>
        <li>
            <a href="{{ route('petugas.peminjaman.index') }}" class="nav-link {{ request()->routeIs('petugas.peminjaman.*') ? 'active' : '' }}">
                <i class="fas fa-clipboard-list me-3"></i>Peminjaman
            </a>
        </li>
        <li>
            <a href="{{ route('petugas.pengembalian.index') }}" class="nav-link {{ request()->routeIs('petugas.pengembalian.*') ? 'active' : '' }}">
                <i class="fas fa-undo me-3"></i>Pengembalian
            </a>
        </li>
        <li>
            <a href="{{ route('petugas.denda.index') }}" class="nav-link {{ request()->routeIs('petugas.denda.*') ? 'active' : '' }}">
                <i class="fas fa-wallet me-3"></i>Denda
            </a>
        </li>
        <li class="mt-2">
            <small class="text-muted fw-semibold px-3" style="font-size:10px;letter-spacing:1px;">MANAJEMEN USER</small>
        </li>
        <li>
            <a href="{{ route('admin.users.index') }}" class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                <i class="fas fa-users me-3"></i>Kelola Peminjam
            </a>
        </li>
        <li>
            <a href="{{ route('admin.petugas.index') }}" class="nav-link {{ request()->routeIs('admin.petugas.*') ? 'active' : '' }}">
                <i class="fas fa-user-tie me-3"></i>Kelola Petugas
            </a>
        </li>
        <li>
            <a href="{{ route('admin.laporan.index') }}" class="nav-link {{ request()->routeIs('admin.laporan.*') ? 'active' : '' }}">
                <i class="fas fa-chart-bar me-3"></i>Laporan
            </a>
        </li>
    </ul>

    {{-- LOGOUT --}}
    <div class="border-top pt-3 mt-auto">
        <a href="#" class="nav-link text-danger" onclick="konfirmasiLogout(event, 'logout-form-admin')">
            <i class="fas fa-power-off me-3"></i>Logout
        </a>
        <form id="logout-form-admin" action="{{ route('logout') }}" method="POST" style="display:none;">
            @csrf
        </form>
    </div>


</aside>