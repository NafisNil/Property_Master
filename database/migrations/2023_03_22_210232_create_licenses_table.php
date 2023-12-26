<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licenses', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('name')->nullable();
            $table->string('license_no')->nullable();
            $table->string('issuer_name');
            $table->string('issuer_country')->nullable();
            $table->string('issuer_state')->nullable();
            $table->string('issuer_city')->nullable();
            $table->date('issue_date')->nullable();
            $table->date('renew_date')->nullable();
            $table->date('expiry_date')->nullable();
            $table->unsignedBigInteger('contact_id')->nullable();
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
        Schema::dropIfExists('licenses');
    }
}
