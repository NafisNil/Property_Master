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
        Schema::create('workshop_safety_and_security_devices', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('safety_item')->nullable();
            $table->integer('campus')->nullable();
            $table->string('qty')->nullable();
            $table->string('serial_no')->nullable();
            $table->timestamp('expiry_date')->nullable();
            $table->timestamp('renew_date')->nullable();
            $table->string('inspection_cycle')->nullable();
            $table->string('inspection_due_on')->nullable();
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
        Schema::dropIfExists('workshop_safety_and_security_devices');
    }
};
