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
        Schema::create('safety_securities', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('safety_item')->nullable();
            $table->integer('school_id')->nullable();
            $table->string('quantity', 100)->nullable();
            $table->string('serial_number')->nullable();
            $table->timestamp('expiry_date')->nullable();
            $table->timestamp('renew_date')->nullable();
            $table->timestamp('inspection_cycle')->nullable();
            $table->timestamp('inspection_due_on')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamp('created_at')->nullable();
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
        Schema::dropIfExists('safety_securities');
    }
};
