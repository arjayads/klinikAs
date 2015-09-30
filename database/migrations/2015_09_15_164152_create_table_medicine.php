<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMedicine extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Medicine', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->string('genericName');
            $table->string('commercialName');
            $table->string('brand');
            $table->string('unitMeasure');
            $table->text('defaultInstructions')->nullable();
            $table->timestamp('createdAt')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updatedAt')->default(DB::raw('CURRENT_TIMESTAMP' . MyMigrationHelper::getTimestampUpdateSetting()));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::drop('Medicine');
    }
}
