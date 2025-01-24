@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4 text-white">Invoice Pembayaran</h1>

    <!-- Card untuk detail invoice -->
    <div class="card mb-4">
        <div class="card-header">
            <h5>Detail Invoice</h5>
        </div>
        <div class="card-body">
            <!-- Informasi Order -->
            <div class="mb-4">
                <h6>Informasi Order</h6>
                <p><strong>ID Order:</strong> {{ $order->id_order }}</p>
                <p><strong>Status Pembayaran:</strong> 
                    <span class="badge bg-success">Paid</span>
                </p>
                <p><strong>Tanggal Pemesanan:</strong> {{ $order->created_at->format('d M Y H:i') }}</p>
            </div>

            <!-- Detail Pemesan -->
            <div class="mb-4">
                <h6>Detail Pemesan</h6>
                <p><strong>Nama Pemesan:</strong> {{ $order->nama_pemesan }}</p>
                <p><strong>Email Pemesan:</strong> {{ Auth::user()->email }}</p>
                <p><strong>Nomor Telepon:</strong> {{ Auth::user()->phone_number }}</p>
            </div>

            <!-- Detail Penumpang -->
            <div class="mb-4">
                <h6>Detail Penumpang</h6>
                @foreach ($penumpang as $index => $p)
                    <div class="mb-3">
                        <p><strong>Penumpang {{ $index + 1 }}:</strong></p>
                        <p><strong>Nama:</strong> {{ $p['nama_penumpang'] }}</p>
                    </div>
                @endforeach
            </div>

            <!-- Detail Harga -->
            <div class="mb-4">
                <h6>Detail Harga</h6>
                <p><strong>Jumlah Tiket:</strong> {{ $order->jumlah_tiket }}</p>
                <p><strong>Total Harga:</strong> Rp {{ number_format($order->total_harga, 2, ',', '.') }}</p>
            </div>
        </div>
    </div>

    <!-- Tombol Kembali ke Home -->
    <div class="text-center">
        <a href="{{ route('home') }}" class="btn btn-primary">Kembali ke Home</a>
    </div>
</div>
@endsection