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
        Schema::create('classroom', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('school_id');
            $table->string('classroom_no', 100);
            $table->tinyInteger('classroom_category')->nullable()->comment('1=Actual 2=Virtual ');
            $table->integer('classroom_type')->nullable();
            $table->integer('teacher_instructor_qty')->default(0);
            $table->integer('teacher_instructor_ssistant_qty')->default(0);
            $table->integer('typical_student_qty')->default(0);
            $table->integer('handicapped_students_qty')->default(0);
            $table->integer('special_needs_students_qty')->default(0);
            $table->string('visitors_qty')->nullable();
            $table->string('guest_qty')->nullable();
            $table->integer('total_qty')->default(0);
            $table->integer('campus')->nullable();
            $table->integer('classroom_seats')->nullable();
            $table->integer('classroom_fixed_assets')->nullable();
            $table->integer('classroom_safety_and_security_devices')->nullable();
            $table->integer('classroom_for_accounting')->nullable();
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
        Schema::dropIfExists('classroom');
    }
};
