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
        Schema::create('Winner_prices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lottery_id')->constrained('lotteries')->onDelete('cascade');
            $table->integer('winner_position'); // 1 = first, 2 = second, etc.
            $table->string('prize_name')->nullable();
           // if lottery is a lottery with a winner
            $table->decimal('prize_amount', 10, 2)->nullable(); // if cash prize
            $table->timestamps();

            $table->unique(['lottery_id', 'winner_position']); // Only one 1st, 2nd, etc. per lottery
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Winner_prices');
    }
};
