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
        Schema::create('workshop_fixed_assets', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('asset_name')->nullable();
            $table->string('quantity', 100)->nullable();
            $table->string('name')->nullable();
            $table->string('model')->nullable();
            $table->string('color')->nullable();
            $table->string('size', 100)->nullable();
            $table->string('serial_number')->nullable();
            $table->string('asset_condition')->nullable();
            $table->text('comment')->nullable();
            $table->tinyInteger('status')->nullable()->default(0);
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
        Schema::dropIfExists('workshop_fixed_assets');
    }
};
