<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBiddersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bidders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('buyer_id')->unsigned();
            $table->integer('group_id')->unsigned();
            $table->string('produce_name');
            $table->decimal('quantity');
            $table->decimal('buyer_price_per_unit');
            $table->timestamps();



            $table->foreign('buyer_id')
            ->references('id')
            ->on('buyers')
            ->onDelete('cascade');

            $table->foreign('group_id')
            ->references('id')
            ->on('groups')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bidders');
    }
}
