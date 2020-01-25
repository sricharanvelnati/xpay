<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('contactNumber');
            $table->integer('countryCode');
            $table->string('countryName');
            $table->string('password');
            $table->tinyInteger('google2fa_enable')->default(0);
            $table->string('google2fa_secret')->nullable();
            $table->text('google2fa_qr')->nullable();
            $table->enum('docType',['passport','licence','nationalId'])->nullable();
            $table->string('proofNumber')->nullable();
            $table->string('bioPage')->nullable();
            $table->string('signPage')->nullable();
            $table->enum('agree',['true','false'])->nullable();
            $table->string('signature')->nullable();
            $table->string('cardNumber')->nullable();
            $table->enum('cardStatus',['unpaid','paid','pending','assigned','verified','blocked'])->default('unpaid');
            $table->enum('status',['pending','active','deactive'])->default('active');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
