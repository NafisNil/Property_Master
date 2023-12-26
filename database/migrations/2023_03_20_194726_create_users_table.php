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
//        Schema::create('users', function (Blueprint $table) {
//            $table->bigIncrements('id');
//            $table->string('user_name')->nullable();
//            $table->string('nick_name')->nullable();
//            $table->string('designation')->nullable();
//            $table->string('email')->unique();
//            $table->string('mobile_phone', 50)->nullable();
//            $table->string('office_phone', 50)->nullable();
//            $table->string('fax', 50)->nullable();
//            $table->string('password');
//            $table->integer('school')->default(0);
//            $table->integer('address')->nullable();
//            $table->integer('user_type')->default(99);
//            $table->string('picture', 100)->nullable();
//            $table->tinyInteger('status')->default(1);
//            $table->string('active', 1)->default('Y');
//            $table->string('create_by')->nullable()->default('1');
//            $table->string('update_by')->nullable()->default('1');
//            $table->timestamp('created_at')->nullable()->useCurrent();
//            $table->timestamp('updated_at')->nullable()->useCurrent();
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
