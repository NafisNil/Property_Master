<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogMailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_mail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('school_id');
            $table->dateTime('date');
            $table->string('tracking_no');
            $table->string('sender');
            $table->string('recipient');
            $table->string('employee_name');
            $table->text('description')->nullable();
            $table->dateTime('date_received');
            $table->longText('content')->nullable();
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
        Schema::dropIfExists('log_mail');
    }
}
