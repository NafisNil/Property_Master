<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('newfiles', function (Blueprint $table) {
            $table->id();
            $table->string('company')->nullable();
            $table->string('file_no')->nullable();
            $table->string('fiscal_year')->nullable();
            $table->string('last_modification')->nullable();
            $table->text('last_user')->nullable();
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
        Schema::dropIfExists('newfiles');
    }
}
