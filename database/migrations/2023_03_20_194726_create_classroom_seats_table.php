<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classroom_seats', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('seat_no')->nullable();
            $table->integer('occupant')->nullable();
            $table->string('id_no')->nullable();
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->text('photo')->nullable();
            $table->string('ph_no')->nullable();
            $table->string('email')->nullable();
            $table->string('student_type')->nullable();
            $table->string('seat_status')->nullable();
            $table->text('comments')->nullable();
            $table->tinyInteger('status')->nullable()->default(0);
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classroom_seats');
    }
};
