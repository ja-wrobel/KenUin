<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users_game_scores', function (Blueprint $table){
            $table->foreignId('user_id')->constrained('users', 'id')->onDelete('cascade');
            $table->foreignId('game_id')->constrained('games', 'id')->onDelete('cascade');
            $table->decimal('score', 50, 2);
            $table->integer('score_time')->comment('In ms');
            $table->integer('score_tries');
            $table->date('score_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_game_scores');
    }
};
