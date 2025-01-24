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
        Schema::create('tb_supir', function (Blueprint $table) {
            $table->string('id_supir', 10)->primary(); // Primary key dengan tipe varchar(10)
            $table->string('nama_supir', 50); // Nama supir dengan tipe varchar(50)
            $table->string('no_telepon_supir', 15); // Nomor telepon supir dengan tipe varchar(15)
            $table->timestamps(); // Created at dan Updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_supir');
    }
};
