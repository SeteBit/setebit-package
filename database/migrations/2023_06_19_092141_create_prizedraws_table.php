<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('prizedraws', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('external_prizedraw_id')->index();
            $table->unsignedBigInteger('tenant_id');
            $table->enum('situation', ['todos', 'pendente', 'vencedor', 'perdedor', 'cancelado']);
            $table->decimal('max_value', 10, 4);
            $table->decimal('min_value', 10, 4);
            $table->text('description')->nullable();
            $table->dateTime('draw_at');
            $table->string('award_name');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prizedraws');
    }
};
