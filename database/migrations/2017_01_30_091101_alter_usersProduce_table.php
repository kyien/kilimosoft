<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersProduceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('usersProduce', function (Blueprint $table) {
            //
            $table->integer('group_id')->unsigned();


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
        Schema::table('usersProduce', function (Blueprint $table) {
            //
            $table->dropcolumn('group_id');
        });
    }
}
