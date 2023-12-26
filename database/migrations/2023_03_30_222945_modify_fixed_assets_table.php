<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyFixedAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fixed_assets', function(Blueprint $table){
            $table->unsignedBigInteger('school_id')->after('name');
            $table->unsignedBigInteger('asset_type_id')
                ->nullable()->after('name');
            $table->unsignedBigInteger('asset_sub_type_id')
                ->nullable()->after('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
