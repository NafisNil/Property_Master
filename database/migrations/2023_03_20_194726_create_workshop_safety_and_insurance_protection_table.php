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
        Schema::create('workshop_safety_and_insurance_protection', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('insurance_type')->nullable();
            $table->string('staff')->nullable();
            $table->string('students')->nullable();
            $table->string('fixed_assets')->nullable();
            $table->string('property')->nullable();
            $table->string('insurer')->nullable();
            $table->timestamp('expiry_date')->nullable();
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
        Schema::dropIfExists('workshop_safety_and_insurance_protection');
    }
};
