<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNtaAccessWayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nta_access_way', function (Blueprint $table) {
        	$table->string('description', 255)->nullable()->default(null);
        	$table->integer('nta_id');
        	$table->integer('accessWay_id');
        	$table->primary(['nta_id', 'accessWay_id']);
        	 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('nta_access_way');
    }
}
