<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Plan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan',function(Blueprint $table){

            $table->increments('id');
            $table->string('planName');
            $table->float('price');
            $table->integer('year');
            $table->float('eLearning');
            $table->float('rewardPoint');
            $table->float('mangoCoinEarn');
            $table->float('referralFee');
            $table->enum('status',['active','deactive','Expired'])->default('active');
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
        Schema::dropIfExists('plan');
    }
}
