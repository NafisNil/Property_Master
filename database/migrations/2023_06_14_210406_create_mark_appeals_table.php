<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarkAppealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mark_appeals', function (Blueprint $table) {
            $table->id();
            $table->string('file_no');
            $table->dateTime('date');
            $table->unsignedBigInteger('from_student_id');
            $table->unsignedBigInteger('to_teacher_id');
            //any user type
            $table->unsignedBigInteger('cc_id')->nullable();
            $table->unsignedBigInteger('assessment_id');
            $table->dateTime('mark_post_date');
            $table->decimal('received_mark');
            $table->text('comment');
            $table->longText('appeal_reason');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mark_appeals');
    }
}
