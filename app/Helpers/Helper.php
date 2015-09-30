<?php
/**
 * Created by PhpStorm.
 * User: gwdev1
 * Date: 10/1/15
 * Time: 3:29 AM
 */

class Helper {

    static function arrayToObject(array $data = [], $obj) {
        foreach ($data as $key => $value) {
            $obj->$key = $value;
        }

        return $obj;
    }
}