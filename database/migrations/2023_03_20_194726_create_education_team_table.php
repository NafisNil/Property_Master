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
        Schema::create('education_team', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('school_id');
            $table->string('team_no')->nullable();
            $table->timestamp('creation_date')->nullable();
            $table->timestamp('closing_date')->nullable();
            $table->string('net_operating_days')->nullable();
            $table->string('current_status')->nullable();
            $table->integer('team_group')->nullable();
            $table->string('goal')->nullable();
            $table->integer('team_type')->nullable();
            $table->integer('team_learder_user_id')->nullable();
            $table->string('education_level')->nullable();
            $table->text('about_me')->nullable();
            $table->string('team_leader_email')->nullable();
            $table->string('team_leader_phone')->nullable();
            $table->string('team_leader_positions')->nullable();
            $table->string('rule_no')->nullable();
            $table->text('rule_description')->nullable();
            $table->string('restrictions_no')->nullable();
            $table->text('restrictions_description')->nullable();
            $table->integer('manage_participants_in_education_team')->nullable();
            $table->integer('participants_availability_and_contacts_in_education_team')->nullable();
            $table->integer('task_assigner_in_education_team')->nullable();
            $table->integer('closing_in_education_team')->nullable();
            $table->integer('reopening_in_education_team')->nullable();
            $table->integer('status')->nullable()->default(0);
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->string('created_at')->nullable();
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
        Schema::dropIfExists('education_team');
    }
};
