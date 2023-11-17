<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('ticket_prizedraws', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('ticket_id');
            $table->unsignedBigInteger('prizedraw_id');
            $table->string('code');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ticket_prizedraws');
    }
};