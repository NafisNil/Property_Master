<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScheduleopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scheduleops', function (Blueprint $table) {
            $table->id();
            $table->string('type_id');
            $table->text('description');
            $table->string('amount');
            $table->string('cycle_id');
            $table->string('property_id')->default('1');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('next_one');
            $table->text('instruction');
            $table->string('contact_person');
            $table->string('status')->default('0');
            $table->string('post')->default('0');;
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
        Schema::dropIfExists('scheduleops');
    }
}
