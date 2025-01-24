<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bis extends Model
{
    use HasFactory;

    protected $table = 'tb_bis'; // Nama tabel
    protected $primaryKey = 'id_bis'; // Primary key
    public $incrementing = true; // Auto-increment primary key
    protected $keyType = 'int'; // Tipe data primary key

    protected $fillable = [
        'id_supir',
        'merk',
        'plat_nomor',
        'kapasitas',
    ];

    // Relasi ke tabel tb_supir
    public function supir()
    {
        return $this->belongsTo(Supir::class, 'id_supir', 'id_supir');
    }
}