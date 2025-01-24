@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4 text-white">Form Pemesanan Tiket</h1>

    <!-- Card untuk detail jadwal -->
    <div class="card mb-4">
        <div class="card-header">
            <h5>Detail Jadwal</h5>
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $jadwal->asal }} <i class="fas fa-arrow-right"></i> {{ $jadwal->tujuan }}</h5>
            <p><strong>Tanggal Keberangkatan:</strong> {{ \Carbon\Carbon::parse($jadwal->tanggal_keberangkatan)->format('d-m-Y') }}</p>
            <p><strong>Jam Keberangkatan:</strong> {{ \Carbon\Carbon::parse($jadwal->jam_keberangkatan)->format('H:i') }}</p>
            <p><strong>Jam Sampai:</strong> {{ \Carbon\Carbon::parse($jadwal->jam_sampai)->format('H:i') }}</p>
            <p><strong>Waktu Perjalanan:</strong> {{ $jadwal->waktu_perjalanan }} menit</p>
            <p><strong>Harga Tiket:</strong> <span class="text-success">Rp {{ number_format($jadwal->harga_tiket, 2, ',', '.') }}</span></p>

            <!-- Titik Jemput & Titik Turun -->
            <div class="row mt-3">
                <div class="col-md-6 mb-3">
                    <p class="mb-1"><strong>Titik Jemput:</strong></p>
                    <p class="mb-0">{{ $jadwal->titik_jemput }}</p>
                </div>
                <div class="col-md-6 mb-3">
                    <p class="mb-1"><strong>Titik Turun:</strong></p>
                    <p class="mb-0">{{ $jadwal->titik_turun }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Form pemesanan tiket -->
    <form action="{{ route('order.store') }}" method="POST">
        @csrf

        <!-- Input hidden untuk jadwal_id -->
        <input type="hidden" name="jadwal_id" value="{{ $jadwal->id_jadwal }}">

        <!-- Card untuk detail pemesan -->
        <div class="card mb-4">
            <div class="card-header">
                <h5>Detail Pemesan</h5>
            </div>
            <div class="card-body">
                <!-- Nama, Nomor Telepon, Email -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="nama_pemesan" class="form-label">Nama Pemesan</label>
                        <input type="text" class="form-control" id="nama_pemesan" name="nama_pemesan" 
                            value="{{ Auth::user() ? Auth::user()->name : '' }}" placeholder="Nama Pemesan" required>
                    </div>
                    <div class="col-md-6">
                        <label for="email_pemesan" class="form-label">Email Pemesan</label>
                        <input type="email" class="form-control" id="email_pemesan" name="email_pemesan" 
                            value="{{ Auth::user() ? Auth::user()->email : '' }}" placeholder="Email Pemesan" required>
                    </div>
                    <div class="col-md-6">
                        <label for="telepon_pemesan" class="form-label">Nomor Telepon Pemesan</label>
                        <input type="text" class="form-control" id="telepon_pemesan" name="telepon_pemesan" 
                            value="{{ Auth::user() ? Auth::user()->phone_number : '' }}" placeholder="Nomor Telepon Pemesan" required>
                    </div>
                    <div class="col-md-6">
                        <label for="jumlah_tiket" class="form-label">Jumlah Tiket</label>
                        <input type="number" class="form-control" id="jumlah_tiket" name="jumlah_tiket" 
                            placeholder="Jumlah tiket yang dipesan" min="1" required>
                    </div>
                </div>
            </div>
        </div>

        <!-- Input Nama Penumpang Dinamis -->
        <div id="penumpang-section">
            <!-- Input penumpang akan ditambahkan di sini menggunakan JavaScript -->
        </div>

        <!-- Tombol Submit -->
        <div class="col-md-12 text-center mt-4">
            <button type="submit" class="btn btn-primary">Pesan Tiket</button>
        </div>
    </form>
</div>

<script>
    document.getElementById('jumlah_tiket').addEventListener('input', function() {
        let jumlahTiket = this.value;
        let penumpangSection = document.getElementById('penumpang-section');
        penumpangSection.innerHTML = ''; // Clear previous inputs

        for (let i = 1; i <= jumlahTiket; i++) {
            penumpangSection.innerHTML += `
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Detail Penumpang ${i}</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="nama_penumpang_${i}" class="form-label">Nama Penumpang ${i}</label>
                            <input type="text" class="form-control" id="nama_penumpang_${i}" name="nama_penumpang_${i}" placeholder="Nama Penumpang ${i}" required>
                        </div>
                    </div>
                </div>
            </div>
            `;
        }
    });
</script>

@endsection