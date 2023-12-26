<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogKeyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_key', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('school_id');
            $table->dateTime('date');
            $table->string('name');
            $table->string('key_no');
            $table->dateTime('time_in');
            $table->dateTime('returned_time');
            $table->string('purpose');
            $table->string('stuff_name');
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
        Schema::dropIfExists('log_key');
    }
}
