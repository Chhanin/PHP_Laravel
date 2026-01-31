<?php

namespace Database\Factories;

use App\Models\Director;
use App\Models\Studio;
use Illuminate\Database\Eloquent\Factories\Factory;

class MovieFactory extends Factory
{
    public function definition(): array
    {
        return [
            'idMovie' => $this->faker->unique()->numberBetween(1, 10000),
            'Director_idDirector' => Director::inRandomOrder()->first()->idDirector,
            'Studio_idStudio' => Studio::inRandomOrder()->first()->idStudio,
            'name_movie' => substr($this->faker->sentence(3), 0, 40),
            'country_of_release' => substr($this->faker->country(), 0, 20),
            'year_of_release' => $this->faker->year(),
            'language' => substr($this->faker->languageCode(), 0, 15),
            'filming_location' => substr($this->faker->city(), 0, 30),
            'category' => substr($this->faker->word(), 0, 20),
        ];
    }
}