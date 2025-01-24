@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4 text-white">Checkout Pemesanan Tiket</h1>

    <!-- Card untuk detail pemesanan -->
    <div class="card mb-4">
        <div class="card-header">
            <h5>Detail Pemesanan</h5>
        </div>
        <div class="card-body">
            <!-- Detail Pemesan -->
            <div class="mb-4">
                <h6>Detail Pemesan</h6>
                <p><strong>Nama Pemesan:</strong> {{ $order->nama_pemesan }}</p>
                <p><strong>Email Pemesan:</strong> {{ Auth::user() ? Auth::user()->email : '' }}</p>
                <p><strong>Nomor Telepon:</strong> {{  Auth::user() ? Auth::user()->phone_number : '' }}</p>
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

            <!-- Total Harga -->
            <div class="mb-4">
                <h6>Total Harga</h6>
                <p><strong>Jumlah Tiket:</strong> {{ $order->jumlah_tiket }}</p>
                <p><strong>Total Harga:</strong> Rp {{ number_format($order->total_harga, 2, ',', '.') }}</p>
            </div>
        </div>
    </div>

    <!-- Tombol Bayar dengan Midtrans -->
    <div class="text-center">
        <button id="pay-button" class="btn btn-primary">Bayar Sekarang</button>
        
        <!-- Tombol Invoice (Awalnya Disembunyikan) -->
        <a id="invoice-button" href="{{ route('after.payment') }}" class="btn btn-success mt-3" style="display: none;">
            Lihat Invoice
        </a>
    </div>
</div>

<script type="text/javascript">
    var payButton = document.getElementById('pay-button');
    var invoiceButton = document.getElementById('invoice-button');

    payButton.addEventListener('click', function () {
        // Buka popup pembayaran Midtrans Snap
        window.snap.pay('{{ session('snap_token') }}', {
            onSuccess: function(result){
                // Tampilkan alert pembayaran berhasil
                alert("Pembayaran berhasil!");

                // Tampilkan tombol invoice setelah pembayaran berhasil
                invoiceButton.style.display = 'inline-block';

                // Sembunyikan tombol bayar
                payButton.style.display = 'none';
            },
            onPending: function(result){
                alert("Menunggu pembayaran Anda! Silakan selesaikan pembayaran."); 
                console.log(result);
            },
            onError: function(result){
                alert("Pembayaran gagal! Silakan coba lagi."); 
                console.log(result);
            },
            onClose: function(){
                alert('Anda menutup popup tanpa menyelesaikan pembayaran.');
            }
        });
    });
</script>

@endsection