<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInsurancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insurances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('school_id');
            $table->string('name')->nullable();
            $table->string('policy_no');
            $table->string('maximum_coverage');
            $table->string('issuer_name');
            $table->string('issuer_country')->nullable();
            $table->string('issuer_state')->nullable();
            $table->string('issuer_city')->nullable();
            $table->date('issue_date');
            $table->date('renew_date');
            $table->date('expiry_date');
            $table->unsignedBigInteger('address_id')->nullable();
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
        Schema::dropIfExists('insurances');
    }
}
