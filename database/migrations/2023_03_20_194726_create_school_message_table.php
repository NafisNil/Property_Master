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
        Schema::create('school_message', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('school_id')->nullable();
            $table->string('message_no')->nullable();
            $table->timestamp('message_date')->nullable();
            $table->integer('account_type')->nullable();
            $table->integer('from_user_id')->nullable();
            $table->integer('to_user_id')->nullable();
            $table->integer('cc_user_id')->nullable();
            $table->string('priority_levels')->nullable();
            $table->string('subject_course')->nullable();
            $table->string('re')->nullable();
            $table->text('message')->nullable();
            $table->tinyInteger('status')->nullable()->default(0);
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
        Schema::dropIfExists('school_message');
    }
};
