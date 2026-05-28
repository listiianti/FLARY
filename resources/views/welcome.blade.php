<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan Digital</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
    </style>
</head>

<body class="bg-black text-white">

{{-- NAVBAR --}}
<header class="fixed top-0 left-0 w-full z-50 bg-black/70 backdrop-blur-md">
    <div class="container mx-auto px-6 py-2 flex items-center justify-between">

        <a href="/" class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 120" style="height:72px; width:auto;">
              <defs>
                <linearGradient id="fg" x1="0%" y1="0%" x2="100%" y2="0%">
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
              <text x="125" y="62" font-family="'Segoe UI', Arial, sans-serif" font-size="44" font-weight="700" fill="url(#fg)">Flary</text>
              <text x="128" y="88" font-family="'Segoe UI', Arial, sans-serif" font-size="14" font-weight="400" fill="#888888" letter-spacing="4">DIGITAL LIBRARY</text>
            </svg>
        </a>

        <nav class="hidden md:flex items-center gap-8 text-lg">
            <a href="#beranda" class="hover:text-cyan-400 transition">Beranda</a>
            <a href="#koleksi" class="hover:text-cyan-400 transition">Koleksi</a>
            <a href="#tentang" class="hover:text-cyan-400 transition">Tentang</a>
            <a href="#kontak" class="hover:text-cyan-400 transition">Kontak</a>

            @auth
                <a href="{{ route('beranda') }}"
                   class="px-6 py-3 rounded-xl bg-gradient-to-r from-purple-500 to-cyan-400 hover:scale-105 transition duration-300">
                    Dashboard
                </a>
            @else
                <a href="{{ route('register') }}"
                   class="px-6 py-3 rounded-xl bg-gradient-to-r from-purple-500 to-cyan-400 hover:scale-105 transition duration-300">
                    Register
                </a>
            @endauth
        </nav>

        <button id="menu-btn" class="md:hidden text-3xl">☰</button>
    </div>

    <div id="mobile-menu" class="hidden md:hidden bg-black/90 px-6 pb-6">
        <div class="flex flex-col gap-4 text-lg">
            <a href="#beranda">Beranda</a>
            <a href="#koleksi">Koleksi</a>
            <a href="#tentang">Tentang</a>
            <a href="#kontak">Kontak</a>
            @auth
                <a href="{{ route('beranda') }}"
                   class="px-5 py-3 rounded-xl bg-gradient-to-r from-purple-500 to-cyan-400 text-center">
                    Dashboard
                </a>
            @else
                <a href="{{ route('register') }}"
                   class="px-5 py-3 rounded-xl bg-gradient-to-r from-purple-500 to-cyan-400 text-center">
                    Register
                </a>
            @endauth
        </div>
    </div>
</header>

{{-- HERO SECTION --}}
<section id="beranda" class="hero-bg min-h-screen flex items-center justify-center text-center px-6">
    <div class="max-w-4xl mt-20">
        <h1 class="text-5xl md:text-7xl font-extrabold leading-tight mb-6">
            Jelajahi Dunia
            <span class="bg-gradient-to-r from-purple-400 to-cyan-400 bg-clip-text text-transparent">
                Buku Digital
            </span>
        </h1>
        <p class="text-lg md:text-2xl text-gray-200 mb-10 leading-relaxed">
            Platform perpustakaan modern untuk membaca,
            meminjam, dan menemukan berbagai koleksi buku digital
            dengan tampilan elegan dan nyaman.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            @auth
                <a href="{{ route('buku.index') }}"
                   class="px-10 py-4 rounded-2xl bg-gradient-to-r from-purple-500 to-cyan-400 text-xl font-semibold hover:scale-105 transition duration-300">
                    Mulai Membaca
                </a>
            @else
                <button onclick="bukaModal()"
                   class="px-10 py-4 rounded-2xl bg-gradient-to-r from-purple-500 to-cyan-400 text-xl font-semibold hover:scale-105 transition duration-300">
                    Mulai Membaca
                </button>
                <a href="{{ route('register') }}"
                   class="px-10 py-4 rounded-2xl border border-white/20 bg-white/10 hover:bg-white/20 transition duration-300">
                    Daftar Gratis
                </a>
            @endauth
        </div>
    </div>
