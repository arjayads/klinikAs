<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('User', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->tinyInteger('isActive')->default(true);
            $table->rememberToken();
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
        Schema::drop('User');
    }
}
