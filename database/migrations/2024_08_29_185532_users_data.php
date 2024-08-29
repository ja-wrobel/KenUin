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
        Schema::create('users_data', function (Blueprint $table){
            $table->foreignId('user_id')->constrained('users', 'id')->onDelete('cascade');
            $table->decimal('total_score', 50, 2);
            $table->integer('nuins_currency');
            $table->integer('subscription')->comment('0 or 1 as Yes or No');
            $table->date('subscription_until');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_data');
    }
};
