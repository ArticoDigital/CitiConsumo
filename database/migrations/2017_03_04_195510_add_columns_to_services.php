<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToServices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::table('services', function (Blueprint $table) {
            //
            $table->string('service_addition');
            $table->string('address_more_info');

            

            $table->date('date_start');
            $table->date('date_end');
            $table->string('days');
            $table->string('hour1');
            $table->string('hour2');
            $table->boolean('inmediate_response');
            $table->boolean('terms_conditions');

            

            $table->integer('experience_type_id')->unsigned();
            $table->foreign('experience_type_id')->references('id')->on('experience_types');
            
            $table->integer('rate_type_id')->unsigned();
            $table->foreign('rate_type_id')->references('id')->on('rate_types');
            $table->integer('response_type_id')->unsigned();
            $table->foreign('response_type_id')->references('id')->on('response_types');

            $table->integer('service_type_id')->unsigned();
            $table->foreign('service_type_id')->references('id')->on('service_types');

            
        });
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
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
            $table->dropColumn('service_addition');
            $table->dropColumn('address_more_info');

            $table->dropColumn('rate_type_id');
            $table->dropColumn('experience_type_id');
            $table->dropColumn('date_start');
            $table->dropColumn('date_end');
            $table->dropColumn('days');
            $table->dropColumn('hour1');
            $table->dropColumn('hour2');
            $table->dropColumn('inmediate_response');

            $table->dropColumn('response_type_id');
            

            $table->dropColumn('service_type_id');
            

            $table->dropColumn('terms_conditions');
        });
    }
}
