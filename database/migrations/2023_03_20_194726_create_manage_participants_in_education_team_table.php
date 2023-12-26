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
        Schema::create('manage_participants_in_education_team', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('members')->nullable();
            $table->integer('manage_user_id')->nullable();
            $table->timestamp('invitation_date')->nullable();
            $table->text('invitation_message')->nullable();
            $table->string('invitation_action')->nullable();
            $table->string('manage_status')->nullable();
            $table->tinyInteger('status')->nullable()->default(0);
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
        Schema::dropIfExists('manage_participants_in_education_team');
    }
};
