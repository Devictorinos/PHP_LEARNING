<?php

namespace newDBWork;



class NDB
{
    protected $_dbh;
    private static $_singeltoneU = null;
    private static $_singeltoneS = null;
    private static $_singeltoneW = null;
    private static $_singeltoneR = null;

    public function __construct($connection)
    {
        $this->_dbh = DBConfig::C($connection);
       
    }

    public static function con($connection)
    {
        

        switch ($connection) {
            case 'w':

                if (self::$_singeltoneW === null) {
                 
                    self::$_singeltoneW =  new self($connection);
                }

                return self::$_singeltoneW;

                break;
            case 'r':

                if (self::$_singeltoneR === null) {
                    
                    self::$_singeltoneR =  new self($connection);
                }

                return self::$_singeltoneR;

                break;
            case 's':

                if (self::$_singeltoneS === null) {
                   
                    self::$_singeltoneS =  new self($connection);
                }

                return self::$_singeltoneS;

                break;
            case 'u':

                if (self::$_singeltoneU === null) {
                   
                        self::$_singeltoneU =  new self($connection);
                }

                return self::$_singeltoneU;

                break;
            default:
                throw new Exception("Error: Wrong Connection Type", 1);
                break;
        }
            
            
        
    }
}
