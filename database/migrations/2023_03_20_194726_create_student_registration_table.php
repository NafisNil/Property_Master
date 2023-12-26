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
        Schema::create('student_registration', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('school_id')->nullable();
            $table->string('student_id_no')->nullable();
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('gender')->nullable();
            $table->string('address', 200)->nullable();
            $table->string('phone_office')->nullable();
            $table->string('email')->nullable();
            $table->string('fax')->nullable();
            $table->tinyInteger('students_category')->nullable();
            $table->string('academic_year')->nullable();
            $table->integer('term')->nullable();
            $table->timestamp('term_start')->nullable();
            $table->timestamp('term_end')->nullable();
            $table->string('term_duration')->nullable();
            $table->integer('semester')->nullable();
            $table->timestamp('semester_start')->nullable();
            $table->timestamp('semester_end')->nullable();
            $table->string('semester_duration')->nullable();
            $table->integer('subject_course_in_student_registration')->nullable();
            $table->integer('program_in_student_registration')->nullable();
            $table->integer('financial_in_student_registration')->nullable();
            $table->integer('my_payment_in_student_registration')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->string('created_at')->nullable();
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
        Schema::dropIfExists('student_registration');
    }
};
