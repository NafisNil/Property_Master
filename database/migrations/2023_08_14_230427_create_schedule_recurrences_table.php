<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScheduleRecurrencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule_recurrences', function (Blueprint $table) {
            $table->id();
            $table->string('pattern');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->string('comment')->nullable();
            $table->unsignedBigInteger('schedule_id');
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
        Schema::dropIfExists('schedule_recurrences');
    }
}
