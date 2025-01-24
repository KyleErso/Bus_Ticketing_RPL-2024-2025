@extends('layouts.app')

@section('content')
<div class="container mt-5 text-white">
    <!-- Header -->
    <div class="text-center mb-5">
        <h1 class="display-4">From Here to Everywhere</h1>
    </div>

    <!-- Form Pencarian -->
    <form action="{{ route('jadwal.search') }}" method="GET">
        <!-- Input Pencarian -->
        <div class="row g-3 align-items-end">
            <!-- Asal -->
            <div class="col-md-3">
                <label for="asal" class="form-label fw-bold fs-5">Asal</label> <!-- Menebalkan dan memperbesar teks -->
                <select class="form-select" name="asal" aria-label="Pilih Kota Asal" required>
                    <option selected>Pilih Kota Asal</option>
                    <option value="Jakarta">Jakarta</option>
                    <option value="Bandung">Bandung</option>
                    <option value="Semarang">Semarang</option>
                    <option value="Yogyakarta">Yogyakarta</option>
                    <option value="Surabaya">Surabaya</option>
                    <option value="Solo">Solo</option>
                    <option value="Malang">Malang</option>
                    <option value="Cirebon">Cirebon</option>
                    <option value="Bogor">Bogor</option>
                    <option value="Tangerang">Tangerang</option>
                </select>
            </div>

            <!-- Tujuan -->
            <div class="col-md-3">
                <label for="tujuan" class="form-label fw-bold fs-5">Tujuan</label> <!-- Menebalkan dan memperbesar teks -->
                <select class="form-select" name="tujuan" aria-label="Pilih Kota Tujuan" required>
                    <option selected>Pilih Kota Tujuan</option>
                    <option value="Jakarta">Jakarta</option>
                    <option value="Bandung">Bandung</option>
                    <option value="Semarang">Semarang</option>
                    <option value="Yogyakarta">Yogyakarta</option>
                    <option value="Surabaya">Surabaya</option>
                    <option value="Solo">Solo</option>
                    <option value="Malang">Malang</option>
                    <option value="Cirebon">Cirebon</option>
                    <option value="Bogor">Bogor</option>
                    <option value="Tangerang">Tangerang</option>
                </select>
            </div>

            <!-- Tanggal Keberangkatan -->
            <div class="col-md-3">
                <label for="tanggal" class="form-label fw-bold fs-5">Tanggal Keberangkatan</label> <!-- Menebalkan dan memperbesar teks -->
                <input type="date" name="tanggal" id="tanggal" class="form-control" required>
            </div>

            <!-- Tombol Cari -->
            <div class="col-md-3 d-grid">
                <button type="submit" class="btn btn-primary rounded-pill">Search</button>
            </div>
        </div>
    </form>

    <!-- Section Informasi Tambahan -->
    <div class="mt-5">
        <h2 class="text-center mb-4 text-white">Jarak antar kota terasa #JadilebihDekat dengan GoTravia</h2>
    </div>

    <!-- Fitur Tambahan -->
    <div class="row mt-5 position-absolute bottom-0 start-50 translate-middle-x w-100 text-white">
        <div class="col-md-4 text-center mb-4">
            <h5>Destinasi Terbaik</h5>
            <p>Temukan tujuan perjalanan favorit Anda bersama kami.</p>
        </div>
        <div class="col-md-4 text-center mb-4">
            <h5>Penawaran Terbaik</h5>
            <p>Dapatkan informasi terbaru tentang promo tiket dan paket perjalanan.</p>
        </div>
        <div class="col-md-4 text-center mb-4">
            <h5>Pemesanan Rombongan</h5>
            <p>Pesan perjalanan untuk grup Anda dengan mudah dan hemat.</p>
        </div>
    </div>
</div>
@endsection