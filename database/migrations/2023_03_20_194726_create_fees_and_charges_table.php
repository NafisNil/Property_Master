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
        Schema::create('fees_and_charges', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('school_id')->nullable();
            $table->integer('category')->nullable();
            $table->string('name')->nullable();
            $table->decimal('fee_domestic', 10)->default(0);
            $table->decimal('fee_international', 10)->default(0);
            $table->decimal('fee_special_needs', 10)->default(0);
            $table->text('comment')->nullable();
            $table->tinyInteger('refundable')->default(0)->comment('0=no, 1=yes');
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
        Schema::dropIfExists('fees_and_charges');
    }
};
