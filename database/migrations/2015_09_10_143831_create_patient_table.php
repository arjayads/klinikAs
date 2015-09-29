<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Patient', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->string('firstName');
            $table->string('middleName')->nullable();
            $table->string('lastName');
            $table->date('birthDate');
            $table->text('address');
            $table->string('occupation')->nullable();
            $table->enum('sex', ['Male', 'Female']);
            $table->integer('FK_raceId')->nullable();
            $table->string('fatherName')->nullable();
            $table->string('fatherOccupation')->nullable();
            $table->string('motherName')->nullable();
            $table->string('motherOccupation')->nullable();
            $table->string('contactNumber')->nullable();
            $table->integer('FK_clinicId')->nullable();
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
        Schema::drop('Patient');
    }
}
