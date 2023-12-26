<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogVisitorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_visitor', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('school_id');
            $table->dateTime('date');
            $table->string('visitor_name');
            $table->string('purpose');
            $table->string('meeting_with')->nullable();
            $table->string('department');
            $table->dateTime('time_in');
            $table->dateTime('time_out');
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
        Schema::dropIfExists('log_visitior');
    }
}
