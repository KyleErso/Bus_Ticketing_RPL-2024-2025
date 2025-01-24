<?php

namespace Database\Seeders;

use App\Models\Supir;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SupirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 20; $i++) {
            Supir::create([
                'nama_supir' => $faker->name, // Nama supir
                'no_telepon_supir' => $faker->phoneNumber, // Nomor telepon supir
            ]);
        }
    }
}