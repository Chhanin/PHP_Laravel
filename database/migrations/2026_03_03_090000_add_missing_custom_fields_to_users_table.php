<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('users')) {
            return;
        }

        Schema::table('users', function (Blueprint $table) {
            if (! Schema::hasColumn('users', 'isAdmin')) {
                $table->boolean('isAdmin')->default(false);
            }

            if (! Schema::hasColumn('users', 'phone')) {
                $table->string('phone')->nullable();
            }

            if (! Schema::hasColumn('users', 'address')) {
                $table->string('address')->nullable();
            }
        });
    }

    public function down(): void
    {
        if (! Schema::hasTable('users')) {
            return;
        }

        Schema::table('users', function (Blueprint $table) {
            $toDrop = [];

            if (Schema::hasColumn('users', 'isAdmin')) {
                $toDrop[] = 'isAdmin';
            }

            if (Schema::hasColumn('users', 'phone')) {
                $toDrop[] = 'phone';
            }

            if (Schema::hasColumn('users', 'address')) {
                $toDrop[] = 'address';
            }

            if ($toDrop !== []) {
                $table->dropColumn($toDrop);
            }
        });
    }
};

