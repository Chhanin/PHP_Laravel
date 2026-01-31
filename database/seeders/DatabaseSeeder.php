<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // The order here is critical because of Foreign Key constraints
        $this->call([
            DirectorSeeder::class,
            StudioSeeder::class,
            MovieSeeder::class,
        ]);
    }
}