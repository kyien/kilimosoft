<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupProduce extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_produce', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('produce_id')->unsigned();
            $table->integer('group_id')->unsigned();

            $table->foreign('produce_id')
            ->references('id')
            ->on('produces')
            ->onDelete('cascade');

            $table->foreign('group_id')
            ->references('id')
            ->on('groups')
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
        Schema::dropIfExists('group_produce');
    }
}
