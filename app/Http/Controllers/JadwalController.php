<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VwJadwal;

class JadwalController extends Controller
{
    /**
     * Menampilkan formulir pemesanan berdasarkan ID jadwal.
     *
     * @param  int  $jadwal_id
     * @return \Illuminate\View\View
     */
    public function order($jadwal_id)
    {
        // Cari jadwal berdasarkan ID
        $jadwal = VwJadwal::findOrFail($jadwal_id);

        // Return view untuk formulir order dengan data jadwal
        return view('order.order', compact('jadwal'));
    }

    /**
     * Mencari jadwal menggunakan database view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function search(Request $request)
    {
        // Ambil data input dari form
        $asal = $request->input('asal');
        $tujuan = $request->input('tujuan');
        $tanggal = $request->input('tanggal');

        // Query menggunakan model VwJadwal
        $query = VwJadwal::query();

        if ($asal) {
            $query->where('asal', $asal);
        }

        if ($tujuan) {
            $query->where('tujuan', $tujuan);
        }

        if ($tanggal) {
            $query->whereDate('tanggal_keberangkatan', $tanggal);
        }

        // Ambil hasil pencarian
        $jadwals = $query->get();

        // Cek apakah hasil pencarian kosong
        $noResults = $jadwals->isEmpty();

        // Kirim data ke view
        return view('jadwal.jadwal', compact('jadwals', 'noResults', 'asal', 'tujuan', 'tanggal'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'asal' => 'required|string|max:255',
            'tujuan' => 'required|string|max:255',
            'tanggal_keberangkatan' => 'required|date',
            'jam_keberangkatan' => 'required',
            'jam_sampai' => 'required',
            'waktu_perjalanan' => 'required|numeric|min:0',
            'id_bis' => 'required|integer|exists:tb_bis,id_bis',
            'harga_tiket' => 'required|numeric|min:0',
            'titik_jemput' => 'required|string|max:255',
            'titik_turun' => 'required|string|max:255',
        ]);

        // Simpan data jadwal ke database
        Jadwal::create($validated);

        // Redirect ke halaman yang diinginkan dengan pesan sukses
        return redirect()->route('jadwal.create')->with('success', 'Jadwal berhasil ditambahkan!');
    }
}