<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('user_has_roles', function (Blueprint $table) {
//            $table->unsignedBigInteger('role_id');
//            $table->string('model_type');
//            $table->string('id');
//
//            $table->primary(['role_id', 'id', 'model_type']);
//            $table->index(['id', 'model_type'], 'model_has_roles_model_id_model_type_index');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_has_roles');
    }
};
