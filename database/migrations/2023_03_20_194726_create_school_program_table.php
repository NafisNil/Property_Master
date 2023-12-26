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
        Schema::create('school_program', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('school_id');
            $table->string('program_code')->nullable();
            $table->string('program_name')->nullable();
            $table->text('program_description')->nullable();
            $table->integer('school_level')->nullable();
            $table->tinyInteger('students')->nullable()->default(1);
            $table->integer('credential')->nullable();
            $table->tinyInteger('study_choice')->nullable()->default(1);
            $table->string('delivery_method')->nullable();
            $table->string('entrance_requirements')->nullable();
            $table->string('term')->nullable();
            $table->string('semester')->nullable();
            $table->string('program_length')->nullable();
            $table->integer('subjects_courses_in_school_program')->nullable();
            $table->integer('financial_in_school_program')->nullable();
            $table->integer('my_payment_in_school_program')->nullable();
            $table->integer('dates_and_deadlines_in_school_program')->nullable();
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
        Schema::dropIfExists('school_program');
    }
};
