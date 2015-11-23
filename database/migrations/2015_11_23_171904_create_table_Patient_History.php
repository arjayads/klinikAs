<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePatientHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PatientHistory', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->unsignedInteger('FK_patientId');
            $table->unsignedInteger('FK_doctorId')->nullable();
            $table->unsignedInteger('FK_diseaseId')->nullable();
            $table->date('checkupDate');
            $table->time('checkupTime');
            $table->text('diagnosis');
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
        Schema::drop('PatientHistory');
    }
}
