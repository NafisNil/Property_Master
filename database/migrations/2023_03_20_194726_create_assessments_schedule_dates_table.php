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
        Schema::create('assessments_schedule_dates', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('assessments_type')->nullable();
            $table->date('assessment_date')->nullable();
            $table->string('assessment_day')->nullable();
            $table->time('assessment_time')->nullable();
            $table->integer('assessment_classroom_no')->nullable();
            $table->integer('assessment_classroom_location')->nullable();
            $table->timestamp('assessment_post_date')->nullable();
            $table->timestamp('assessment_due_on')->nullable();
            $table->timestamp('assessment_mark_date')->nullable();
            $table->string('mark_grade')->nullable();
            $table->string('mark_percentage')->nullable();
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
        Schema::dropIfExists('assessments_schedule_dates');
    }
};
