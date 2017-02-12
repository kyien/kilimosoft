<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuyersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buyers', function (Blueprint $table) {
          $table->increments('id');
          $table->string('firstname');
          $table->string('lastname');
          $table->string('phone_no')->unique();
          $table->string('email')->unique();
          $table->string('location');
          $table->text('cropsofinterest')->nullable();
          $table->string('avatar');
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
        Schema::dropIfExists('buyers');
    }
}
