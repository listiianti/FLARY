@forelse($bukus as $buku)
    <div class="col-md-6 col-lg-3">
        <div class="card book-card shadow-sm h-100">
            <div class="book-cover-wrapper">
                <span class="category-badge">
                    {{ $buku->kategori->first()->nama_kategori ?? 'Umum' }}
                </span>
                
                @if($buku->judul == 'Belajar Laravel 11')
                    <img src="https://images.unsplash.com/photo-1512820790803-83ca734da794?q=80&w=800" class="book-cover" alt="Book">
                @elseif($buku->judul == 'UI UX Design Modern')
                    <img src="https://images.unsplash.com/photo-1544717305-2782549b5136?q=80&w=800" class="book-cover" alt="Book">
                @elseif($buku->judul == 'Dasar Flutter untuk Pemula' || $buku->judul == 'Dasar Flutter')
                    <img src="https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?q=80&w=800" class="book-cover" alt="Book">
                @else
                    <img src="https://images.unsplash.com/photo-1495446815901-a7297e633e8d?q=80&w=800" class="book-cover" alt="Book">
                @endif
            </div>

            <div class="card-body d-flex flex-column">
                <h5 class="fw-bold text-truncate" title="{{ $buku->judul }}">
                    {{ $buku->judul }}
                </h5>
                <p class="text-muted small mb-3">
                    Oleh: {{ $buku->pengarang ?? $buku->penulis }}
                </p>
                <div class="mt-auto">
                    <button class="btn btn-primary w-100 rounded-3">
                        Pinjam Buku
                    </button>
                </div>
            </div>
        </div>
    </div>
@empty
    <div class="col-12 text-center py-5">
        <div class="p-4 rounded-4 bg-white shadow-sm d-inline-block">
            <i class="fas fa-search-minus text-muted mb-2" style="font-size: 2.5rem;"></i>
            <p class="text-dark fw-medium mb-0">Buku tidak ditemukan...</p>
        </div>
    </div>
@endforelse