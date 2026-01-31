<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('studios', function (Blueprint $table) {
            $table->integer('idStudio')->primary(); // PK, not auto-increment in Oracle style
            $table->string('company_name', 40);
            $table->string('city', 20);
            $table->integer('founded');
            $table->string('company_type', 40);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('studios');
    }
};