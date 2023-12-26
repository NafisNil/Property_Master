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
        Schema::create('subject_course_in_student_registration', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('course_no')->nullable();
            $table->integer('course_name')->nullable();
            $table->tinyInteger('sub_cou_availability')->nullable();
            $table->timestamp('sub_cou_start')->nullable();
            $table->timestamp('sub_cou_end')->nullable();
            $table->string('sub_cou_duration')->nullable();
            $table->tinyInteger('study_choice')->nullable();
            $table->string('delivery_method')->nullable();
            $table->string('number_of_classes')->nullable();
            $table->integer('classroom_no')->nullable();
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
        Schema::dropIfExists('subject_course_in_student_registration');
    }
};
