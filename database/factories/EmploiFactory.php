<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
use App\Models\Emploi;

class EmploiFactory extends Factory
{
    protected $model = Emploi::class;

    public function definition()
    {
        $faker = \Faker\Factory::create();

        return [
            'nom' => $faker->jobTitle,
            'titre' => $faker->sentence,
            'description' => $faker->paragraph,
            'competences' => json_encode([$faker->word, $faker->word, $faker->word]),
            'type_contrat' => $faker->randomElement(['a distance', 'hybride', 'a temps plein']),
            'emplacement' => $faker->city,
            'archive' => $faker->boolean,
            'user_id' => function () {
                return \App\Models\User::factory()->create()->id;
            },
        ];
    }
}
