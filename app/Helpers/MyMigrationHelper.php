<?php

class MyMigrationHelper {

    static function getTimestampUpdateSetting() {
        return \Illuminate\Support\Facades\DB::connection()->getName() == 'mysql' ? ' ON UPDATE CURRENT_TIMESTAMP' : '';
    }
}