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
        Schema::create('student_details', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('school_id')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->integer('mother_id')->nullable();
            $table->integer('father_id')->nullable();
            $table->integer('guardian_id')->nullable();
            $table->string('student_id_no')->nullable();
            $table->string('address', 200)->nullable();
            $table->integer('program_id')->nullable();
            $table->string('phone_office')->nullable();
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
            $table->tinyInteger('status')->default(1);
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->string('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_details');
    }
};
