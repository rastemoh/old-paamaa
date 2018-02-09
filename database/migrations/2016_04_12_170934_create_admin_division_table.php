<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminDivisionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administrative_division', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->integer('level_id')->nullable()->default(null);
            $table->integer('parent_id')->nullable()->default(null);
            $table->double('lat')->nullable()->default(null);
            $table->double('lng')->nullable()->default(null);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('administrative_division');
    }
}
