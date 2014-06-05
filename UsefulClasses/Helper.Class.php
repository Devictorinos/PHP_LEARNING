<?php

class Helper {

    public static function toInt($str)
    {
        if (is_numeric($str) && !is_array($str)) {
            return (int)$str;
        }

        if (is_array($str)) {

            $str = array_map(function ($key) {

                if (is_numeric($key)) {
                    return (int)$key;
                }

            }, $str);

            return $str;

        }
    }
}
