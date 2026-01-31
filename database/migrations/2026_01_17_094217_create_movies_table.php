<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->integer('idMovie')->primary();
            $table->integer('Director_idDirector');
            $table->integer('Studio_idStudio');
            $table->string('name_movie', 40);
            $table->string('country_of_release', 20);
            $table->integer('year_of_release');
            $table->string('language', 15);
            $table->string('filming_location', 30);
            $table->string('category', 20);
            $table->timestamps();

            // Foreign Keys
            $table->foreign('Director_idDirector')
                  ->references('idDirector')
                  ->on('directors')
                  ->onDelete('cascade');

            $table->foreign('Studio_idStudio')
                  ->references('idStudio')
                  ->on('studios')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};