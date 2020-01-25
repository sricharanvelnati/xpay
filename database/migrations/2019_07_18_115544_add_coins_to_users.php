<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCoinsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('balance_usd')->nullable();
            $table->string('balance_btc')->nullable();
            $table->string('balance_eth')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
          $table->string('balance_usd')->nullable();
          $table->string('balance_btc')->nullable();
          $table->string('balance_eth')->nullable();
        });
    }
}
