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
        Schema::create('dates_and_deadlines_in_school_program', function (Blueprint $table) {
            $table->integer('id', true);
            $table->timestamp('information_session')->nullable();
            $table->timestamp('accepting_application')->nullable();
            $table->timestamp('registration')->nullable();
            $table->timestamp('stating_program')->nullable();
            $table->timestamp('ending_program')->nullable();
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
        Schema::dropIfExists('dates_and_deadlines_in_school_program');
    }
};
