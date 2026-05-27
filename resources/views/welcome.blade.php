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
    <div class="container mx-auto px-6 py-4 flex items-center justify-between">

        <a href="/" class="text-3xl font-bold flex items-center gap-2">
            📖 <span>Perpustakaan Digital</span>
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
                <a href="{{ route('login') }}"
                   class="px-6 py-3 rounded-xl bg-gradient-to-r from-purple-500 to-cyan-400 hover:scale-105 transition duration-300">
                    Login
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
                <a href="{{ route('login') }}"
                   class="px-5 py-3 rounded-xl bg-gradient-to-r from-purple-500 to-cyan-400 text-center">
                    Login
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
                <a href="#koleksi"
                   class="px-10 py-4 rounded-2xl bg-gradient-to-r from-purple-500 to-cyan-400 text-xl font-semibold hover:scale-105 transition duration-300">
                    Mulai Membaca
                </a>
            @endauth

            @guest
                <a href="{{ route('register') }}"
                   class="px-10 py-4 rounded-2xl border border-white/20 bg-white/10 hover:bg-white/20 transition duration-300">
                    Daftar Gratis
                </a>
            @endguest

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

            {{-- CARD 1 --}}
            <div class="bg-gray-800 rounded-3xl overflow-hidden shadow-lg hover:-translate-y-2 transition duration-300">
                <img src="https://images.unsplash.com/photo-1512820790803-83ca734da794?q=80&w=1200&auto=format&fit=crop"
                     class="w-full h-64 object-cover" alt="Novel">
                <div class="p-6">
                    <h3 class="text-2xl font-semibold mb-3">Novel Modern</h3>
                    <p class="text-gray-400 mb-5">Koleksi novel populer dan inspiratif dari berbagai penulis terkenal.</p>

                    @auth
                        <a href="{{ route('buku.index') }}"
                           class="block w-full py-3 rounded-xl bg-gradient-to-r from-purple-500 to-cyan-400 text-center">
                            Lihat Buku
                        </a>
                    @else
                        <button onclick="bukaModal()"
                                class="block w-full py-3 rounded-xl bg-gradient-to-r from-purple-500 to-cyan-400 text-center cursor-pointer">
                            Lihat Buku
                        </button>
                    @endauth
                </div>
            </div>

            {{-- CARD 2 --}}
            <div class="bg-gray-800 rounded-3xl overflow-hidden shadow-lg hover:-translate-y-2 transition duration-300">
                <img src="https://images.unsplash.com/photo-1495446815901-a7297e633e8d?q=80&w=1200&auto=format&fit=crop"
                     class="w-full h-64 object-cover" alt="Teknologi">
                <div class="p-6">
                    <h3 class="text-2xl font-semibold mb-3">Teknologi</h3>
                    <p class="text-gray-400 mb-5">Buku pemrograman, AI, web development, dan teknologi modern.</p>

                    @auth
                        <a href="{{ route('buku.index') }}"
                           class="block w-full py-3 rounded-xl bg-gradient-to-r from-purple-500 to-cyan-400 text-center">
                            Lihat Buku
                        </a>
                    @else
                        <button onclick="bukaModal()"
                                class="block w-full py-3 rounded-xl bg-gradient-to-r from-purple-500 to-cyan-400 text-center cursor-pointer">
                            Lihat Buku
                        </button>
                    @endauth
                </div>
            </div>

            {{-- CARD 3 --}}
            <div class="bg-gray-800 rounded-3xl overflow-hidden shadow-lg hover:-translate-y-2 transition duration-300">
                <img src="https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?q=80&w=1200&auto=format&fit=crop"
                     class="w-full h-64 object-cover" alt="Pendidikan">
                <div class="p-6">
                    <h3 class="text-2xl font-semibold mb-3">Pendidikan</h3>
                    <p class="text-gray-400 mb-5">Materi belajar, akademik, dan pengembangan diri.</p>

                    @auth
                        <a href="{{ route('buku.index') }}"
                           class="block w-full py-3 rounded-xl bg-gradient-to-r from-purple-500 to-cyan-400 text-center">
                            Lihat Buku
                        </a>
                    @else
                        <button onclick="bukaModal()"
                                class="block w-full py-3 rounded-xl bg-gradient-to-r from-purple-500 to-cyan-400 text-center cursor-pointer">
                            Lihat Buku
                        </button>
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
    <p>© {{ date('Y') }} Perpustakaan Digital. All Rights Reserved.</p>
</footer>

{{-- =============================== --}}
{{-- MODAL POPUP --}}
{{-- =============================== --}}
<div id="modal-auth"
     class="fixed inset-0 z-50 flex items-center justify-center bg-black/70 backdrop-blur-sm hidden">

    <div class="bg-gray-900 rounded-3xl p-10 max-w-md w-full mx-4 shadow-2xl border border-gray-700 text-center">

        {{-- ICON --}}
        <div class="text-6xl mb-4">📚</div>

        {{-- JUDUL --}}
        <h2 class="text-2xl font-bold mb-2">Akses Koleksi Buku</h2>
        <p class="text-gray-400 mb-8">
            Untuk melihat koleksi buku, kamu perlu login atau daftar akun terlebih dahulu. Gratis!
        </p>

        {{-- TOMBOL --}}
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

        {{-- TOMBOL TUTUP --}}
        <button onclick="tutupModal()"
                class="mt-6 text-gray-500 hover:text-white transition text-sm">
            Nanti saja
        </button>

    </div>
</div>

{{-- SCRIPT --}}
<script>
    // Mobile menu
    const menuBtn = document.getElementById('menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    menuBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });

    // Modal
    const modal = document.getElementById('modal-auth');

    function bukaModal() {
        modal.classList.remove('hidden');
    }

    function tutupModal() {
        modal.classList.add('hidden');
    }

    // Klik di luar modal untuk menutup
    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            tutupModal();
        }
    });
</script>

</body>
</html>