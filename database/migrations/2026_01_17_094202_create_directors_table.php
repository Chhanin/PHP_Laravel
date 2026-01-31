<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('directors', function (Blueprint $table) {
            $table->integer('idDirector')->primary();
            $table->string('name_director', 40);
            $table->string('gender_director', 6); // e.g., Male/Female
            $table->string('place_birth_director', 20);
            $table->string('country_director', 20);
            $table->integer('year_birth_director');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('directors');
    }
};