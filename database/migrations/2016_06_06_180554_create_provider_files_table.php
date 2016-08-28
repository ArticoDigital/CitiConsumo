<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProviderFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provider_files', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');

            $table->integer('provider_id')->unsigned();
            $table->integer('file_type_id')->unsigned();
            $table->foreign('provider_id')->references('id')->on('providers');
            $table->foreign('file_type_id')->references('id')->on('file_types');

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
        Schema::drop('provider_files');
    }
}
