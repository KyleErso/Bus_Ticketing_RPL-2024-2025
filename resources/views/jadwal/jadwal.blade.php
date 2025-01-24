@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4 text-white">Daftar Jadwal Perjalanan</h1>

    <!-- Filter Section -->
    <form action="{{ route('jadwal.search') }}" method="GET">
        <div class="row g-3 mb-4 align-items-end text-white">
            <!-- Asal -->
            <div class="col-md-3">
                <label for="asal" class="form-label fw-bold fs-5">Asal</label>
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
                <label for="tujuan" class="form-label fw-bold fs-5">Tujuan</label>
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
                <label for="tanggal" class="form-label fw-bold fs-5">Tanggal Keberangkatan</label>
                <input type="date" name="tanggal" id="tanggal" class="form-control" required>
            </div>

            <!-- Tombol Cari -->
            <div class="col-md-3 d-grid">
                <button type="submit" class="btn btn-primary rounded-pill">Search</button>
            </div>
        </div>
    </form>

 <!-- Jadwal List -->
@if($noResults)
    <div class="alert alert-warning text-center" role="alert">
        Jadwal tidak ada untuk pencarian Anda.
    </div>
@else
    <h5 class="mb-3 text-white">Menampilkan {{ $jadwals->count() }} Jadwal Terbaik</h5>
    @foreach($jadwals as $jadwal)
        <div class="card mb-4 shadow-sm" style="border-radius: 10px;">
            <!-- Header Card -->
            <div class="card-header">
                    <span class="card-title-text">{{ $jadwal->asal }} <i class="fas fa-arrow-right"></i> {{ $jadwal->tujuan }}</span>
            </div>

            <!-- Body Card -->
            <div class="card-body">
                <div class="card-info">
                    <div class="card-info-item">
                    <span class="card-info-label">Titik Jemput</span>
                        <span class="card-info-label">{{ $jadwal->titik_jemput }}</span>
                        <span class="card-info-label">Jam Keberangkatan</span>
                        <span class="card-info-value">{{ \Carbon\Carbon::parse($jadwal->jam_keberangkatan)->format('H:i') }}</span>
                    </div>
                    
                    <div class="card-info-item">
                        <span class="card-info-label">Titik Turun</span>
                        <span class="card-info-value">{{ $jadwal->titik_turun }}</span>
                    </div>
                    <div class="card-info-item">
                        <span class="card-info-label">Estimasi Perjalanan</span>
                        <span class="card-info-value">{{ $jadwal->waktu_perjalanan }} Menit</span>
                    </div>
                </div>
                <div class="card-price">
                    <span class="card-price-old">Rp {{ number_format($jadwal->harga_tiket + 50000, 2, ',', '.') }}</span>
                    <span class="card-price-new">Rp {{ number_format($jadwal->harga_tiket, 2, ',', '.') }}</span>
                </div>
            </div>

            <!-- Footer Card -->
            <div class="card-footer">
                <div class="card-footer-info">
                </div>
                @if(Auth::check())
                    <!-- Jika pengguna sudah login, arahkan ke halaman order -->
                    <a href="{{ route('order.form', ['jadwal_id' => $jadwal->id_jadwal]) }}" class="card-footer-button">
                        Beli
                    </a>
                @else
                    <!-- Jika pengguna belum login, tampilkan tombol untuk membuka modal login -->
                    <button type="button" class="card-footer-button" data-bs-toggle="modal" data-bs-target="#loginModal">
                        Beli
                    </button>
                @endif
            </div>
        </div>
    @endforeach
@endif

    <!-- Modal Login -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Anda harus login untuk memesan tiket.</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <!-- Tombol Login -->
                    <a href="{{ route('login') }}" class="btn btn-primary mb-3">
                        Login
                    </a>
                    <!-- Teks Register -->
                    <p class="mb-0">Belum punya akun? <a href="{{ route('register') }}">Register</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection