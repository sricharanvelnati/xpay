<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveCardinfoFromUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
          $table->dropColumn('docType');
          $table->dropColumn('proofNumber');
          $table->dropColumn('bioPage');
          $table->dropColumn('signPage');
          $table->dropColumn('agree');
          $table->dropColumn('signature');
          $table->dropColumn('deleted_at');
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
          $table->enum('docType',['passport','licence','nationalId']);
          $table->string('proofNumber');
          $table->string('bioPage');
          $table->string('signPage');
          $table->enum('agree',['true','false']);
          $table->string('signature');
          $table->softDeletes();
        });
    }
}
