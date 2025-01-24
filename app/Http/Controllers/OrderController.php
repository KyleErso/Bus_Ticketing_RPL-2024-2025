<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Menampilkan form pemesanan tiket.
     *
     * @param int $jadwal_id
     * @return \Illuminate\View\View
     */
    public function orderForm($jadwal_id)
    {
        // Ambil data jadwal berdasarkan ID
        $jadwal = Jadwal::findOrFail($jadwal_id);

        // Tampilkan view form pemesanan dengan data jadwal
        return view('order.order', compact('jadwal'));
    }

    /**
     * Menyimpan data pemesanan tiket.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function store(Request $request)
    {
        // Validasi input dari form order
        $validated = $request->validate([
            'nama_pemesan' => 'required|string|max:255',
            'email_pemesan' => 'required|email',
            'telepon_pemesan' => 'required|string',
            'jumlah_tiket' => 'required|integer|min:1',
            'jadwal_id' => 'required|exists:tb_jadwal,id_jadwal',
        ]);

        // Ambil data jadwal untuk mendapatkan harga tiket
        $jadwal = Jadwal::findOrFail($validated['jadwal_id']);
        $hargaTiket = $jadwal->harga_tiket;

        // Hitung total harga
        $totalHarga = $validated['jumlah_tiket'] * $hargaTiket;

        // ID user yang sedang login
        $userId = auth()->id();

        // Data yang akan disimpan ke database
        $orderData = [
            'id_jadwal' => $validated['jadwal_id'], // ID jadwal
            'id' => $userId, // ID user
            'nama_pemesan' => $validated['nama_pemesan'], // Nama pemesan
            'jumlah_tiket' => $validated['jumlah_tiket'], // Jumlah tiket
            'status' => 'unpaid', // Status awal
            'total_harga' => $totalHarga, // Total harga yang dihitung
        ];

        // Simpan data order ke database
        $order = Order::create($orderData);

        // Konfigurasi Midtrans
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = config('midtrans.is_production', false);
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        // Parameter untuk Midtrans
        $params = [
            'transaction_details' => [
                'order_id' => $order->id_order, // Gunakan ID order yang sudah dibuat
                'gross_amount' => $totalHarga, // Gunakan total harga yang sudah dihitung
            ],
            'customer_details' => [
                'first_name' => $validated['nama_pemesan'], // Nama pemesan dari form
                'email' => $validated['email_pemesan'], // Email pemesan dari form
                'phone' => $validated['telepon_pemesan'], // Telepon pemesan dari form
            ],
        ];

        // Dapatkan Snap Token dari Midtrans
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        // Simpan Snap Token ke database
        $order->update(['snap_token' => $snapToken]);

        // Simpan data penumpang sementara ke session
        $penumpang = [];
        for ($i = 1; $i <= $validated['jumlah_tiket']; $i++) {
            $penumpang[] = [
                'nama_penumpang' => $request->input("nama_penumpang_{$i}"),
            ];
        }

        // Simpan ID order dan Snap Token ke sesi untuk digunakan di halaman checkout
        session(['order_id' => $order->id_order]);
        session(['penumpang' => $penumpang]);
        session(['snap_token' => $snapToken]);

        // Tampilkan view checkout dengan membawa data yang diperlukan
        return view('order.checkout', [
            'order' => $order, // Data order
            'snap_token' => $snapToken, // Snap Token dari Midtrans
            'penumpang' => $penumpang, // Data penumpang
        ]);
    }

    public function afterPayment(Request $request)
    {
        // Ambil order_id dari session
        $orderId = session('order_id');
    
        // Jika order_id tidak ditemukan, redirect ke halaman home dengan pesan error
        if (!$orderId) {
            return redirect()->route('home')->with('error', 'Order ID tidak ditemukan.');
        }
    
        // Ambil data order dari database
        $order = Order::findOrFail($orderId);
    
        // Ambil data penumpang dari session
        $penumpang = session('penumpang', []);
    
        // Tampilkan halaman invoice dengan data order dan penumpang
        return view('order.invoice', [
            'order' => $order,
            'penumpang' => $penumpang,
        ]);
    }
    public function handlePaymentNotification(Request $request)
    {
        // Ambil data notifikasi dari Midtrans
        $payload = $request->all();

        // Validasi signature key (opsional, untuk keamanan)
        $hashed = hash('sha512', $payload['order_id'] . $payload['status_code'] . $payload['gross_amount'] . config('midtrans.server_key'));
        if ($hashed !== $payload['signature_key']) {
            return response()->json(['message' => 'Invalid signature'], 400);
        }

        // Ambil order_id dari payload
        $orderId = $payload['order_id'];

        // Cari order berdasarkan order_id
        $order = Order::findOrFail($orderId);

        // Update status order berdasarkan status pembayaran
        if ($payload['transaction_status'] == 'settlement') {
            $order->status = 'paid';
            $order->save();
        }

        // Berikan respon ke Midtrans
        return response()->json(['message' => 'Notification received'], 200);
    }
}