@forelse($bukus as $buku)
    <div class="col-md-6 col-lg-3">
        <div class="card book-card shadow-sm h-100">
            <div class="book-cover-wrapper">
                <span class="category-badge">
                    {{ $buku->kategori->first()->nama_kategori ?? 'Umum' }}
                </span>

                @php
                    $kategori = $buku->kategori->first()->nama_kategori ?? 'Umum';
                    $warna = match($kategori) {
                        'Teknologi'  => 'linear-gradient(135deg, #6200ea, #9d4edd)',
                        'Fiksi'      => 'linear-gradient(135deg, #e91e63, #f06292)',
                        'Non-Fiksi'  => 'linear-gradient(135deg, #0288d1, #4fc3f7)',
                        'Sains'      => 'linear-gradient(135deg, #2e7d32, #66bb6a)',
                        'Sejarah'    => 'linear-gradient(135deg, #e65100, #ffa726)',
                        'Pendidikan' => 'linear-gradient(135deg, #00838f, #4dd0e1)',
                        'Bisnis'     => 'linear-gradient(135deg, #4527a0, #7c4dff)',
                        default      => 'linear-gradient(135deg, #455a64, #90a4ae)',
                    };

                    $inisial = collect(explode(' ', $buku->judul))
                                ->take(2)
                                ->map(fn($w) => strtoupper(substr($w, 0, 1)))
                                ->implode('');
                @endphp

                @if($buku->gambar)
                    {{-- Tampilkan gambar dari storage --}}
                    <img src="{{ asset('storage/' . $buku->gambar) }}"
                         alt="{{ $buku->judul }}"
                         class="book-cover">
                @else
                    {{-- Fallback: gradient + inisial --}}
                    <div style="
                        width: 100%;
                        height: 100%;
                        background: {{ $warna }};
                        display: flex;
                        flex-direction: column;
                        align-items: center;
                        justify-content: center;
                        gap: 10px;
                    ">
                        <div style="
                            width: 70px;
                            height: 70px;
                            background: rgba(255,255,255,0.2);
                            border-radius: 50%;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            font-size: 26px;
                            font-weight: 700;
                            color: #fff;
                            letter-spacing: 1px;
                        ">
                            {{ $inisial }}
                        </div>
                        <div style="
                            color: rgba(255,255,255,0.8);
                            font-size: 11px;
                            font-weight: 500;
                            letter-spacing: 1px;
                            text-transform: uppercase;
                        ">
                            {{ $kategori }}
                        </div>
                    </div>
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
                    <a href="{{ route('buku.show', $buku->id) }}"
                       class="btn btn-primary w-100 rounded-3">
                        Lihat Buku
                    </a>
                </div>
            </div>
        </div>
    </div>
@empty
    <div class="col-12 text-center py-5">
        <div class="p-4 rounded-4 bg-white shadow-sm d-inline-block">
            <i class="fas fa-search-minus text-muted mb-2" style="font-size: 2.5rem;"></i>
            <p class="text-dark fw-medium mb-0">Buku tidak ditemukan dalam kategori ini...</p>
        </div>
    </div>
@endforelse