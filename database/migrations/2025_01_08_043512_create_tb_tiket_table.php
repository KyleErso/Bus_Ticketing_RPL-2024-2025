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
        Schema::create('tb_tiket', function (Blueprint $table) {
            // Primary Key
            $table->id('id_tiket'); // Primary key dengan nama id_tiket

            // Foreign Key ke tabel users
            $table->unsignedBigInteger('id'); // Foreign key ke tabel users
            $table->foreign('id')->references('id')->on('users')->onDelete('cascade');

            // Foreign Key ke tabel tb_jadwal
            $table->unsignedBigInteger('id_jadwal'); // Foreign key ke tabel tb_jadwal
            $table->foreign('id_jadwal')->references('id_jadwal')->on('tb_jadwal')->onDelete('cascade');

            // Foreign Key ke tabel tb_orders
            $table->unsignedBigInteger('id_order'); // Foreign key ke tabel tb_orders
            $table->foreign('id_order')->references('id_order')->on('tb_orders')->onDelete('cascade');

            // Kolom tambahan
            $table->string('nama_penumpang', 100); // Nama penumpang dengan tipe varchar(100)
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_tiket'); // Menghapus tabel tb_tiket jika migrasi di-rollback
    }
};