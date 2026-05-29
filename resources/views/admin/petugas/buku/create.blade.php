@extends('layouts.app-petugas')

@section('title', 'Tambah Buku')

@section('content')
<style>
    .form-container {
        background: rgba(255,255,255,0.9);
        backdrop-filter: blur(5px);
        border-radius: 16px;
        border: 1px solid rgba(233,236,239,0.6);
    }
    .form-control, .form-select {
        border-radius: 10px;
        border: 1px solid #e2e8f0;
        padding: 10px 16px;
        font-size: 0.9rem;
    }
    .form-control:focus, .form-select:focus {
        border-color: #6200ea;
        box-shadow: 0 0 0 3px rgba(98,0,234,0.1);
    }
    .btn-simpan {
        background: linear-gradient(135deg, #6200ea, #9d4edd);
        color: white;
        border: none;
        border-radius: 10px;
        padding: 10px 28px;
        font-weight: 600;
        transition: 0.3s;
    }
    .btn-simpan:hover {
        opacity: 0.9;
        transform: translateY(-1px);
        color: white;
    }
    .upload-area {
        border: 2px dashed #c084fc;
        border-radius: 10px;
        padding: 24px;
        text-align: center;
        cursor: pointer;
        transition: 0.3s;
        background: #fdf4ff;
    }
    .upload-area:hover {
        background: #f3e8ff;
        border-color: #a855f7;
    }
    .preview-wrapper {
        position: relative;
        margin-top: 12px;
        display: none;
    }
    .preview-wrapper img {
        width: 100%;
        max-height: 220px;
        object-fit: cover;
        border-radius: 10px;
        border: 1px solid #e2e8f0;
    }
    .btn-hapus-preview {
        position: absolute;
        top: 8px;
        right: 8px;
        background: rgba(0,0,0,0.55);
        color: white;
        border: none;
        border-radius: 50%;
        width: 30px;
        height: 30px;
        font-size: 14px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background 0.2s;
    }
    .btn-hapus-preview:hover { background: rgba(200,0,0,0.8); }
    .nama-file {
        font-size: 12px;
        color: #6200ea;
        margin-top: 6px;
        display: none;
    }
</style>

<div class="container-fluid">

    <header class="d-flex justify-content-between align-items-center mb-5">
        <div>
            <h2 class="h3 fw-bold text-dark mb-1">Tambah Buku</h2>
            <p class="text-muted small mb-0">Isi form berikut untuk menambahkan buku baru.</p>
        </div>
        <a href="{{ route('petugas.buku.index') }}"
           class="btn btn-outline-secondary rounded-pill btn-sm">
            <i class="fas fa-arrow-left me-2"></i>Kembali
        </a>
    </header>

    @if($errors->any())
        <div class="alert alert-danger rounded-3 border-0 shadow-sm mb-4">
            <ul class="mb-0 small">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="form-container p-4 shadow-sm" style="max-width:700px;">
        <form action="{{ route('petugas.buku.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label class="form-label fw-semibold small text-dark">Judul Buku <span class="text-danger">*</span></label>
                <input type="text" name="judul" value="{{ old('judul') }}"
                       class="form-control @error('judul') is-invalid @enderror"
                       placeholder="Masukkan judul buku">
                @error('judul')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold small text-dark">Penulis <span class="text-danger">*</span></label>
                <input type="text" name="penulis" value="{{ old('penulis') }}"
                       class="form-control @error('penulis') is-invalid @enderror"
                       placeholder="Masukkan nama penulis">
                @error('penulis')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold small text-dark">Kategori <span class="text-danger">*</span></label>
                <select name="id_kategori" class="form-select @error('id_kategori') is-invalid @enderror">
                    <option value="">-- Pilih Kategori --</option>
                    @foreach($kategoris as $kat)
                        <option value="{{ $kat->id }}" {{ old('id_kategori') == $kat->id ? 'selected' : '' }}>
                            {{ $kat->nama_kategori }}
                        </option>
                    @endforeach
                </select>
                @error('id_kategori')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold small text-dark">Stok <span class="text-danger">*</span></label>
                <input type="number" name="stok" value="{{ old('stok', 1) }}" min="0"
                       class="form-control @error('stok') is-invalid @enderror"
                       placeholder="Jumlah stok buku">
                @error('stok')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold small text-dark">Deskripsi</label>
                <textarea name="deskripsi" rows="4"
                          class="form-control @error('deskripsi') is-invalid @enderror"
                          placeholder="Deskripsi singkat tentang buku (opsional)">{{ old('deskripsi') }}</textarea>
                @error('deskripsi')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold small text-dark">Tahun Terbit</label>
                <input type="number" name="tahun_terbit" value="{{ old('tahun_terbit') }}"
                       class="form-control @error('tahun_terbit') is-invalid @enderror"
                       placeholder="Contoh: 2023" min="1900" max="{{ date('Y') }}">
                @error('tahun_terbit')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold small text-dark">Penerbit</label>
                <input type="text" name="penerbit" value="{{ old('penerbit') }}"
                       class="form-control @error('penerbit') is-invalid @enderror"
                       placeholder="Nama penerbit (opsional)">
                @error('penerbit')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            {{-- FIELD GAMBAR --}}
            <div class="mb-4">
                <label class="form-label fw-semibold small text-dark">Cover Buku</label>

                <div class="upload-area" id="upload-area" onclick="document.getElementById('input-gambar').click()">
                    <i class="fas fa-image fa-2x mb-2" style="color:#c084fc;"></i>
                    <p class="mb-0 small text-muted">Klik untuk upload gambar cover</p>
                    <p class="mb-0" style="font-size:11px; color:#c084fc;">JPG, PNG, WEBP — maks 2MB</p>
                </div>

                <input type="file" id="input-gambar" name="gambar" accept="image/jpeg,image/png,image/webp"
                       class="d-none @error('gambar') is-invalid @enderror"
                       onchange="previewGambar(this)">

                {{-- Preview setelah pilih gambar --}}
                <div class="preview-wrapper" id="preview-wrapper">
                    <img id="preview-gambar" src="" alt="Preview">
                    <button type="button" class="btn-hapus-preview" onclick="hapusPreview()" title="Hapus gambar">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                {{-- Nama file yang dipilih --}}
                <p class="nama-file" id="nama-file">
                    <i class="fas fa-paperclip me-1"></i><span id="teks-nama-file"></span>
                </p>

                @error('gambar')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
            </div>

            <div class="d-flex gap-3 mt-4">
                <button type="submit" class="btn-simpan">
                    <i class="fas fa-save me-2"></i>Simpan Buku
                </button>
                <a href="{{ route('petugas.buku.index') }}"
                   class="btn btn-outline-secondary rounded-pill px-4">
                    Batal
                </a>
            </div>

        </form>
    </div>

</div>

<script>
function previewGambar(input) {
    if (!input.files || input.files.length === 0) return;

    if (input.files.length > 1) {
        alert('Hanya boleh memilih 1 gambar.');
        input.value = '';
        return;
    }

    const file = input.files[0];

    if (file.size > 2 * 1024 * 1024) {
        alert('Ukuran gambar tidak boleh lebih dari 2MB.');
        input.value = '';
        return;
    }

    const reader = new FileReader();
    reader.onload = e => {
        // Tampilkan preview gambar
        document.getElementById('preview-gambar').src = e.target.result;
        document.getElementById('preview-wrapper').style.display = 'block';

        // Tampilkan nama file
        document.getElementById('teks-nama-file').textContent = file.name;
        document.getElementById('nama-file').style.display = 'block';

        // Sembunyikan upload area
        document.getElementById('upload-area').style.display = 'none';
    };
    reader.readAsDataURL(file);
}

function hapusPreview() {
    document.getElementById('input-gambar').value = '';
    document.getElementById('preview-gambar').src = '';
    document.getElementById('preview-wrapper').style.display = 'none';
    document.getElementById('nama-file').style.display = 'none';
    document.getElementById('teks-nama-file').textContent = '';
    document.getElementById('upload-area').style.display = 'block';
}
</script>

@endsection