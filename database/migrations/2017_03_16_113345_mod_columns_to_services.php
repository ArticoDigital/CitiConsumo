<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModColumnsToServices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('services', function (Blueprint $table) {
            //
            $table->dropForeign('services_rate_type_id_foreign');
            $table->dropColumn('rate_type_id');
            $table->string('rate_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('services', function (Blueprint $table) {
            //
            $table->integer('rate_type_id')->unsigned();
            $table->foreign('rate_type_id')->references('id')->on('rate_types');
            $table->dropColumn('rate_type');
        });
    }
}
