<?php

namespace Database\Seeders;

use App\Models\Bis;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 20; $i++) {
            Bis::create([
                'id_supir' => $faker->numberBetween(1, 20), // Foreign key ke tabel tb_supir
                'merk' => $faker->word, // Merk bis
                'plat_nomor' => $faker->bothify('?? #### ??'), // Plat nomor bis
                'kapasitas' => $faker->numberBetween(20, 50), // Kapasitas bis
            ]);
        }
    }
}