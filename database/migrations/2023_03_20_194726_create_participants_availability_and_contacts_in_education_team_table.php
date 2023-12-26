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
        Schema::create('participants_availability_and_contacts_in_education_team', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('participants_position')->nullable();
            $table->integer('participants_user_id')->nullable();
            $table->timestamp('availability_date_day')->nullable();
            $table->string('participants_phone')->nullable();
            $table->string('participants_email')->nullable();
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
        Schema::dropIfExists('participants_availability_and_contacts_in_education_team');
    }
};
