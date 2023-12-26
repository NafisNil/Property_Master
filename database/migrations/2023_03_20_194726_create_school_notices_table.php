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
        Schema::create('school_notices', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('school_id');
            $table->integer('notice_type')->nullable();
            $table->string('notice_no')->nullable();
            $table->timestamp('notice_date_time')->nullable();
            $table->string('priority_levels')->nullable();
            $table->integer('account_type')->nullable();
            $table->integer('from_user_id')->nullable();
            $table->integer('to_user_id')->nullable();
            $table->integer('cc_user_id')->nullable();
            $table->string('subject', 250)->nullable();
            $table->string('re_case_no')->nullable();
            $table->text('message')->nullable();
            $table->string('calender_url', 250)->nullable();
            $table->timestamp('calendar_date')->nullable();
            $table->string('calendar')->nullable();
            $table->string('required_action')->nullable();
            $table->text('comments')->nullable();
            $table->string('prepare_by')->nullable();
            $table->string('approve_by')->nullable();
            $table->timestamp('publish_date')->nullable();
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
        Schema::dropIfExists('school_notices');
    }
};
