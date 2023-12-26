<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('school_id');
            $table->dateTime('date');
            $table->string('request_type');
            $table->text('request_description');
            $table->dateTime('request_time');
            $table->text('special_request');
            $table->text('additional_note');
            $table->boolean('payment_required');
            $table->boolean('is_refundable');
            $table->string('status');
            $table->decimal('amount', 15, 2);
            $table->decimal('tax', 10, 2);
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
        Schema::dropIfExists('bookings');
    }
}
