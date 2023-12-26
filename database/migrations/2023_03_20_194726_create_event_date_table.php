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
        Schema::create('event_date', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('school_id')->nullable();
            $table->string('event_id')->nullable();
            $table->timestamp('from_date_time')->nullable();
            $table->timestamp('to_date_time')->nullable();
            $table->string('title')->nullable();
            $table->string('post_in_edudip')->nullable();
            $table->string('post_in_admdip')->nullable();
            $table->string('post_in_accounthold')->nullable();
            $table->text('comments')->nullable();
            $table->text('required_action')->nullable();
            $table->timestamp('first_reminder_date_time')->nullable();
            $table->timestamp('second_reminder_date_time')->nullable();
            $table->timestamp('third_reminder_date_time')->nullable();
            $table->timestamp('fourth_reminder_date_time')->nullable();
            $table->string('reminder_method')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->integer('recurrence_pattern')->nullable();
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
        Schema::dropIfExists('event_date');
    }
};
