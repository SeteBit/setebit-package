<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('prizedraws', function (Blueprint $table) {
            $table->integer('quantity_numbers');
        });
    }

    public function down(): void
    {
        Schema::table('prizedraws', function (Blueprint $table) {
            $table->dropColumn('quantity_numbers');
        });
    }
};
