<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Loadcard extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('loadcard',function(Blueprint $table){

          $table->increments('id');
          $table->integer('userId');
          $table->string('amount');
          $table->string('partnerFee');
          $table->string('cardLoadFee');
          $table->string('finalAmount');
          $table->enum('paymentType',['erc20','xif']);
          $table->enum('status',['pending','confirm','cancelByUser','cancelByAdmin','loaded'])->default('pending');
          $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loadcard');
    }
}
