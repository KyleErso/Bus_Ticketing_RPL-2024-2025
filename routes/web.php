<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\OrderController;

// Route untuk halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Route untuk autentikasi
Auth::routes();

// Route untuk halaman home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route untuk pencarian jadwal
Route::get('/jadwal/search', [JadwalController::class, 'search'])->name('jadwal.search');

// Route untuk pemesanan tiket (hanya bisa diakses oleh pengguna yang login)
Route::middleware('auth')->group(function () {
    // Route untuk menampilkan form pemesanan
    Route::get('/order/{jadwal_id}', [OrderController::class, 'orderForm'])->name('order.form');

    // Route untuk menangani submit form pemesanan (POST)
    Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');

    // Route untuk menampilkan halaman invoice setelah pembayaran
    Route::get('/after-payment', [OrderController::class, 'afterPayment'])->name('after.payment');
});

// Route untuk menangani notifikasi pembayaran dari Midtrans (webhook)
Route::post('/payment-notification', [OrderController::class, 'handlePaymentNotification']);

// Route untuk tambah jadwal
Route::middleware('auth')->group(function () {
    Route::get('/jadwal/create', [JadwalController::class, 'create'])->name('jadwal.create');
    Route::post('/jadwal/store', [JadwalController::class, 'store'])->name('jadwal.store');
});
