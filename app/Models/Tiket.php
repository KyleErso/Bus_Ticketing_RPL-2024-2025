<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    use HasFactory;

    protected $table = 'tb_tiket'; // Nama tabel
    protected $primaryKey = 'id_tiket'; // Single primary key
    public $incrementing = true; // Auto-increment primary key

    protected $fillable = [
        'id_tiket', // Primary key
        'id', // Foreign key ke users
        'id_jadwal', // Foreign key ke tb_jadwal
        'id_order', // Foreign key ke tb_orders
        'nama_penumpang', // Nama penumpang
    ];

    // Relasi ke tabel users
    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'id');
    }

    // Relasi ke tabel tb_jadwal
    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'id_jadwal', 'id_jadwal');
    }

    // Relasi ke tabel tb_orders
    public function order()
    {
        return $this->belongsTo(Order::class, 'id_order', 'id_order');
    }
}