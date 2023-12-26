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
        Schema::create('staff_directory', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('staff_id', 30)->nullable();
            $table->integer('school_id')->nullable();
            $table->string('name', 100);
            $table->string('nick_name')->nullable();
            $table->string('department')->nullable();
            $table->string('country')->nullable();
            $table->string('educational_level')->nullable();
            $table->string('university_name')->nullable();
            $table->string('years_in_field', 30)->nullable();
            $table->string('phone_office')->nullable();
            $table->string('phone_cell')->nullable();
            $table->string('email')->nullable();
            $table->string('fax', 124)->nullable();
            $table->string('photo')->nullable();
            $table->string('designation', 200)->nullable();
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
        Schema::dropIfExists('staff_directory');
    }
};
