<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VwJadwal extends Model
{
    use HasFactory;

    // Nama view di database
    protected $table = 'vw_jadwal';

    // Non-aktifkan timestamps karena view tidak memiliki kolom created_at dan updated_at
    public $timestamps = false;
}