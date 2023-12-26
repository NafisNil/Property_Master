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
        Schema::create('school_class', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('school_id');
            $table->string('class_no', 100)->nullable();
            $table->string('class_name')->nullable();
            $table->integer('classroom_no')->nullable();
            $table->integer('classroom_location')->nullable();
            $table->string('class_participants_limitations')->nullable();
            $table->integer('subject_course')->nullable();
            $table->integer('attached_program')->nullable();
            $table->integer('classes_scheduled_days')->nullable();
            $table->integer('assessments_schedule_dates')->nullable();
            $table->integer('class_closed_days')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('school_class');
    }
};
