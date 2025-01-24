<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'tb_jadwal'; // Nama tabel
    protected $primaryKey = 'id_jadwal'; // Primary key
    public $incrementing = true; // Auto-increment primary key
    protected $keyType = 'int'; // Tipe data primary key

    protected $fillable = [
        'asal',
        'tujuan',
        'tanggal_keberangkatan',
        'jam_keberangkatan',
        'jam_sampai',
        'waktu_perjalanan',
        'id_bis',
        'harga_tiket',
        'titik_jemput',
        'titik_turun',
    ];

    // Relasi ke tabel tb_bis
    public function bis()
    {
        return $this->belongsTo(Bis::class, 'id_bis', 'id_bis');
    }
}