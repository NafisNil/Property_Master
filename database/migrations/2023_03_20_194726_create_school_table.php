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
        Schema::create('school', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name', 200);
            $table->string('school_code', 50)->nullable();
            $table->string('email', 50)->nullable();
            $table->string('phone', 50)->nullable();
            $table->string('website', 150)->nullable();
            $table->integer('address')->nullable();
            $table->text('welcome')->nullable();
            $table->text('about')->nullable();
            $table->text('services')->nullable();
            $table->string('board_of_director', 100)->nullable();
            $table->string('departments', 100)->nullable();
            $table->text('rules')->nullable();
            $table->text('policies')->nullable();
            $table->text('procedures')->nullable();
            $table->text('code_of_coduct')->nullable();
            $table->text('rights_and_responsibilities')->nullable();
            $table->integer('other_information')->nullable()->default(1);
            $table->integer('reg_step')->default(1);
            $table->integer('status')->default(1);
            $table->integer('created_by')->default(1);
            $table->integer('updated_by')->default(1);
            $table->timestamp('created_at')->useCurrent();
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
        Schema::dropIfExists('school');
    }
};
