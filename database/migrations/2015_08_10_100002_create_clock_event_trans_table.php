<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClockEventTransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clock_event_trans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('clock_event_id')->unsigned();
            $table->integer('clock_out_reason_id')->unsigned();
            $table->timestamps();
            
            $table->foreign('clock_event_id')->references('id')->on('clock_event');
            $table->foreign('clock_out_reason_id')->references('id')->on('clock_out_reasons');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('clock_event_trans');
    }
}
