<?php
/**
 * Created by PhpStorm.
 * User: victorino
 * Date: 5/28/14
 * Time: 10:49 PM
 */

class Autoloader {

    private static $_dirname;
    public static function dirName($dir)
    {
        self::$_dirname = $dir;

        return  self::$_dirname;

    }

    public static function loa($class)
    {
        include  __DIR__ . DIRECTORY_SEPARATOR . self::$_dirname . DIRECTORY_SEPARATOR .$class. ".php";
    }
    /*public function aut($dir)
    {
        switch ($dir) {
            case "test":



                spl_autoload_register(function ($class) {

                    $class = str_replace("\\", "/", $class);
                    include $class . ".php";
                });
                break;

            case "test2":
                spl_autoload_register(function ($class) {

                    $class = str_replace("\\", "/", $class);
                    include $class . ".php";
                });

                break;

            case "test3":
                spl_autoload_register(function ($class) {

                    $class = str_replace("\\", "/", $class);
                    include $class . ".php";
                });

                break;
        }*/


    //}
}
