<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRemaindersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('remainders', function (Blueprint $table) {
            $table->id();
           
            $table->string('issued_by');
            $table->string('subject');
            $table->text('details');
            $table->string('priority');
       //     $table-?string
            $table->text('location');
            $table->string('time');
            $table->string('action');
            $table->string('due_date');
            $table->string('receivers');
            $table->string('status')->default(0);
            $table->string('post')->default(0);
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
        Schema::dropIfExists('remainders');
    }
}
