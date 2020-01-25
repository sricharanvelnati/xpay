<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('cms',function(Blueprint $table){

         $table->increments('id');
         $table->string('email');
         $table->bigInteger('contactNumber');
         $table->text('address');
         $table->string('siteLogo');
         $table->longText('terms');
         $table->longText('privacy');
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
        Schema::dropIfExists('cms');
    }
}
