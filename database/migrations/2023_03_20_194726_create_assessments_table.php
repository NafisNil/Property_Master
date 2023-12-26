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
        Schema::create('assessments', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->unsignedBigInteger('assessment_type_id')->default(0);
            $table->unsignedBigInteger('created_by')->default(0);
            $table->string('instruction', 50)->nullable();
            $table->float('mark', 10, 0);
            $table->dateTime('posted_date')->nullable();
            $table->dateTime('submission_due_date')->nullable();
            $table->bigInteger('class_id')->nullable();
            $table->timestamps();
            $table->string('semester_id', 50)->nullable();
            $table->string('term_id', 50)->nullable();
            $table->string('education_year_id', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assessments');
    }
};
