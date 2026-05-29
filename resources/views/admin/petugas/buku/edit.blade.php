@extends('layouts.app-petugas')

@section('title', 'Edit Buku')

@section('content')
<style>
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

    <header class="mb-5">
        <h2 class="h3 fw-bold text-dark mb-1">Edit Buku</h2>
        <p class="text-muted small mb-0">Perbarui informasi buku di bawah ini.</p>
    </header>

    <div class="row justify-content-center">
        <div class="col-12 col-lg-7">
            <div class="p-4 shadow-sm rounded-4" style="background:rgba(255,255,255,0.9);">

                @if($errors->any())
                    <div class="alert alert-danger rounded-3 border-0 mb-4">
                        <ul class="mb-0 small">
                            @foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('petugas.buku.update', $buku->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label fw-medium small">Judul Buku</label>
                        <input type="text" name="judul" value="{{ old('judul', $buku->judul) }}"
                               class="form-control rounded-3">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-medium small">Penulis</label>
                        <input type="text" name="penulis" value="{{ old('penulis', $buku->penulis) }}"
                               class="form-control rounded-3">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-medium small">Kategori</label>
                        <select name="id_kategori" class="form-select rounded-3">
                            <option value="">-- Pilih Kategori --</option>
                            @foreach($kategoris as $kat)
                                <option value="{{ $kat->id }}"
                                    {{ old('id_kategori', $buku->kategori->first()->id ?? '') == $kat->id ? 'selected' : '' }}>
                                    {{ $kat->nama_kategori }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-medium small">Stok</label>
                        <input type="number" name="stok" value="{{ old('stok', $buku->stok) }}" min="0"
                               class="form-control rounded-3">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-medium small">Deskripsi</label>
                        <textarea name="deskripsi" rows="4" class="form-control rounded-3">{{ old('deskripsi', $buku->deskripsi) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-medium small">Tahun Terbit</label>
                        <input type="number" name="tahun_terbit" value="{{ old('tahun_terbit', $buku->tahun_terbit) }}"
                               class="form-control rounded-3" min="1900" max="{{ date('Y') }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-medium small">Penerbit</label>
                        <input type="text" name="penerbit" value="{{ old('penerbit', $buku->penerbit) }}"
                               class="form-control rounded-3">
                    </div>

                    {{-- FIELD GAMBAR --}}
                    <div class="mb-4">
                        <label class="form-label fw-medium small">Cover Buku</label>

                        {{-- Preview gambar (lama atau baru) --}}
                        <div class="preview-wrapper" id="preview-wrapper"
                             style="{{ $buku->gambar ? 'display:block' : 'display:none' }}">
                            <img id="preview-gambar-edit"
                                 src="{{ $buku->gambar ? asset('storage/' . $buku->gambar) : '' }}"
                                 alt="Cover">
                            <button type="button" class="btn-hapus-preview" onclick="hapusPreviewEdit()" title="Hapus / ganti gambar">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>

                        {{-- Nama file gambar lama --}}
                        @if($buku->gambar)
                            <p class="nama-file" id="nama-file" style="display:block;">
                                <i class="fas fa-paperclip me-1"></i>
                                <span id="teks-nama-file">{{ basename($buku->gambar) }}</span>
                            </p>
                        @else
                            <p class="nama-file" id="nama-file">
                                <i class="fas fa-paperclip me-1"></i>
                                <span id="teks-nama-file"></span>
                            </p>
                        @endif

                        {{-- Upload area, disembunyikan jika sudah ada gambar --}}
                        <div class="upload-area" id="upload-area-edit"
                             style="{{ $buku->gambar ? 'display:none' : 'display:block' }}"
                             onclick="document.getElementById('input-gambar-edit').click()">
                            <i class="fas fa-image fa-2x mb-2" style="color:#c084fc;"></i>
                            <p class="mb-0 small text-muted">Klik untuk upload gambar baru</p>
                            <p class="mb-0" style="font-size:11px; color:#c084fc;">JPG, PNG, WEBP — maks 2MB</p>
                        </div>

                        <input type="file" id="input-gambar-edit" name="gambar"
                               accept="image/jpeg,image/png,image/webp"
                               class="d-none" onchange="previewGambarEdit(this)">

                        <input type="hidden" name="hapus_gambar" id="hapus-gambar" value="0">
                    </div>

                    <div class="d-flex gap-2 mt-4">
                        <button type="submit" class="btn text-white px-4 rounded-3"
                                style="background:linear-gradient(135deg,#6200ea,#9d4edd);">
                            <i class="fas fa-save me-2"></i>Update
                        </button>
                        <a href="{{ route('petugas.buku.index') }}" class="btn btn-outline-secondary rounded-3">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

<script>
function previewGambarEdit(input) {
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
        // Tampilkan preview gambar baru
        document.getElementById('preview-gambar-edit').src = e.target.result;
        document.getElementById('preview-wrapper').style.display = 'block';

        // Tampilkan nama file baru
        document.getElementById('teks-nama-file').textContent = file.name;
        document.getElementById('nama-file').style.display = 'block';

        // Sembunyikan upload area
        document.getElementById('upload-area-edit').style.display = 'none';

        // Reset flag hapus gambar
        document.getElementById('hapus-gambar').value = '0';
    };
    reader.readAsDataURL(file);
}

function hapusPreviewEdit() {
    document.getElementById('input-gambar-edit').value = '';
    document.getElementById('preview-gambar-edit').src = '';
    document.getElementById('preview-wrapper').style.display = 'none';
    document.getElementById('teks-nama-file').textContent = '';
    document.getElementById('nama-file').style.display = 'none';
    document.getElementById('upload-area-edit').style.display = 'block';

    // Beri sinyal ke controller bahwa gambar lama ingin dihapus
    document.getElementById('hapus-gambar').value = '1';
}
</script>

@endsection