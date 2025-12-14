<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Agent;

class AgentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

       
        $ganjil = [1, 3, 5, 7, 9, 11];
        $genap = [2, 4, 6, 8, 10, 12];

        for ($c = 0; $c < 6; $c++) {
            Agent::create([
                'id' => $ganjil[$c],
                'name' => $faker->name('female'),
                'description' => $faker->text(),
                'release_date' => now(),
                'image' => 'female' . $c+1 . '.jpg'
            ]);
        }

        for ($c = 0; $c < 6; $c++) {
            Agent::create([
                'id' => $genap[$c],
                'name' => $faker->name('male'),
                'description' => $faker->text(),
                'release_date' => now(),
                'image' => 'male' . $c+1 . '.jpg'
            ]);
        }

    }
}
