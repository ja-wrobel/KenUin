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
        Schema::create('game_top_scores', function (Blueprint $table){
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('game_id')->constrained()->onDelete('cascade');
            $table->decimal('score', 50, 2);
            $table->integer('time')->comment('In ms');
            $table->integer('tries');
            $table->date('score_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('game_top_scores');
    }
};