<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimeOffTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('time_off',
                function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('timeOffStart');
            $table->dateTime('timeOffEnd');
            $table->integer('employee_id')->unsigned();
            $table->integer('time_off_status_id')->unsigned();
            $table->timestamps();

            $table->foreign('time_off_status_id')->references('id')->on('time_off_status');
            $table->foreign('employee_id')->references('id')->on('employee');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('time_off');
    }

}
