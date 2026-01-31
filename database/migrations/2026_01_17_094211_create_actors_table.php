<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('actors', function (Blueprint $table) {
            $table->integer('idActor')->primary();
            $table->string('name_actor', 40);
            $table->string('education', 15);
            $table->string('Gender_actor', 6);
            $table->string('nationality', 20);
            $table->integer('year_of_birth');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('actors');
    }
};