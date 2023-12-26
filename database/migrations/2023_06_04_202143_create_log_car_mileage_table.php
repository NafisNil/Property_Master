<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogCarMileageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_car_mileage', function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('school_id');
            $table->dateTime('date');
            $table->string('vehicle_id');
            $table->string('driver_name');
            $table->string('start_location');
            $table->string('end_location');
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->decimal('start_mileage', 15);
            $table->decimal('end_mileage', 15);
            $table->string('purpose');
            $table->string('note');
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
        Schema::drop('log_car_mileage');
    }
}
