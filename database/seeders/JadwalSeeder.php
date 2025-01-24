<?php

namespace Database\Seeders;

use App\Models\Jadwal;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 100; $i++) {
            Jadwal::create([
                'asal' => $faker->city, // Kota asal
                'tujuan' => $faker->city, // Kota tujuan
                'tanggal_keberangkatan' => $faker->dateTimeBetween('now', '+1 month')->format('Y-m-d'), // Tanggal keberangkatan
                'jam_keberangkatan' => $faker->time('H:i:s'), // Jam keberangkatan
                'jam_sampai' => $faker->time('H:i:s'), // Jam sampai
                'waktu_perjalanan' => $faker->numberBetween(60, 480), // Waktu perjalanan dalam menit
                'id_bis' => $faker->numberBetween(1, 20), // Foreign key ke tabel tb_bis
                'harga_tiket' => $faker->numberBetween(100000, 500000), // Harga tiket
                'titik_jemput' => $faker->address, // Titik jemput
                'titik_turun' => $faker->address, // Titik turun
            ]);
        }
    }
}