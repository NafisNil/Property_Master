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
        Schema::create('subject_course', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('school_id')->nullable();
            $table->string('crn_no', 100)->nullable();
            $table->string('crn_name')->nullable();
            $table->string('crn_code')->nullable();
            $table->text('crn_description')->nullable();
            $table->tinyInteger('student_type')->nullable()->comment('1=Domestic, 2=International');
            $table->tinyInteger('study_option')->nullable()->comment('1=Full Time, 2=Part Time ');
            $table->string('delivery_methods')->nullable();
            $table->integer('offred_by_school_educational_dep')->nullable();
            $table->integer('participation_in_following_programs')->nullable();
            $table->text('requirements')->nullable();
            $table->string('number_of_credits')->nullable();
            $table->string('pass_mark')->nullable();
            $table->string('maximum_times_to_take')->nullable();
            $table->integer('subject_course_text_books')->nullable();
            $table->tinyInteger('status')->nullable()->default(0);
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
        Schema::dropIfExists('subject_course');
    }
};
