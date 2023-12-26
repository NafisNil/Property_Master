<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTextbooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('textbooks', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('school_id');
            $table->string('book_code')->nullable();
            $table->string('book_name')->nullable();
            $table->string('author_name')->nullable();
            $table->string('isbn_no')->nullable();
            $table->string('copyright')->nullable();
            $table->string('publisher')->nullable();
            $table->string('edition_no')->nullable();
            $table->unsignedInteger('program')->nullable();
//            $table->foreign('program')->references('id')->on('school_program');
            $table->unsignedInteger('term')->nullable();
//            $table->foreign('term')->references('id')->on('school_program');
            $table->unsignedInteger('semester')->nullable();
//            $table->foreign('semester')->references('id')->on('school_program');
            $table->unsignedInteger('subject_course')->nullable();
//            $table->foreign('subject_course')->references('id')->on('subject_course');
            $table->tinyInteger('status')->default(1)->comment('1=Active, 0=In-active');
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
        Schema::dropIfExists('textbooks');
    }
}