</section>

{{-- KOLEKSI --}}
<section id="koleksi" class="py-24 bg-gray-900 px-6">
    <div class="container mx-auto">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold mb-4">Koleksi Buku Digital</h2>
            <p class="text-gray-400">Temukan berbagai kategori buku favoritmu.</p>
        </div>
        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-gray-800 rounded-3xl overflow-hidden shadow-lg hover:-translate-y-2 transition duration-300">
                <img src="https://images.unsplash.com/photo-1512820790803-83ca734da794?q=80&w=1200&auto=format&fit=crop"
                     class="w-full h-64 object-cover" alt="Novel">
                <div class="p-6">
                    <h3 class="text-2xl font-semibold mb-3">Novel Modern</h3>
                    <p class="text-gray-400 mb-5">Koleksi novel populer dan inspiratif dari berbagai penulis terkenal.</p>
                    @auth
                        <a href="{{ route('buku.index') }}" class="block w-full py-3 rounded-xl bg-gradient-to-r from-purple-500 to-cyan-400 text-center">Lihat Buku</a>
                    @else
                        <button onclick="bukaModal()" class="block w-full py-3 rounded-xl bg-gradient-to-r from-purple-500 to-cyan-400 text-center cursor-pointer">Lihat Buku</button>
                    @endauth
                </div>
            </div>
            <div class="bg-gray-800 rounded-3xl overflow-hidden shadow-lg hover:-translate-y-2 transition duration-300">
                <img src="https://images.unsplash.com/photo-1495446815901-a7297e633e8d?q=80&w=1200&auto=format&fit=crop"
                     class="w-full h-64 object-cover" alt="Teknologi">
                <div class="p-6">
                    <h3 class="text-2xl font-semibold mb-3">Teknologi</h3>
                    <p class="text-gray-400 mb-5">Buku pemrograman, AI, web development, dan teknologi modern.</p>
                    @auth
                        <a href="{{ route('buku.index') }}" class="block w-full py-3 rounded-xl bg-gradient-to-r from-purple-500 to-cyan-400 text-center">Lihat Buku</a>
                    @else
                        <button onclick="bukaModal()" class="block w-full py-3 rounded-xl bg-gradient-to-r from-purple-500 to-cyan-400 text-center cursor-pointer">Lihat Buku</button>
                    @endauth
                </div>
            </div>
            <div class="bg-gray-800 rounded-3xl overflow-hidden shadow-lg hover:-translate-y-2 transition duration-300">
                <img src="https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?q=80&w=1200&auto=format&fit=crop"
                     class="w-full h-64 object-cover" alt="Pendidikan">
                <div class="p-6">
                    <h3 class="text-2xl font-semibold mb-3">Pendidikan</h3>
                    <p class="text-gray-400 mb-5">Materi belajar, akademik, dan pengembangan diri.</p>
                    @auth
                        <a href="{{ route('buku.index') }}" class="block w-full py-3 rounded-xl bg-gradient-to-r from-purple-500 to-cyan-400 text-center">Lihat Buku</a>
                    @else
                        <button onclick="bukaModal()" class="block w-full py-3 rounded-xl bg-gradient-to-r from-purple-500 to-cyan-400 text-center cursor-pointer">Lihat Buku</button>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</section>

{{-- TENTANG --}}
<section id="tentang" class="py-24 bg-black px-6">
    <div class="container mx-auto grid md:grid-cols-2 gap-12 items-center">
        <div>
            <h2 class="text-4xl md:text-5xl font-bold mb-6">Tentang Platform</h2>
            <p class="text-gray-300 text-lg leading-relaxed mb-6">
                Perpustakaan Digital adalah platform modern untuk membaca buku kapan saja dan di mana saja.
            </p>
            <p class="text-gray-400 leading-relaxed">
                Dengan sistem digital, pengguna dapat mengakses ribuan koleksi buku dengan mudah dan nyaman.
            </p>
        </div>
        <div>
            <img src="https://images.unsplash.com/photo-1526243741027-444d633d7365?q=80&w=1200&auto=format&fit=crop"
                 class="rounded-3xl shadow-2xl" alt="Library">
        </div>
    </div>
