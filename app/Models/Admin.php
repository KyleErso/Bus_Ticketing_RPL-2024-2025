<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'tb_admin'; // Nama tabel
    protected $primaryKey = 'id_admin'; // Primary key
    public $incrementing = true; // Auto-increment
    protected $keyType = 'int'; // Tipe data primary key

    protected $fillable = [
        'nama_admin',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}