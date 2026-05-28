@extends('layouts.app')

@section('title', 'Pinjam Buku - ' . $buku->judul)

@section('content')

<style>
    .pinjam-card {
        border: none;
        border-radius: 20px;
        background: white;
        box-shadow: 0 10px 40px rgba(0,0,0,0.08);
    }

    .book-cover-detail {
        width: 100%;
        max-width: 260px;
        height: 320px;
        object-fit: cover;
        border-radius: 16px;
        box-shadow: 0 15px 40px rgba(0,0,0,0.15);
    }

    .category-pill {
        background: linear-gradient(135deg, #6200ea, #9d4edd);
        color: white;
        padding: 6px 16px;
        border-radius: 30px;
        font-size: 13px;
        font-weight: 600;
        display: inline-block;
    }

    .back-btn {
        color: #6200ea;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 24px;
        transition: all 0.2s;
    }

    .back-btn:hover {
        color: #9d4edd;
        transform: translateX(-4px);
    }

    .form-label {
        font-weight: 600;
        font-size: 14px;
        color: #444;
    }

    .form-control {
        border-radius: 12px;
        border: 1px solid #e0e0e0;
        padding: 12px 16px;
        font-size: 14px;
        transition: all 0.2s;
    }

    .form-control:focus {
        border-color: #6200ea;
        box-shadow: 0 0 0 0.25rem rgba(98,0,234,0.1);
    }

    .form-control:disabled {
        background-color: #f8f4ff;
        color: #6200ea;
        font-weight: 600;
        border-color: #e0d4ff;
    }

    .btn-submit-pinjam {
        background: linear-gradient(135deg, #6200ea, #9d4edd);
        color: white;
        border: none;
        border-radius: 12px;
        padding: 14px 30px;
        font-weight: 600;
        font-size: 15px;
        width: 100%;
        transition: all 0.3s;
    }

    .btn-submit-pinjam:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(98,0,234,0.3);
        color: white;
    }

    .btn-batal {
        border: 2px solid #dee2e6;
        color: #666;
        background: white;
        border-radius: 12px;
        padding: 14px 30px;
        font-weight: 600;
        font-size: 15px;
        width: 100%;
        text-decoration: none;
        display: block;
        text-align: center;
        transition: all 0.3s;
    }

    .btn-batal:hover {
        background: #f5f5f5;
        color: #333;
        transform: translateY(-2px);
    }

    .info-pinjam {
        background: linear-gradient(135deg, #f3f0ff, #ede7f6);
        border-radius: 14px;
        padding: 16px 20px;
        border-left: 4px solid #6200ea;
    }

    .durasi-btn {
        border: 1px solid #dee2e6;
        border-radius: 10px;
        padding: 10px 20px;
        font-weight: 600;
        font-size: 13px;
        cursor: pointer;
        transition: all 0.2s;
        background: white;
        color: #555;
    }

    .durasi-btn.active {
        border-color: transparent;
        background: linear-gradient(135deg, #6200ea, #9d4edd);
        color: white;
    }

    .durasi-btn:hover:not(.active) {
        background: #f3f0ff;
        border-color: #6200ea;
        color: #6200ea;
    }

    .step-indicator {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 28px;
    }

    .step-dot {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background: linear-gradient(135deg, #6200ea, #9d4edd);
        color: white;
        font-weight: 700;
        font-size: 13px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .step-line {
        flex: 1;
        height: 2px;
        background: linear-gradient(90deg, #9d4edd, #e0d4ff);
        border-radius: 2px;
    }

    .step-label {
        font-size: 12px;
        font-weight: 600;
        color: #6200ea;
    }

    .cover-placeholder {
        width: 100%;
        max-width: 260px;
        height: 320px;
        border-radius: 16px;
        box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 10px;
        margin: 0 auto;
    }
</style>

<div class="container" style="max-width: 860px;">

    {{-- TOMBOL KEMBALI --}}
    <a href="{{ route('buku.show', $buku->id) }}" class="back-btn">
        <i class="fas fa-arrow-left"></i>
        Kembali ke Detail Buku
    </a>

    {{-- ERROR PINJAM --}}
    @if(session('error_pinjam'))
        <div class="alert alert-danger rounded-3 mb-4">
            <i class="fas fa-exclamation-circle me-2"></i>
            {{ session('error_pinjam') }}
        </div>
    @endif

    {{-- STEP INDICATOR --}}
    <div class="step-indicator">
        <div class="step-dot">1</div>
        <span class="step-label">Isi Form Pinjam</span>
        <div class="step-line"></div>
        <div class="step-dot" style="background: #e0e0e0; color: #aaa;">2</div>
        <span class="step-label" style="color: #aaa;">Konfirmasi</span>
        <div class="step-line" style="background: #e0e0e0;"></div>
        <div class="step-dot" style="background: #e0e0e0; color: #aaa;">3</div>
        <span class="step-label" style="color: #aaa;">Selesai</span>
    </div>

    <div class="pinjam-card p-4 p-md-5">
        <div class="row g-4">

            {{-- COVER + INFO BUKU --}}
            <div class="col-md-4 d-flex flex-column align-items-center text-center">

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

                <div class="cover-placeholder" style="background: {{ $warna }};">
                    <div style="
                        width: 70px; height: 70px;
                        background: rgba(255,255,255,0.2);
                        border-radius: 50%;
                        display: flex; align-items: center; justify-content: center;
                        font-size: 26px; font-weight: 700; color: #fff;
                    ">{{ $inisial }}</div>
                    <div style="color: rgba(255,255,255,0.8); font-size: 11px; font-weight: 500; letter-spacing: 1px; text-transform: uppercase;">
                        {{ $kategori }}
                    </div>
                </div>

                <div class="mt-3">
                    <span class="category-pill">{{ $kategori }}</span>
                </div>
                <h5 class="fw-bold mt-3 mb-1">{{ $buku->judul }}</h5>
                <p class="text-muted small">oleh {{ $buku->penulis }}</p>

                <div class="info-pinjam text-start mt-2 w-100">
                    <p class="mb-1" style="font-size: 13px; font-weight: 600; color: #6200ea;">
                        <i class="fas fa-info-circle me-2"></i>Ketentuan Pinjam
                    </p>
                    <ul class="mb-0 ps-3" style="font-size: 12px; color: #555; line-height: 1.8;">
                        <li>Maksimal peminjaman 14 hari</li>
                        <li>Buku wajib dikembalikan tepat waktu</li>
                        <li>Denda Rp5.000/hari jika terlambat</li>
                        <li>Buku harus dijaga kondisinya</li>
                    </ul>
                </div>
            </div>

            {{-- FORM PINJAM --}}
            <div class="col-md-8">

                <h4 class="fw-bold mb-1">Form Peminjaman</h4>
                <p class="text-muted mb-4" style="font-size: 14px;">
                    Lengkapi form berikut untuk meminjam buku ini.
                </p>

                <form action="{{ route('pinjam.store', $buku->id) }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">
                            <i class="fas fa-user me-2 text-primary"></i>Nama Peminjam
                        </label>
                        <input type="text" class="form-control" value="{{ Auth::user()->name }}" disabled>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            <i class="fas fa-book me-2 text-primary"></i>Buku yang Dipinjam
                        </label>
                        <input type="text" class="form-control" value="{{ $buku->judul }}" disabled>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            <i class="fas fa-calendar-check me-2 text-primary"></i>Tanggal Pinjam
                        </label>
                        <input type="date"
                               name="tanggal_pinjam"
                               class="form-control @error('tanggal_pinjam') is-invalid @enderror"
                               value="{{ old('tanggal_pinjam', date('Y-m-d')) }}"
                               min="{{ date('Y-m-d') }}"
                               required>
                        @error('tanggal_pinjam')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label">
                            <i class="fas fa-clock me-2 text-primary"></i>Durasi Peminjaman
                        </label>
                        <div class="d-flex gap-2 flex-wrap mb-2">
                            <button type="button" class="durasi-btn active" onclick="setDurasi(3, this)">3 Hari</button>
                            <button type="button" class="durasi-btn" onclick="setDurasi(7, this)">7 Hari</button>
                            <button type="button" class="durasi-btn" onclick="setDurasi(14, this)">14 Hari</button>
                        </div>
                        <input type="hidden" name="durasi" id="durasi-input" value="3">
                        <small class="text-muted">
                            <i class="fas fa-calendar-alt me-1"></i>
                            Estimasi kembali:
                            <span id="tgl-kembali" class="fw-semibold text-primary"></span>
                        </small>
                    </div>

                    <div class="row g-3 mt-1">
                        <div class="col-6">
                            <a href="{{ route('buku.show', $buku->id) }}" class="btn-batal">
                                <i class="fas fa-times me-2"></i>Batal
                            </a>
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn-submit-pinjam">
                                <i class="fas fa-check me-2"></i>Pinjam Sekarang
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

</div>

<script>
    function setDurasi(hari, el) {
        document.querySelectorAll('.durasi-btn').forEach(b => b.classList.remove('active'));
        el.classList.add('active');
        document.getElementById('durasi-input').value = hari;
        hitungTglKembali(hari);
    }

    function hitungTglKembali(hari) {
        const tglPinjam = document.querySelector('input[name="tanggal_pinjam"]').value;
        if (!tglPinjam) return;

        const tgl = new Date(tglPinjam);
        tgl.setDate(tgl.getDate() + parseInt(hari));

        const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        document.getElementById('tgl-kembali').textContent = tgl.toLocaleDateString('id-ID', options);
    }

    document.addEventListener('DOMContentLoaded', function () {
        hitungTglKembali(3);
        document.querySelector('input[name="tanggal_pinjam"]').addEventListener('change', function () {
            const durasi = document.getElementById('durasi-input').value;
            hitungTglKembali(durasi);
        });
    });
</script>

@endsection