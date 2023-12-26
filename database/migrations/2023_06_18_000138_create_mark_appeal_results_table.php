<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarkAppealResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mark_appeal_results', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mark_appeal_id');
            $table->dateTime('date');
            $table->unsignedBigInteger('from_user');
            $table->unsignedBigInteger('to_user');
            $table->unsignedBigInteger('cc');
            $table->dateTime('reassessed_date');
            $table->decimal('reassessed_mark');
            $table->text('comment');
            $table->longText('description')->nullable();
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
        Schema::dropIfExists('mark_appeal_results');
    }
}
