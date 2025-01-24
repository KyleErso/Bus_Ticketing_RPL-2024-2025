@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Tambah Jadwal</h1>

    <!-- Form Tambah Jadwal -->
    <div class="card">
        <div class="card-header">
            <h5>Form Tambah Jadwal</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('jadwal.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="asal" class="form-label">Asal</label>
                    <input type="text" class="form-control" id="asal" name="asal" required>
                </div>
                <div class="mb-3">
                    <label for="tujuan" class="form-label">Tujuan</label>
                    <input type="text" class="form-control" id="tujuan" name="tujuan" required>
                </div>
                <div class="mb-3">
                    <label for="tanggal_keberangkatan" class="form-label">Tanggal Keberangkatan</label>
                    <input type="date" class="form-control" id="tanggal_keberangkatan" name="tanggal_keberangkatan" required>
                </div>
                <div class="mb-3">
                    <label for="jam_keberangkatan" class="form-label">Jam Keberangkatan</label>
                    <input type="time" class="form-control" id="jam_keberangkatan" name="jam_keberangkatan" required>
                </div>
                <div class="mb-3">
                    <label for="jam_sampai" class="form-label">Jam Sampai</label>
                    <input type="time" class="form-control" id="jam_sampai" name="jam_sampai" required>
                </div>
                <div class="mb-3">
                    <label for="waktu_perjalanan" class="form-label">Waktu Perjalanan (jam)</label>
                    <input type="number" class="form-control" id="waktu_perjalanan" name="waktu_perjalanan" required>
                </div>
                <div class="mb-3">
                    <label for="id_bis" class="form-label">ID Bis</label>
                    <input type="number" class="form-control" id="id_bis" name="id_bis" required>
                </div>
                <div class="mb-3">
                    <label for="harga_tiket" class="form-label">Harga Tiket</label>
                    <input type="number" class="form-control" id="harga_tiket" name="harga_tiket" required>
                </div>
                <div class="mb-3">
                    <label for="titik_jemput" class="form-label">Titik Jemput</label>
                    <input type="text" class="form-control" id="titik_jemput" name="titik_jemput" required>
                </div>
                <div class="mb-3">
                    <label for="titik_turun" class="form-label">Titik Turun</label>
                    <input type="text" class="form-control" id="titik_turun" name="titik_turun" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Jadwal</button>
            </form>
        </div>
    </div>
</div>
@endsection