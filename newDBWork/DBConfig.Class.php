<?php

namespace newDBWork;

use Exception;
use PDO;

final class DBConfig
{


    private $_host;
    private $_dbName;
    private $_user = "root";
    private $_password = "123";
    private $_connectionType;
    private $_drivers = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);


    public static function __callStatic($name, $args)
    {
        if (preg_match("/C/", $name, $matches)) {
       
            

            switch ($args[0]) {
                case 'w':

                    return self::$args[0]();
                    break;
                case 'r':
                    return self::$args[0]();
                    break;
                case 's':
                    return self::$args[0]();
                    break;
                case 'u':
                    return self::$args[0]();
                    break;
                default:
                    throw new Exception("Error: Wrong Connection Type", 1);
                    break;
            }
        }

    }

    public static function r()
    {
        return self::connect();
    }

    public static function w()
    {
        return self::connect();
    }

    public static function s()
    {
         return self::connect();
    }

    public static function u()
    {
        
        return self::connect();
    }

    private static function connect($host = "localhost")
    {
            return new PDO("mysql:host=localhost");
        
    }
}
