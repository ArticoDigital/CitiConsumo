<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuyServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buy_service', function(Blueprint $table){
            $table->increments('id');
            $table->integer('service_id')->unsigned();
            $table->integer('buy_id')->unsigned();

            $table->foreign('service_id')->references('id')->on('services');
            $table->foreign('buy_id')->references('id')->on('buys');
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
        Schema::drop('buy_service');
    }
}
