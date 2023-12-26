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
        Schema::create('information_session', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('school_id')->nullable();
            $table->string('date')->nullable();
            $table->string('information', 200)->nullable();
            $table->integer('departments')->nullable();
            $table->integer('who_should_attend')->nullable();
            $table->string('location', 300)->nullable();
            $table->string('time', 100)->nullable();
            $table->string('booking', 100)->nullable();
            $table->string('add_to_calender', 250)->nullable();
            $table->string('contact')->nullable();
            $table->text('comments')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->string('created_at')->nullable();
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
        Schema::dropIfExists('information_session');
    }
};