</section>

{{-- KONTAK --}}
<section id="kontak" class="py-24 bg-gray-900 px-6">
    <div class="container mx-auto max-w-3xl text-center">
        <h2 class="text-4xl md:text-5xl font-bold mb-6">Hubungi Kami</h2>
        <p class="text-gray-400 mb-10">Jika ada pertanyaan atau saran, silakan hubungi kami.</p>
        <form class="space-y-6">
            <input type="text" placeholder="Nama"
                   class="w-full px-5 py-4 rounded-2xl bg-gray-800 border border-gray-700 focus:outline-none focus:ring-2 focus:ring-cyan-400">
            <input type="email" placeholder="Email"
                   class="w-full px-5 py-4 rounded-2xl bg-gray-800 border border-gray-700 focus:outline-none focus:ring-2 focus:ring-cyan-400">
            <textarea rows="5" placeholder="Pesan"
                      class="w-full px-5 py-4 rounded-2xl bg-gray-800 border border-gray-700 focus:outline-none focus:ring-2 focus:ring-cyan-400"></textarea>
            <button type="submit"
                    class="px-10 py-4 rounded-2xl bg-gradient-to-r from-purple-500 to-cyan-400 text-xl font-semibold hover:scale-105 transition duration-300">
                Kirim Pesan
            </button>
        </form>
    </div>
</section>

{{-- FOOTER --}}
<footer class="bg-black py-8 text-center text-gray-400 border-t border-gray-800">
    <p>© {{ date('Y') }} Flary Digital Library. All Rights Reserved.</p>
</footer>

{{-- MODAL POPUP --}}
<div id="modal-auth"
     class="fixed inset-0 z-50 flex items-center justify-center bg-black/70 backdrop-blur-sm hidden">
    <div class="bg-gray-900 rounded-3xl p-10 max-w-md w-full mx-4 shadow-2xl border border-gray-700 text-center">
        <div class="flex justify-center mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 120" style="height:60px; width:auto;">
              <defs>
                <linearGradient id="fg2" x1="0%" y1="0%" x2="100%" y2="0%">
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
              <text x="125" y="62" font-family="'Segoe UI', Arial, sans-serif" font-size="44" font-weight="700" fill="url(#fg2)">Flary</text>
              <text x="128" y="88" font-family="'Segoe UI', Arial, sans-serif" font-size="14" font-weight="400" fill="#888888" letter-spacing="4">DIGITAL LIBRARY</text>
            </svg>
        </div>
        <h2 class="text-2xl font-bold mb-2">Akses Koleksi Buku</h2>
        <p class="text-gray-400 mb-8">
            Untuk melihat koleksi buku, kamu perlu login atau daftar akun terlebih dahulu. Gratis!
        </p>
        <div class="flex flex-col sm:flex-row gap-4">
            <a href="{{ route('register') }}"
               class="flex-1 py-3 rounded-xl bg-gradient-to-r from-purple-500 to-cyan-400 font-semibold hover:scale-105 transition duration-300">
                Daftar Akun
            </a>
            <a href="{{ route('login') }}"
               class="flex-1 py-3 rounded-xl border border-gray-600 bg-gray-800 hover:bg-gray-700 transition duration-300">
                Sudah Punya Akun
            </a>
        </div>
        <button onclick="tutupModal()"
                class="mt-6 text-gray-500 hover:text-white transition text-sm">
            Nanti saja
        </button>
    </div>
</div>

{{-- SCRIPT --}}
<script>
    const menuBtn = document.getElementById('menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    menuBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });

    const modal = document.getElementById('modal-auth');

    function bukaModal() {
        modal.classList.remove('hidden');
    }

    function tutupModal() {
        modal.classList.add('hidden');
    }

    modal.addEventListener('click', function(e) {
        if (e.target === modal) tutupModal();
    });
</script>

</body>
</html>