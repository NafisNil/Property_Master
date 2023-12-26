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
        Schema::create('programs', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('school_id')->nullable();
            $table->string('code')->nullable();
            $table->string('name')->nullable();
            $table->integer('school_level')->nullable();
            $table->integer('credential')->nullable();
            $table->integer('study_option')->nullable();
            $table->integer('department')->nullable();
            $table->integer('delivery_method')->nullable();
            $table->string('duration_weeks')->nullable();
            $table->string('subjects_courses')->nullable();
            $table->decimal('special_needs', 10)->default(0);
            $table->decimal('handicap', 10)->default(0);
            $table->decimal('domestic', 10)->default(0);
            $table->decimal('international', 10)->default(0);
            $table->string('available')->nullable();
            $table->string('requirements')->nullable();
            $table->string('contact')->nullable();
            $table->string('apply')->nullable();
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
        Schema::dropIfExists('programs');
    }
};
