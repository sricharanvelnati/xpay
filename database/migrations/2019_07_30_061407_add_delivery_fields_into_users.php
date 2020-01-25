<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDeliveryFieldsIntoUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('users', function (Blueprint $table) {
          $table->string('address1')->nullable();
          $table->string('address2')->nullable();
          $table->string('city')->nullable();
          $table->string('state')->nullable();
          $table->string('pincode')->nullable();
          $table->string('d_country')->nullable();
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
          $table->string('address1');
          $table->string('address2');
          $table->string('city');
          $table->string('state');
          $table->string('pincode');
          $table->string('d_country');
      });
    }
}
