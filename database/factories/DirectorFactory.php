<?php

namespace Database\Factories;

use App\Models\Director;
use Illuminate\Database\Eloquent\Factories\Factory;

class DirectorFactory extends Factory
{
 
    protected $model = Director::class;

    public function definition(): array
    {
        return [
            'idDirector' => $this->faker->unique()->numberBetween(1, 10000),
            'name_director' => substr($this->faker->name(), 0, 40),
            'gender_director' => $this->faker->randomElement(['Male', 'Female']),
            'place_birth_director' => substr($this->faker->city(), 0, 20),
            'country_director' => substr($this->faker->country(), 0, 20),
            'year_birth_director' => $this->faker->year(),
        ];
    }
}