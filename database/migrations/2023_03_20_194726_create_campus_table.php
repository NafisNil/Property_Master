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
        Schema::create('campus', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('school_id')->nullable();
            $table->string('name')->nullable();
            $table->string('campus_code')->nullable();
            $table->string('address', 200)->nullable();
            $table->string('phone_office')->nullable();
            $table->string('email')->nullable();
            $table->string('fax')->nullable();
            $table->string('cost_center')->nullable();
            $table->string('income_center')->nullable();
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
        Schema::dropIfExists('campus');
    }
};
