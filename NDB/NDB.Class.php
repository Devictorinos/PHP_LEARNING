<?php

class NDB
{
    private static $_dbh;
    private static $_user;
    private static $_pass;
    private static $_options;
    private static $_host;


    public static function setConnectionOptios($con)
    {
        switch ($con) {
            case 'R':
                self::$_host = "localhost";
                self::$_user = "root";
                self::$_pass = "123";
                self::$_options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
               
                break;
            case 'W':
                self::$_host = "localhost";
                self::$_user = "root";
                self::$_pass = "123";
                self::$_options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
               
                break;
            default:
                # code...
                break;
        }
    }




    public static function R()
    {
        self::setConnectionOptios("R");
        self::$_dbh = new PDO("mysql:host=" . self::$_host . ";dbname=northwind", self::$_user, self::$_pass, self::$_options);

        return new self;
    }



    public static function W()
    {
        self::setConnectionOptios("W");
        self::$_dbh = new PDO("mysql:host=" . self::$_host . ";dbname=northwind", self::$_user, self::$_pass, self::$_options);

        return new self;
    }



    public function select($sql)
    {
        return new Select(self::$_dbh,  $sql);
    }


    public function update($fields)
    {

        return new Update(self::$_dbh, $fields);
    }

    public function insert($fields)
    {
        return new Insert(self::$_dbh, $fields);
    }
}