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
        Schema::create('tb_admin', function (Blueprint $table) {
            $table->id('id_admin'); // Primary key dengan auto-increment
            $table->string('nama_admin', 100); // Nama admin
            $table->string('email')->unique(); // Email admin
            $table->string('password'); // Password admin
            $table->rememberToken(); // Untuk fitur "remember me"
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_admin');
    }
};