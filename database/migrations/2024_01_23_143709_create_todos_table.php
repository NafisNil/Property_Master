<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todos', function (Blueprint $table) {
            $table->id();
            $table->string('assigned_by');
            $table->text('description');
            $table->text('objectives');
            $table->string('person');
            $table->string('ch_name');
            $table->text('ch_office');
            $table->string('ch_email');
            $table->string('priority')->comment('high, medium, low');
            $table->string('deadline');
            $table->text('location');
            $table->text('instruction');
            $table->string('room_date_one');
            $table->string('room_time_one');
            $table->string('room_date_two')->nullable();
            $table->string('room_time_two')->nullable();
            $table->string('room_date_three')->nullable();
            $table->string('room_time_three')->nullable();
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
        Schema::dropIfExists('todos');
    }
}
