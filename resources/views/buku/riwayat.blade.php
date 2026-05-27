@extends('layouts.app')

@section('title', 'Riwayat Pinjam')

@section('content')

<style>
    .top-header{
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 35px;
        flex-wrap: wrap;
        gap: 20px;
    }

    .top-header h1{
        font-size: 32px;
        font-weight: 700;
        color: #222;
    }

    .top-header p{
        color: #666;
        font-size: 15px;
        margin-bottom: 0;
    }

    .date-box{
        background: white;
        padding: 12px 20px;
        border-radius: 14px;
        border: 1px solid #eee;
        font-weight: 600;
        box-shadow: 0 3px 10px rgba(0,0,0,.04);
    }

    .summary-card{
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

    .summary-card h2{
        font-size: 34px;
        font-weight: 700;
        margin-bottom: 5px;
    }

    .summary-card p{
        margin-bottom: 0;
        color: #666;
        font-size: 14px;
    }

    .summary-icon{
        width: 70px;
        height: 70px;
        border-radius: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 28px;
    }

    .purple{
        background: #ede7ff;
        color: #6d28d9;
    }

    .green{
        background: #e7fff0;
        color: #15803d;
    }

    .red{
        background: #ffe8e8;
        color: #dc2626;
    }

    .card-box{
        background: rgba(255,255,255,.9);
        backdrop-filter: blur(5px);
        border-radius: 20px;
        padding: 25px;
        box-shadow: 0 5px 20px rgba(0,0,0,.04);
    }

    .search-box{
        display: flex;
        gap: 12px;
    }

    .search-box input{
        height: 50px;
        border-radius: 12px;
        border: 1px solid #ddd;
        padding-left: 15px;
    }

    .search-box button{
        border: none;
        background: linear-gradient(135deg, #6200ea, #9d4edd);
        color: white;
        border-radius: 12px;
        padding: 0 22px;
        font-weight: 600;
    }

    .table{
        margin-top: 20px;
    }

    .table thead{
        background: #f8f9fa;
    }

    .table th{
        padding: 18px !important;
        font-size: 14px;
    }

    .table td{
        padding: 18px !important;
        vertical-align: middle;
        font-size: 14px;
    }

    .status{
        padding: 7px 14px;
        border-radius: 30px;
        font-size: 12px;
        font-weight: 600;
    }

    .returned{
        background: #d8f5e5;
        color: #15803d;
    }

    .late{
        background: #ffe0e0;
        color: #dc2626;
    }

    .borrowed{
        background: #fff4cc;
        color: #ca8a04;
    }
</style>

<div class="container-fluid">

    <!-- Header -->
    <div class="top-header">

        <div>
            <h1>Riwayat Peminjaman 📚</h1>
            <p>Lihat semua aktivitas peminjaman bukumu di sini.</p>
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
                    <h2>12</h2>
                    <p>Total Pinjam</p>
                </div>

                <div class="summary-icon purple">
                    <i class="fa-solid fa-book"></i>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="summary-card">
                <div>
                    <h2>9</h2>
                    <p>Sudah Kembali</p>
                </div>

                <div class="summary-icon green">
                    <i class="fa-solid fa-circle-check"></i>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="summary-card">
                <div>
                    <h2>1</h2>
                    <p>Terlambat</p>
                </div>

                <div class="summary-icon red">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                </div>
            </div>
        </div>

    </div>

    <!-- Table -->
    <div class="card-box">

        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-3">

            <h4 class="fw-bold mb-0">
                <i class="fa-solid fa-clock-rotate-left text-primary"></i>
                Data Riwayat
            </h4>

            <div class="search-box">
                <input 
                    type="text"
                    class="form-control"
                    placeholder="Cari judul buku..."
                >

                <button type="button">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </div>

        </div>

        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead>
                    <tr>
                        <th>Judul Buku</th>
                        <th>Tanggal Pinjam</th>
                        <th>Batas Kembali</th>
                        <th>Tanggal Kembali</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>

                    <tr>
                        <td class="fw-semibold">
                            UML Dasar untuk Pemula
                        </td>
                        <td>20 Mei 2026</td>
                        <td>27 Mei 2026</td>
                        <td>26 Mei 2026</td>
                        <td>
                            <span class="status returned">
                                Sudah Kembali
                            </span>
                        </td>
                    </tr>

                    <tr>
                        <td class="fw-semibold">
                            Belajar Laravel 11 Pembuat Project
                        </td>
                        <td>18 Mei 2026</td>
                        <td>25 Mei 2026</td>
                        <td>28 Mei 2026</td>
                        <td>
                            <span class="status late">
                                Terlambat
                            </span>
                        </td>
                    </tr>

                    <tr>
                        <td class="fw-semibold">
                            Dasar Pemrograman Flutter
                        </td>
                        <td>10 Mei 2026</td>
                        <td>17 Mei 2026</td>
                        <td>-</td>
                        <td>
                            <span class="status borrowed">
                                Dipinjam
                            </span>
                        </td>
                    </tr>

                    <tr>
                        <td class="fw-semibold">
                            UI/UX Mobile Design Modern
                        </td>
                        <td>02 Mei 2026</td>
                        <td>09 Mei 2026</td>
                        <td>08 Mei 2026</td>
                        <td>
                            <span class="status returned">
                                Sudah Kembali
                            </span>
                        </td>
                    </tr>

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection