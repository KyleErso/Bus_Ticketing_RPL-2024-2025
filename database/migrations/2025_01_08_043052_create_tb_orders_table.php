<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tb_orders', function (Blueprint $table) {
            $table->id('id_order'); // Primary Key
            $table->foreignId('id_jadwal')->constrained('tb_jadwal', 'id_jadwal')->onDelete('cascade'); // Foreign Key ke tb_jadwal
            $table->foreignId('id')->constrained('users', 'id')->onDelete('cascade'); // Foreign Key ke users (id_users)
            $table->string('nama_pemesan'); // Nama pemesan tiket
            $table->integer('jumlah_tiket'); // Jumlah tiket yang dipesan
            $table->enum('status', ['paid', 'unpaid'])->default('unpaid'); // Status order (paid atau unpaid)
            $table->decimal('total_harga', 10, 2); // Total harga tiket
            $table->timestamps(); // Timestamps untuk created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_orders'); // Sesuaikan dengan nama tabel yang dibuat di method up
    }
};