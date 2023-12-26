<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidentReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incident_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('school_id');
            $table->dateTime('date');
            $table->string('incident_no');
            $table->string('noticed_by');
            $table->string('name')->nullable();
            $table->unsignedBigInteger('department_id')->nullable();
            $table->unsignedBigInteger('report_to')->nullable();
            $table->string('title');
            $table->string('incident_location');
            $table->dateTime('incident_time');
            $table->text('cause')->nullable();
            $table->text('description')->nullable();
            $table->text('people_involved')->nullable();
            $table->text('immediate_actions_take')->nullable();
            $table->boolean('emergency_called')->default(false);
            $table->string('police_file_no')->nullable();
            $table->string('fire_department_file_no')->nullable();
            $table->string('injured')->nullable();
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
        Schema::dropIfExists('incident_reports');
    }
}
