<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParkingLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parking_logs', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date');
            $table->string('stall_no');
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->string('make');
            $table->string('model');
            $table->string('color');
            $table->string('plate_no');
            $table->string('driver_name');
            $table->string('phone');
            $table->string('email');
            $table->string('purpose_of_visit');
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
        Schema::dropIfExists('parking_logs');
    }
}
