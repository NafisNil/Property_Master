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
        Schema::create('subjects_courses_in_school_program', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('course_no')->nullable();
            $table->integer('course_code')->nullable();
            $table->integer('course_name')->nullable();
            $table->integer('credits')->nullable();
            $table->tinyInteger('tuition')->nullable();
            $table->integer('textbooks')->nullable();
            $table->string('other_fees')->nullable();
            $table->string('total')->nullable();
            $table->text('comment')->nullable();
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
        Schema::dropIfExists('subjects_courses_in_school_program');
    }
};
