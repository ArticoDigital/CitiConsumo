<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToBuysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('buys', function(Blueprint $table){
            $table->dropForeign('buys_state_id_foreign');
            $table->integer('state_id')->unsigned()->default(1)->change();
            $table->string('zp_pay_id');
            $table->string('zp_state');
            $table->string('zp_form_pay');
            $table->string('zp_ticket_id');

            $table->foreign('state_id')->references('id')->on('states');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
