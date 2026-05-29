<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
        html { scroll-behavior: smooth; }
        .hero-bg {
            background-image:
                linear-gradient(rgba(0,0,0,.75), rgba(0,0,0,.75)),
                url('https://images.unsplash.com/photo-1521587760476-6c12a4b040da?q=80&w=2070&auto=format&fit=crop');
            background-size: cover;
            background-position: center;
        }
        .grad { background: linear-gradient(to right, #a855f7, #22d3ee); }
        .grad-text {
            background: linear-gradient(to right, #c084fc, #22d3ee);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
    </style>
</head>

<body style="background:#000; color:#fff;">

{{-- NAVBAR --}}
<header style="position:fixed;top:0;left:0;width:100%;z-index:50;background:rgba(0,0,0,0.75);backdrop-filter:blur(12px);">
    <div style="max-width:1200px;margin:0 auto;padding:12px 24px;display:flex;align-items:center;justify-content:space-between;">

        <a href="/">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 120" style="height:64px;width:auto;">
              <defs>
                <linearGradient id="fg" x1="0%" y1="0%" x2="100%" y2="0%">
                  <stop offset="0%" style="stop-color:#a855f7"/>
                  <stop offset="100%" style="stop-color:#ec4899"/>
                </linearGradient>
              </defs>
              <g transform="translate(10,5) scale(0.55)">
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
              <text x="125" y="62" font-family="'Segoe UI',Arial,sans-serif" font-size="44" font-weight="700" fill="url(#fg)">Flary</text>
              <text x="128" y="88" font-family="'Segoe UI',Arial,sans-serif" font-size="14" font-weight="400" fill="#888" letter-spacing="4">DIGITAL LIBRARY</text>
            </svg>
        </a>

        {{-- Desktop Nav --}}
        <nav style="display:none;" id="desktop-nav">
            <a href="#beranda" style="color:#fff;margin-right:32px;text-decoration:none;font-size:1.1rem;">Beranda</a>
            <a href="#koleksi" style="color:#fff;margin-right:32px;text-decoration:none;font-size:1.1rem;">Koleksi</a>
            <a href="#tentang" style="color:#fff;margin-right:32px;text-decoration:none;font-size:1.1rem;">Tentang</a>
            <a href="#kontak" style="color:#fff;margin-right:32px;text-decoration:none;font-size:1.1rem;">Kontak</a>
            @auth
                <a href="{{ route('beranda') }}" class="grad" style="padding:12px 24px;border-radius:12px;color:#fff;text-decoration:none;font-weight:600;">Dashboard</a>
            @else
                <a href="{{ route('register') }}" class="grad" style="padding:12px 24px;border-radius:12px;color:#fff;text-decoration:none;font-weight:600;">Register</a>
            @endauth
        </nav>

        {{-- Hamburger --}}
        <button id="menu-btn" style="background:none;border:none;color:#fff;font-size:1.8rem;cursor:pointer;display:block;">☰</button>
    </div>

    {{-- Mobile Nav --}}
    <div id="mobile-menu" style="display:none;background:rgba(0,0,0,0.95);padding:16px 24px 24px;">
        <div style="display:flex;flex-direction:column;gap:16px;font-size:1.1rem;">
            <a href="#beranda" style="color:#fff;text-decoration:none;">Beranda</a>
            <a href="#koleksi" style="color:#fff;text-decoration:none;">Koleksi</a>
            <a href="#tentang" style="color:#fff;text-decoration:none;">Tentang</a>
            <a href="#kontak" style="color:#fff;text-decoration:none;">Kontak</a>
            @auth
                <a href="{{ route('beranda') }}" class="grad" style="padding:12px;border-radius:12px;color:#fff;text-decoration:none;font-weight:600;text-align:center;">Dashboard</a>
            @else
                <a href="{{ route('register') }}" class="grad" style="padding:12px;border-radius:12px;color:#fff;text-decoration:none;font-weight:600;text-align:center;">Register</a>
            @endauth
        </div>
    </div>
</header>

{{-- HERO --}}
<section id="beranda" class="hero-bg" style="min-height:100vh;display:flex;align-items:center;justify-content:center;text-align:center;padding:0 24px;">
    <div style="max-width:900px;margin-top:80px;">
        <h1 style="font-size:clamp(2.5rem,7vw,5rem);font-weight:800;line-height:1.15;margin-bottom:24px;">
            Jelajahi Dunia
            <span class="grad-text"> Buku Digital</span>
        </h1>
        <p style="font-size:clamp(1rem,2.5vw,1.4rem);color:#e5e7eb;margin-bottom:40px;line-height:1.8;">
            Platform perpustakaan modern untuk membaca, meminjam, dan menemukan berbagai koleksi buku digital dengan tampilan elegan dan nyaman.
        </p>
        <div style="display:flex;flex-wrap:wrap;gap:16px;justify-content:center;">
            @auth
                <a href="{{ route('buku.index') }}" class="grad" style="padding:16px 40px;border-radius:16px;color:#fff;text-decoration:none;font-size:1.2rem;font-weight:600;">Mulai Membaca</a>
            @else
                <button onclick="bukaModal()" class="grad" style="padding:16px 40px;border-radius:16px;color:#fff;border:none;cursor:pointer;font-size:1.2rem;font-weight:600;font-family:'Poppins',sans-serif;">Mulai Membaca</button>
                <a href="{{ route('register') }}" style="padding:16px 40px;border-radius:16px;color:#fff;text-decoration:none;font-size:1.1rem;border:1px solid rgba(255,255,255,0.3);background:rgba(255,255,255,0.1);">Daftar Gratis</a>
            @endauth
        </div>
    </div>
</section>

{{-- KOLEKSI --}}
<section id="koleksi" style="padding:96px 24px;background:#111827;">
    <div style="max-width:1200px;margin:0 auto;">
        <div style="text-align:center;margin-bottom:64px;">
            <h2 style="font-size:clamp(2rem,5vw,3rem);font-weight:700;margin-bottom:16px;">Koleksi Buku Digital</h2>
            <p style="color:#9ca3af;">Temukan berbagai kategori buku favoritmu.</p>
        </div>
        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:32px;">

            <div style="background:#1f2937;border-radius:24px;overflow:hidden;transition:transform 0.3s;" onmouseover="this.style.transform='translateY(-8px)'" onmouseout="this.style.transform='translateY(0)'">
                <img src="https://images.unsplash.com/photo-1512820790803-83ca734da794?q=80&w=1200&auto=format&fit=crop" style="width:100%;height:220px;object-fit:cover;" alt="Novel">
                <div style="padding:24px;">
                    <h3 style="font-size:1.4rem;font-weight:600;margin-bottom:12px;">Novel Modern</h3>
                    <p style="color:#9ca3af;margin-bottom:20px;">Koleksi novel populer dan inspiratif dari berbagai penulis terkenal.</p>
                    @auth
                        <a href="{{ route('buku.index') }}" class="grad" style="display:block;padding:12px;border-radius:12px;color:#fff;text-decoration:none;text-align:center;font-weight:600;">Lihat Buku</a>
                    @else
                        <button onclick="bukaModal()" class="grad" style="display:block;width:100%;padding:12px;border-radius:12px;color:#fff;border:none;cursor:pointer;font-weight:600;font-family:'Poppins',sans-serif;">Lihat Buku</button>
                    @endauth
                </div>
            </div>

            <div style="background:#1f2937;border-radius:24px;overflow:hidden;transition:transform 0.3s;" onmouseover="this.style.transform='translateY(-8px)'" onmouseout="this.style.transform='translateY(0)'">
                <img src="https://images.unsplash.com/photo-1495446815901-a7297e633e8d?q=80&w=1200&auto=format&fit=crop" style="width:100%;height:220px;object-fit:cover;" alt="Teknologi">
                <div style="padding:24px;">
                    <h3 style="font-size:1.4rem;font-weight:600;margin-bottom:12px;">Teknologi</h3>
                    <p style="color:#9ca3af;margin-bottom:20px;">Buku pemrograman, AI, web development, dan teknologi modern.</p>
                    @auth
                        <a href="{{ route('buku.index') }}" class="grad" style="display:block;padding:12px;border-radius:12px;color:#fff;text-decoration:none;text-align:center;font-weight:600;">Lihat Buku</a>
                    @else
                        <button onclick="bukaModal()" class="grad" style="display:block;width:100%;padding:12px;border-radius:12px;color:#fff;border:none;cursor:pointer;font-weight:600;font-family:'Poppins',sans-serif;">Lihat Buku</button>
                    @endauth
                </div>
            </div>

            <div style="background:#1f2937;border-radius:24px;overflow:hidden;transition:transform 0.3s;" onmouseover="this.style.transform='translateY(-8px)'" onmouseout="this.style.transform='translateY(0)'">
                <img src="https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?q=80&w=1200&auto=format&fit=crop" style="width:100%;height:220px;object-fit:cover;" alt="Pendidikan">
                <div style="padding:24px;">
                    <h3 style="font-size:1.4rem;font-weight:600;margin-bottom:12px;">Pendidikan</h3>
                    <p style="color:#9ca3af;margin-bottom:20px;">Materi belajar, akademik, dan pengembangan diri.</p>
                    @auth
                        <a href="{{ route('buku.index') }}" class="grad" style="display:block;padding:12px;border-radius:12px;color:#fff;text-decoration:none;text-align:center;font-weight:600;">Lihat Buku</a>
                    @else
                        <button onclick="bukaModal()" class="grad" style="display:block;width:100%;padding:12px;border-radius:12px;color:#fff;border:none;cursor:pointer;font-weight:600;font-family:'Poppins',sans-serif;">Lihat Buku</button>
                    @endauth
                </div>
            </div>

        </div>
    </div>
</section>

{{-- TENTANG --}}
<section id="tentang" style="padding:96px 24px;background:#000;">
    <div style="max-width:1200px;margin:0 auto;display:grid;grid-template-columns:repeat(auto-fit,minmax(300px,1fr));gap:48px;align-items:center;">
        <div>
            <h2 style="font-size:clamp(2rem,5vw,3rem);font-weight:700;margin-bottom:24px;">Tentang Platform</h2>
            <p style="color:#d1d5db;font-size:1.1rem;line-height:1.8;margin-bottom:20px;">
                Perpustakaan Digital adalah platform modern untuk membaca buku kapan saja dan di mana saja.
            </p>
            <p style="color:#9ca3af;line-height:1.8;">
                Dengan sistem digital, pengguna dapat mengakses ribuan koleksi buku dengan mudah dan nyaman.
            </p>
        </div>
        <div>
            <img src="https://images.unsplash.com/photo-1526243741027-444d633d7365?q=80&w=1200&auto=format&fit=crop"
                 style="width:100%;border-radius:24px;box-shadow:0 25px 50px rgba(0,0,0,0.5);" alt="Library">
        </div>
    </div>
</section>

{{-- KONTAK --}}
<section id="kontak" style="padding:96px 24px;background:#111827;">
    <div style="max-width:720px;margin:0 auto;text-align:center;">
        <h2 style="font-size:clamp(2rem,5vw,3rem);font-weight:700;margin-bottom:20px;">Hubungi Kami</h2>
        <p style="color:#9ca3af;margin-bottom:40px;">Jika ada pertanyaan atau saran, silakan hubungi kami.</p>
        <div style="display:flex;flex-direction:column;gap:20px;">
            <input type="text" placeholder="Nama"
                   style="width:100%;padding:16px 20px;border-radius:16px;background:#1f2937;border:1px solid #374151;color:#fff;font-family:'Poppins',sans-serif;font-size:1rem;outline:none;box-sizing:border-box;">
            <input type="email" placeholder="Email"
                   style="width:100%;padding:16px 20px;border-radius:16px;background:#1f2937;border:1px solid #374151;color:#fff;font-family:'Poppins',sans-serif;font-size:1rem;outline:none;box-sizing:border-box;">
            <textarea rows="5" placeholder="Pesan"
                      style="width:100%;padding:16px 20px;border-radius:16px;background:#1f2937;border:1px solid #374151;color:#fff;font-family:'Poppins',sans-serif;font-size:1rem;outline:none;resize:vertical;box-sizing:border-box;"></textarea>
            <div>
                <button type="submit" class="grad"
                        style="padding:16px 40px;border-radius:16px;color:#fff;border:none;cursor:pointer;font-size:1.1rem;font-weight:600;font-family:'Poppins',sans-serif;">
                    Kirim Pesan
                </button>
            </div>
        </div>
    </div>
</section>

{{-- FOOTER --}}
<footer style="background:#000;padding:32px 24px;text-align:center;color:#6b7280;border-top:1px solid #1f2937;">
    <p>© {{ date('Y') }} Flary Digital Library. All Rights Reserved.</p>
</footer>

{{-- MODAL --}}
<div id="modal-auth" style="display:none;position:fixed;inset:0;z-index:100;background:rgba(0,0,0,0.75);backdrop-filter:blur(8px);align-items:center;justify-content:center;">
    <div style="background:#111827;border-radius:24px;padding:40px;max-width:440px;width:90%;margin:auto;box-shadow:0 25px 50px rgba(0,0,0,0.8);border:1px solid #374151;text-align:center;position:relative;top:50%;transform:translateY(-50%);">
        <div style="display:flex;justify-content:center;margin-bottom:16px;">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 120" style="height:56px;width:auto;">
              <defs>
                <linearGradient id="fg2" x1="0%" y1="0%" x2="100%" y2="0%">
                  <stop offset="0%" style="stop-color:#a855f7"/>
                  <stop offset="100%" style="stop-color:#ec4899"/>
                </linearGradient>
              </defs>
              <g transform="translate(10,5) scale(0.55)">
                <ellipse cx="100" cy="175" rx="28" ry="14" fill="#e05a5a"/>
                <ellipse cx="78" cy="187" rx="14" ry="8" fill="#e05a5a"/>
                <ellipse cx="100" cy="193" rx="12" ry="7" fill="#c94040"/>
                <ellipse cx="122" cy="187" rx="14" ry="8" fill="#e05a5a"/>
                <ellipse cx="100" cy="140" rx="42" ry="50" fill="#e86060"/>
                <rect x="38" y="83" width="124" height="80" rx="5" fill="#7c3aed"/>
                <rect x="38" y="83" width="10" height="80" rx="3" fill="#5b21b6"/>
                <rect x="100" y="83" width="62" height="80" rx="0" fill="#f3e8ff"/>
                <ellipse cx="100" cy="83" rx="38" ry="34" fill="#e86060"/>
                <circle cx="85" cy="75" r="10" fill="white"/>
                <circle cx="115" cy="75" r="10" fill="white"/>
                <circle cx="87" cy="76" r="5.5" fill="#2d2d2d"/>
                <circle cx="117" cy="76" r="5.5" fill="#2d2d2d"/>
                <circle cx="89" cy="74" r="2" fill="white"/>
                <circle cx="119" cy="74" r="2" fill="white"/>
                <rect x="75" y="68" width="20" height="15" rx="5" fill="none" stroke="#a855f7" stroke-width="2.5"/>
                <rect x="105" y="68" width="20" height="15" rx="5" fill="none" stroke="#a855f7" stroke-width="2.5"/>
                <line x1="95" y1="75" x2="105" y2="75" stroke="#a855f7" stroke-width="2.5"/>
                <path d="M88 93 Q100 103 112 93" fill="none" stroke="#c94040" stroke-width="2.5" stroke-linecap="round"/>
              </g>
              <text x="125" y="62" font-family="'Segoe UI',Arial,sans-serif" font-size="44" font-weight="700" fill="url(#fg2)">Flary</text>
              <text x="128" y="88" font-family="'Segoe UI',Arial,sans-serif" font-size="14" font-weight="400" fill="#888" letter-spacing="4">DIGITAL LIBRARY</text>
            </svg>
        </div>
        <h2 style="font-size:1.5rem;font-weight:700;margin-bottom:8px;">Akses Koleksi Buku</h2>
        <p style="color:#9ca3af;margin-bottom:32px;">Untuk melihat koleksi buku, kamu perlu login atau daftar akun terlebih dahulu. Gratis!</p>

        {{-- TOMBOL DIPERBAIKI --}}
        <div style="display:flex;gap:12px;">
            <a href="{{ route('register') }}" class="grad" style="flex:1;padding:12px 16px;border-radius:12px;color:#fff;text-decoration:none;font-weight:600;text-align:center;white-space:nowrap;">Daftar Akun</a>
            <a href="{{ route('login') }}" style="flex:1;padding:12px 16px;border-radius:12px;color:#fff;text-decoration:none;border:1px solid #4b5563;background:#1f2937;text-align:center;white-space:nowrap;">Sudah Punya Akun</a>
        </div>

        <button onclick="tutupModal()" style="margin-top:24px;background:none;border:none;color:#6b7280;cursor:pointer;font-size:0.9rem;font-family:'Poppins',sans-serif;">Nanti saja</button>
    </div>
</div>

{{-- SCRIPT --}}
<script>
    const desktopNav = document.getElementById('desktop-nav');
    const menuBtn    = document.getElementById('menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');

    function handleResize() {
        if (window.innerWidth >= 768) {
            desktopNav.style.display = 'flex';
            desktopNav.style.alignItems = 'center';
            menuBtn.style.display = 'none';
            mobileMenu.style.display = 'none';
        } else {
            desktopNav.style.display = 'none';
            menuBtn.style.display = 'block';
        }
    }

    handleResize();
    window.addEventListener('resize', handleResize);

    menuBtn.addEventListener('click', () => {
        const isHidden = mobileMenu.style.display === 'none' || mobileMenu.style.display === '';
        mobileMenu.style.display = isHidden ? 'block' : 'none';
    });

    mobileMenu.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => {
            mobileMenu.style.display = 'none';
        });
    });

    const modal = document.getElementById('modal-auth');

    function bukaModal() {
        modal.style.display = 'flex';
    }

    function tutupModal() {
        modal.style.display = 'none';
    }

    modal.addEventListener('click', function(e) {
        if (e.target === modal) tutupModal();
    });
</script>

</body>
</html>