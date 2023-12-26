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
        Schema::create('workshop', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('school_id');
            $table->string('workshop_no')->nullable();
            $table->tinyInteger('workshop_type')->nullable()->comment('1=actual, 2=virtual');
            $table->decimal('teacher_instructor_qty', 4, 0)->nullable();
            $table->decimal('teacher_instructor_ssistant_qty', 4, 0)->nullable();
            $table->decimal('typical_student_qty', 4, 0)->nullable();
            $table->decimal('handicapped_students_qty', 4, 0)->nullable();
            $table->decimal('special_needs_students_qty', 4, 0)->nullable();
            $table->string('visitors_qty')->nullable();
            $table->string('guest_qty')->nullable();
            $table->decimal('total_qty', 5, 0)->nullable();
            $table->integer('workshop_campus')->nullable();
            $table->integer('workshop_seats')->nullable();
            $table->integer('workshop_fixed_asset')->nullable();
            $table->integer('workshop_safety_and_security')->nullable();
            $table->integer('workshop_safety_and_insurance_protection')->nullable();
            $table->integer('workshop_for_accounting')->nullable();
            $table->integer('workshop_rules_and_policies')->nullable();
            $table->tinyInteger('status')->default(1)->comment('1=yes, 0=no');
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
        Schema::dropIfExists('workshop');
    }
};
