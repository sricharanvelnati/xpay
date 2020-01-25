<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Payment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('payment',function(Blueprint $table){

          $table->increments('id');
          $table->integer('userId');
          $table->enum('paymentType',['alipay','wechat','erc20','xif','free']);
          $table->float('amount');
          $table->string('account');
          $table->enum('status',['pending','confirm','cancelByUser','cancelByAdmin'])->default('pending');
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
        Schema::dropIfExists('payment');
    }
}
