<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseOutlinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_outlines', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('school_id');
            $table->unsignedBigInteger('semester_id')->nullable();
            $table->unsignedBigInteger('academic_year_id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('course_id');
            $table->string('course_format');
            $table->string('requirements');
            $table->string('delivery_method');
            $table->string('learning_outcomes');
            $table->string('learning_objectives');
            $table->string('pass_mark');
            $table->string('is_credit_transferable');
            $table->boolean('is_credit_accreditable');
            $table->longText('registration_note')->nullable();
            $table->longText('important_information')->nullable();
            $table->boolean('report_progress');
            $table->string('duration');
            $table->longText('policy')->nullable();
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
        Schema::dropIfExists('course_outlines');
    }
}
