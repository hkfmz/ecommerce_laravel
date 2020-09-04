<?php

use App\Produit;
use Illuminate\Database\Seeder;

class ProduitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker\Factory::create();

        for ($i=0; $i < 30; $i++) { 
            Produit::create([
                'titre' => $faker->sentence(4),
                'slug' => $faker->slug,
                'sous_titre' => $faker->sentence(5),
                'description' => $faker->text,
                'prix' => $faker->numberBetween(15, 300) * 100,
                'image' => 'https://via.placeholder.com/200x250'
                 
            ]);
        }
    }
}
