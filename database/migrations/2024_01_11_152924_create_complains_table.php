<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complains', function (Blueprint $table) {
            $table->id();
            $table->string('reported_by');
            $table->string('time');
            $table->string('complain_type');
            $table->text('desc');
            $table->string('happened_before');
            $table->text('people');
            $table->string('receivers');
            $table->string('acknowledge');
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
        Schema::dropIfExists('complains');
    }
}
