<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('group_id')->unsigned();
          $table->integer('produce_id')->unsigned();
          $table->integer('buyer_id')->unsigned();
          $table->float('quantity');
          $table->decimal('amount_per_unit');

          $table->foreign('group_id')
          ->references('id')
          ->on('groups')
          ->onDelete('cascade');

          $table->foreign('produce_id')
          ->references('id')
          ->on('produce')
          ->onDelete('cascade');

          $table->foreign('buyer_id')
          ->references('id')
          ->on('buyers')
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
        Schema::dropIfExists('sales');
    }
}
