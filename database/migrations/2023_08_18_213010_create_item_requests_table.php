<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('school_id');
            $table->string('string_no');
            $table->dateTime('date');
            $table->unsignedBigInteger('department_id');
            $table->string('section');
            $table->string('position');
            $table->unsignedBigInteger('user_id');
            $table->string('type');
            $table->string('priority_level');
            $table->text('description')->nullable();
            $table->string('status');
            $table->string('comment');

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
        Schema::dropIfExists('item_requests');
    }
}
