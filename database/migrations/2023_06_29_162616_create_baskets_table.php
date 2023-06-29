<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('baskets', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->text('session_id')->nullable();
            $table->json('goods')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('baskets');
    }
};
