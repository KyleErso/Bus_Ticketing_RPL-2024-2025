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
        Schema::create('tb_bis', function (Blueprint $table) {
            $table->id('id_bis'); // Primary key dengan tipe integer (auto-increment)
            $table->string('id_supir', 10); // Foreign key dengan tipe varchar(10)
            $table->string('merk', 50); // Merk armada dengan tipe varchar(50)
            $table->string('plat_nomor', 20); // Plat nomor dengan tipe varchar(20)
            $table->integer('kapasitas'); // Kapasitas penumpang dengan tipe integer

            // Foreign key constraint untuk id_supir
            $table->foreign('id_supir')->references('id_supir')->on('tb_supir')->onDelete('cascade');

            $table->timestamps(); // Created at dan Updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_bis');
    }
};