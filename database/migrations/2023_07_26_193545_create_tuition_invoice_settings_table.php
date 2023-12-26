<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTuitionInvoiceSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tuition_invoice_settings', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date');
            $table->dateTime('due_date');
            $table->boolean('has_late_fee')->default(false);
            $table->decimal('late_fee', 15, 2);
            $table->boolean('has_cumulative_late_fee')->default(false);
            $table->integer('interval')->nullable();
            $table->decimal('cumulative_late_fee')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tuition_invoice_settings');
    }
}
