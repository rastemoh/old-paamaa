<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNtaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('natural_tourism_attraction', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->nullable()->default(null);
            $table->text('description')->nullable()->default(null);
            $table->string('englishAddress', 255)->nullable()->default(null);
            $table->string('englishName', 255)->nullable()->default(null);
            $table->string('folkAddress', 255)->nullable()->default(null);
            $table->double('xPosition');
            $table->double('yPosition');
            $table->double('zPosition');
            $table->integer('climate_id')->nullable()->default(null);
            $table->integer('division_id')->nullable()->default(null);
            $table->integer('envCat_id')->nullable()->default(null);
            $table->integer('ntaType_id')->nullable()->default(null);
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
        Schema::drop('natural_tourism_attraction');
    }
}