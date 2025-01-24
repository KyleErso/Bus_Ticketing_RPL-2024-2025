<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supir extends Model
{
    use HasFactory;

    protected $table = 'tb_supir'; // Nama tabel
    protected $primaryKey = 'id_supir'; // Primary key
    public $incrementing = true; // Auto-increment
    protected $keyType = 'int'; // Tipe data primary key

    protected $fillable = [
        'nama_supir',
        'no_telepon_supir',
    ];
}