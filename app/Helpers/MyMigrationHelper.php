<?php
/**
 * Created by PhpStorm.
 * User: gwdev1
 * Date: 9/29/15
 * Time: 10:38 PM
 */

class MyMigrationHelper {

    static function getTimestampUpdateSetting() {
        return \Illuminate\Support\Facades\DB::connection()->getName() == 'mysql' ? ' ON UPDATE CURRENT_TIMESTAMP' : '';
    }
}