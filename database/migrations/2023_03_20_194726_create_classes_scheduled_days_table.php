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
        Schema::create('classes_scheduled_days', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('class_schedule_no')->nullable();
            $table->string('class_schedule_topic', 256)->nullable();
            $table->date('class_schedule_date')->nullable();
            $table->string('class_schedule_day')->nullable();
            $table->time('class_schedule_time_from')->nullable();
            $table->time('class_schedule_time_to')->nullable();
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
        Schema::dropIfExists('classes_scheduled_days');
    }
};
