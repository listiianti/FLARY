@extends('layouts.app')

@section('title', 'Koleksi Saya')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold">Koleksi Saya ❤️</h2>
            <p class="text-muted">
                Buku favorit dan yang sudah kamu simpan.
            </p>
        </div>

    </div>

    <div class="row g-4">

        <div class="col-md-4">

            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">

                <img src="https://images.unsplash.com/photo-1544717305-2782549b5136?q=80&w=800"
                     class="card-img-top"
                     style="height:260px;object-fit:cover;">

                <div class="card-body">

                    <h5 class="fw-bold">
                        UI UX Modern Design
                    </h5>

                    <p class="text-muted small">
                        Buku favorit tentang UI/UX Design modern.
                    </p>

                    <button class="btn btn-danger w-100 rounded-3">
                        Hapus Koleksi
                    </button>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection