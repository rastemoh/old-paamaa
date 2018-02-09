<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNtaActivityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nta_activity', function (Blueprint $table) {
        	$table->integer('nta_id');
        	$table->integer('activity_id');
        	$table->primary(['nta_id', 'activity_id']);        	
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('nta_activity');
    }
}
