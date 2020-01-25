<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ContactUs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('contact_us',function(Blueprint $table){
        $table->increments('id');
        $table->string('name');
        $table->string('phoneNumber')->nullable();
        $table->string('countryCode')->nullable();
        $table->string('countryName')->nullable();
        $table->string('email');
        $table->longText('message');
        $table->string('imagefile')->nullable();
        $table->string('response')->nullable();
        $table->string('response_imagefile')->nullable();
        $table->enum('status',['pending','replied'])->default('pending');
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
        Schema::dropIfExists('contact_us');
    }
}
