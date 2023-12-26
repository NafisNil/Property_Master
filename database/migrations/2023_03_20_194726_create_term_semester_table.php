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
        Schema::create('term_semester', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('school_id');
            $table->integer('term_location')->nullable();
            $table->string('term_code')->nullable();
            $table->timestamp('term_from')->nullable();
            $table->timestamp('term_to')->nullable();
            $table->integer('semester_location')->nullable();
            $table->string('semester_code')->nullable();
            $table->timestamp('semester_from')->nullable();
            $table->timestamp('semester_to')->nullable();
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
        Schema::dropIfExists('term_semester');
    }
};
