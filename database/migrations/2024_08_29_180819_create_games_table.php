<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('name', 30)->unique();
            $table->enum('type', ['arcade', 'quiz', 'shooter', 'strategy', 'racing', 'pvp', 'fighting', 'casual']);
            $table->text('description');
            $table->enum('difficulty', ['easy', 'medium-easy', 'medium', 'medium-hard', 'hard']);
            $table->string('dir_path', 100)->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
