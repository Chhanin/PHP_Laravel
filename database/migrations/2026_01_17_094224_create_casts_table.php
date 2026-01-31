<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('casts', function (Blueprint $table) {
            $table->integer('idCasts')->primary();
            $table->integer('Movie_idMovie');
            $table->integer('Actor_idActor');
            $table->string('roletype', 20);
            $table->timestamps();

            // Composite unique key to prevent duplicates
            $table->unique(['Movie_idMovie', 'Actor_idActor']);

            // Foreign Keys
            $table->foreign('Movie_idMovie')
                  ->references('idMovie')
                  ->on('movies')
                  ->onDelete('cascade');

            $table->foreign('Actor_idActor')
                  ->references('idActor')
                  ->on('actors')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('casts');
    }
};