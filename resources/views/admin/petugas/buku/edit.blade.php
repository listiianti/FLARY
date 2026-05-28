@extends('layouts.app-petugas')

@section('title', 'Edit Buku')

@section('content')
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
                        <ul class="mb-0 small">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
                    </div>
                @endif

                <form action="{{ route('petugas.buku.update', $buku->id) }}" method="POST">
                    @csrf @method('PUT')
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
@endsection