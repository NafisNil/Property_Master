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
        Schema::create('assigned_task', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('school_id');
            $table->string('task_no')->nullable();
            $table->timestamp('task_date')->nullable();
            $table->integer('account_type')->nullable();
            $table->integer('from_user_id')->nullable();
            $table->integer('to_user_id')->nullable();
            $table->integer('cc_user_id')->nullable();
            $table->string('priority_levels')->nullable();
            $table->string('subject', 250)->nullable();
            $table->text('message')->nullable();
            $table->string('instruction', 150)->nullable();
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('assigned_task');
    }
};
