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
        Schema::create('closing_in_education_team', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('closing_position')->nullable();
            $table->integer('closing_user_id')->nullable();
            $table->string('closing_email')->nullable();
            $table->text('closing_message')->nullable();
            $table->timestamp('closing_date')->nullable();
            $table->text('closing_reason')->nullable();
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
        Schema::dropIfExists('closing_in_education_team');
    }
};
