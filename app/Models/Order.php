<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'tb_orders'; // Nama tabel
    protected $primaryKey = 'id_order'; // Primary key
    public $incrementing = true; // Auto-increment primary key
    protected $keyType = 'int'; // Tipe data primary key

    protected $fillable = [
        'id_jadwal',
        'id',
        'nama_pemesan',
        'jumlah_tiket',
        'status',
        'total_harga',
    ];

    // Relasi ke tabel tb_jadwal
    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'id_jadwal', 'id_jadwal');
    }

    // Relasi ke tabel users
    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'id');
    }
}