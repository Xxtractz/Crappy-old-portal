<?php
namespace Core;

class Input{
    public static function sanitize($dirty){
        return htmlentities($dirty, ENT_QUOTES, "UTF-8");
    }

    public static function get($input=false) {
        if(!$input){
            // return entire request array and sanitize it
            $data = [];
            foreach($_REQUEST as $field => $value){
                $data[$field] = self::sanitize($value);
            }
            return $data;
        }
        return self::sanitize($_REQUEST[$input]);
    }
}