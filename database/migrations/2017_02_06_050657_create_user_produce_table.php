<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProduceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produce_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
              $table->integer('produce_id')->unsigned();

              $table->foreign('user_id')
              ->references('id')
              ->on('users')
              ->onDelete('cascade');


                            $table->foreign('produce_id')
                            ->references('id')
                            ->on('produces')
                            ->onDelete('cascade');



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
        Schema::dropIfExists('produce_user');
    }
}
