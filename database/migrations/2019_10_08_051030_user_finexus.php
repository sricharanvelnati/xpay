<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserFinexus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_finexus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id');
            $table->string('title');
            $table->string('name');
            $table->string('nric_no')->nullable();
            $table->string('dob');
            $table->string('sex');
            $table->string('nationality');
            $table->longText('residential_address');
            $table->string('country');
            $table->string('postal_code');
            $table->string('state');
            $table->longText('mailing_address');
            $table->string('mailing_country');
            $table->string('mailing_postalcode');
            $table->string('mailing_state');
            $table->string('c_code');
            $table->string('mobile_no');
            $table->string('security_ans');
            $table->string('img_sign');
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
        Schema::dropIfExists('user_finexus');
    }
}
