<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSomeColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('middle_name')->nullable();

            $table->unsignedBigInteger('address_id')->nullable();
            $table->unsignedBigInteger('contact_id')->nullable();
            $table->string('education')->nullable();
            $table->unsignedBigInteger('corporation_id')->nullable();
            $table->unsignedBigInteger('insurance_id')->nullable();
            $table->boolean('allow_login')->default(true);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
