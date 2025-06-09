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
        Schema::table('Winner_prices', function (Blueprint $table) {
            // Add new column for the winner's price
            $table->integer('winner_id')->nullable()->after('prize_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('Winner_prices', function (Blueprint $table) {
            //
        });
    }
};
