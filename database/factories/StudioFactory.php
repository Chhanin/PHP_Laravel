<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StudioFactory extends Factory
{
    public function definition(): array
    {
        return [
            'idStudio' => $this->faker->unique()->numberBetween(1, 10000),
            'company_name' => substr($this->faker->company(), 0, 40),
            'city' => substr($this->faker->city(), 0, 20),
            'founded' => $this->faker->year(),
            'company_type' => substr($this->faker->jobTitle(), 0, 40),
        ];
    }
}