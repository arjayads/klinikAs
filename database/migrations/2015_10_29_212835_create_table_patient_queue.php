<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePatientQueue extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PatientQueue', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->unsignedInteger('FK_patientId');
            $table->timestamp('createdAt')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('PatientQueue');
    }
}
