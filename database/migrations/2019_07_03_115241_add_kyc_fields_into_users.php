<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddKycFieldsIntoUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('users',function(Blueprint $table){
          $table->enum('is_kyc_approved',[0,1])->default(0);
          $table->text('kycres')->nullable();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('users',function(Blueprint $table){
          $table->enum('is_kyc_approved',[0,1])->default(0);
          $table->text('kycres')->nullable();
      });
    }
}
