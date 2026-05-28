@extends('layouts.app')

@section('title', 'Denda Peminjaman')

@section('content')

<style>
    .top-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 35px;
        flex-wrap: wrap;
        gap: 20px;
    }

    .top-header h1 {
        font-size: 32px;
        font-weight: 700;
        color: #222;
    }

    .top-header p {
        color: #666;
        font-size: 15px;
        margin-bottom: 0;
    }

    .date-box {
        background: white;
        padding: 12px 20px;
        border-radius: 14px;
        border: 1px solid #eee;
        font-weight: 600;
        box-shadow: 0 3px 10px rgba(0,0,0,.04);
    }

    .summary-card {
        background: rgba(255,255,255,.9);
        backdrop-filter: blur(5px);
        border-radius: 20px;
        padding: 25px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 5px 20px rgba(0,0,0,.04);
        height: 100%;
    }

    .summary-card h2 {
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 5px;
    }

    .summary-card p {
        margin-bottom: 0;
        color: #666;
        font-size: 14px;
    }

    .summary-icon {
        width: 70px;
        height: 70px;
        border-radius: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 28px;
    }

    .red { background: #ffe8e8; color: #dc2626; }
    .orange { background: #fff3e0; color: #ea6c00; }
    .yellow { background: #fffde7; color: #ca8a04; }

    .card-box {
        background: rgba(255,255,255,.9);
        backdrop-filter: blur(5px);
        border-radius: 20px;
        padding: 25px;
        box-shadow: 0 5px 20px rgba(0,0,0,.04);
    }

    .table th {
        padding: 18px !important;
        font-size: 14px;
    }

    .table td {
        padding: 18px !important;
        vertical-align: middle;
        font-size: 14px;
    }

    .status {
        padding: 7px 14px;
        border-radius: 30px;
        font-size: 12px;
        font-weight: 600;
    }

    .late { background: #ffe0e0; color: #dc2626; }
    .ongoing { background: #fff4cc; color: #ca8a04; }

    .total-box {
        background: linear-gradient(135deg, #ff758f, #ff7fa5);
        color: white;
        border-radius: 16px;
        padding: 20px 25px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .total-box h3 {
        font-size: 14px;
        margin-bottom: 4px;
        opacity: 0.9;
    }

    .total-box h2 {
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 0;
    }

    .info-box {
        background: #fff8e1;
        border: 1px solid #ffe082;
        border-radius: 12px;
        padding: 14px 18px;
        font-size: 13px;
        color: #7a5c00;
    }
</style>

<div class="container-fluid">

    <!-- Header -->
    <div class="top-header">
        <div>
            <h1>Denda Peminjaman 💸</h1>
            <p>Berikut daftar denda keterlambatan pengembalian buku kamu.</p>
        </div>
        <div class="date-box">
            <i class="fa-solid fa-calendar-days text-primary"></i>
            {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}
        </div>
    </div>

    <!-- Summary -->
    <div class="row g-4 mb-4">

        <div class="col-md-4">
            <div class="summary-card">
                <div>
                    <h2>{{ $denda->count() }}</h2>
                    <p>Total Buku Terlambat</p>
                </div>
                <div class="summary-icon red">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="summary-card">
                <div>
                    <h2>{{ $denda->sum('hari_terlambat') }} Hari</h2>
                    <p>Total Hari Keterlambatan</p>
                </div>
                <div class="summary-icon orange">
                    <i class="fa-solid fa-clock"></i>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="summary-card">
                <div>
                    <h2>Rp {{ number_format($totalDenda, 0, ',', '.') }}</h2>
                    <p>Total Denda</p>
                </div>
                <div class="summary-icon yellow">
                    <i class="fa-solid fa-wallet"></i>
                </div>
            </div>
        </div>

    </div>

    <!-- Info -->
    <div class="info-box mb-4">
        <i class="fa-solid fa-circle-info me-2"></i>
        Denda keterlambatan sebesar <strong>Rp 5.000 per hari</strong>. Silakan hubungi petugas perpustakaan untuk melakukan pembayaran denda.
    </div>

    <!-- Table -->
    <div class="card-box">

        <h4 class="fw-bold mb-4">
            <i class="fa-solid fa-list text-danger"></i>
            Detail Denda
        </h4>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Judul Buku</th>
                        <th>Batas Kembali</th>
                        <th>Tanggal Dikembalikan</th>
                        <th>Hari Terlambat</th>
                        <th>Total Denda</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($denda as $item)
                    <tr>
                        <td class="fw-semibold">{{ $item->buku->judul ?? '-' }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal_kembali)->translatedFormat('d F Y') }}</td>
                        <td>{{ $item->tanggal_dikembalikan ? \Carbon\Carbon::parse($item->tanggal_dikembalikan)->translatedFormat('d F Y') : '-' }}</td>
                        <td><span class="fw-bold text-danger">{{ $item->hari_terlambat }} hari</span></td>
                        <td><span class="fw-bold">Rp {{ number_format($item->total_denda, 0, ',', '.') }}</span></td>
                        <td>
                            @if($item->tanggal_dikembalikan)
                                <span class="status late">Terlambat Dikembalikan</span>
                            @else
                                <span class="status ongoing">Belum Dikembalikan</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">
                            <i class="fa-solid fa-circle-check fa-2x mb-2 d-block text-success"></i>
                            Tidak ada denda. Kamu tertib! 🎉
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($denda->count() > 0)
        <div class="total-box mt-4">
            <div>
                <h3>Total Denda yang Harus Dibayar</h3>
                <h2>Rp {{ number_format($totalDenda, 0, ',', '.') }}</h2>
            </div>
            <i class="fa-solid fa-money-bill-wave fa-2x opacity-75"></i>
        </div>
        @endif

    </div>

</div>

@endsection