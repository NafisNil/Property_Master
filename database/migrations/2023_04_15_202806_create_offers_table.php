<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('school_id');
            $table->unsignedBigInteger('campus_id');
            $table->unsignedBigInteger('project_id')->nullable();
            $table->dateTime('date');
            $table->dateTime('issue_date');
            $table->dateTime('expiry_date');
            $table->string('type');
            $table->string('status');
            $table->unsignedBigInteger('created_by');
            $table->decimal('amount', 15, 2);
            $table->longText('description')->nullable();
            $table->text('comment')->nullable();
            $table->string('item_type')->nullable();
            $table->unsignedBigInteger('account_holder_id')->nullable();
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
        Schema::dropIfExists('offers');
    }
}
