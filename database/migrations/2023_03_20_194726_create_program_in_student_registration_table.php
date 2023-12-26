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
        Schema::create('program_in_student_registration', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('program_name')->nullable();
            $table->tinyInteger('program_availability')->nullable();
            $table->timestamp('program_start')->nullable();
            $table->timestamp('program_end')->nullable();
            $table->string('program_duration')->nullable();
            $table->string('number_of_courses')->nullable();
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
        Schema::dropIfExists('program_in_student_registration');
    }
};
