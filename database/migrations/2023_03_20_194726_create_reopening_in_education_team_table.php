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
        Schema::create('reopening_in_education_team', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('reopening_position')->nullable();
            $table->integer('reopening_user_id')->nullable();
            $table->string('reopening_email')->nullable();
            $table->text('reopening_message')->nullable();
            $table->timestamp('reopening_date')->nullable();
            $table->text('reopening_reason')->nullable();
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
        Schema::dropIfExists('reopening_in_education_team');
    }
};
