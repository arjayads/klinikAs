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
            $table->string('telephone')->nullable();
            $table->string('mobileNumber')->nullable();
            $table->string('email')->nullable();
            $table->enum('sex', ['Male', 'Female']);
            $table->enum('maritalStatus', ['Married', 'Single']);
            $table->text('address')->nullable();
            $table->text('remark')->nullable();
            $table->timestamp('createdAt')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updatedAt')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
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
