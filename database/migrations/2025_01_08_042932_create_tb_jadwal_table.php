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
        Schema::create('tb_jadwal', function (Blueprint $table) {
            $table->id('id_jadwal'); // Primary key
            $table->string('asal'); // Kota asal
            $table->string('tujuan'); // Kota tujuan
            $table->date('tanggal_keberangkatan'); // Tanggal keberangkatan
            $table->time('jam_keberangkatan'); // Jam keberangkatan
            $table->time('jam_sampai'); // Jam sampai
            $table->integer('waktu_perjalanan'); // Waktu perjalanan dalam menit
            $table->unsignedBigInteger('id_bis'); // Foreign key ke tabel tb_bis
            $table->decimal('harga_tiket', 10, 2); // Harga tiket dengan format decimal
            $table->string('titik_jemput'); // Titik jemput penumpang
            $table->string('titik_turun'); // Titik turun penumpang
            $table->timestamps(); // Timestamps untuk created_at dan updated_at

            // Foreign key constraint untuk id_bis
            $table->foreign('id_bis')->references('id_bis')->on('tb_bis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_jadwal');
    }
};