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
        Schema::create('course_outlines', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('school_id')->nullable();
            $table->string('name')->nullable();
            $table->string('course_code')->nullable();
            $table->integer('program')->nullable();
            $table->string('prerequisites')->nullable();
            $table->string('from_date')->nullable();
            $table->string('to_date')->nullable();
            $table->string('total_class')->nullable();
            $table->string('total_week')->nullable();
            $table->string('total_hour')->nullable();
            $table->string('credits')->nullable();
            $table->string('passing_grade')->nullable();
            $table->decimal('tuition_domestic', 10)->default(0);
            $table->decimal('tuition_international', 10)->default(0);
            $table->decimal('tuition_special_needs', 10)->default(0);
            $table->string('requirements', 300)->nullable();
            $table->string('available')->nullable();
            $table->string('contact')->nullable();
            $table->string('apply')->nullable();
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
        Schema::dropIfExists('course_outlines');
    }
};
