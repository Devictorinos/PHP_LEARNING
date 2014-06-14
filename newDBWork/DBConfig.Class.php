<?php


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
        //TODO CONNECTION TYPY
        return self::connect();
    }

    public static function w()
    {   //TODO CONNECTION TYPE
        return self::connect();
    }

    public static function s()
    {
        //TODO CONNECTION TYPE
        return self::connect();
    }

    public static function u()
    {
        //TODO CONNECTION TYPE
        return self::connect();
    }

    private static function connect($host = "localhost")
    {
        try {

            return new PDO("mysql:host=localhost", "root", "123");

        } catch (PDOException $e) {
            
            echo $e->getMessage();
        }
     
    }
}
