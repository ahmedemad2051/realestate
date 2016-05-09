<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bu_name');
            $table->string('bu_rooms');
            $table->double('bu_price');
            $table->integer('bu_rent');
            $table->string('bu_square');
            $table->string('bu_place');
            $table->integer('bu_type');
            $table->string('bu_small_dis');
            $table->string('bu_meta');
            $table->string('bu_longitude');
            $table->string('bu_latitude');
            $table->text('bu_large_dis');
            $table->integer('bu_status');
            $table->string('bu_image');
            $table->string('bu_month');
            $table->integer('user_id')->unsigned();
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bus');
    }
}
