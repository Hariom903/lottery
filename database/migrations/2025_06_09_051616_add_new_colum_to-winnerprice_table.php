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
        //
         Schema::table('Winner_prices', function (Blueprint $table) {
            // Add new column for the winner's price
            $table->string('status')->default('pending')->after('prize_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
           Schema::table('Winner_prices', function (Blueprint $table) {
            //
        });
    }
};
