<?php

class NDB
{

    /* COnnection Config */
    private static $_conR = null;
    private static $_cnnW = null;

    /* DB config*/
    private $_dbh;
    private $_user;
    private $_dbname;
    private $_pass;
    private $_options;
    private $_host;



    /* SQL config */
    private $_sql;
    private $_fields;
    private $_params;
    private $_type;
    private $_query;
    private $_debug;


    public function __construct($dbParams)
    {
        $this->_host    = $dbParams['host'];
        $this->_dbname  = $dbParams['dbname'];
        $this->_user    = $dbParams['user'];
        $this->_pass    = $dbParams['pass'];
        $this->_options = $dbParams['options'];

        try {

            $this->_dbh = new PDO("mysql:host=" . $this->_host . ";dbname=" . $this->_dbname, $this->_user, $this->_pass, $this->_options);

        } catch (PDOException $e) {
            
        }
       
    }

    public static function __callStatic($method, $params)
    {
        if (!empty($params)) {
            throw new Exception("Error Processing Request");
            exit();
        }

        switch ($method) {

            case 'R':

                if (self::$_conR === null) {

                    $dbParams = array ( 'host'    => "localhost",
                                        'user'    => "root",
                                        'pass'    => "123",
                                        'dbname'  => "northwind",
                                        'options' => array(
                                                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                                                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES hebrew",
                                                    PDO::ATTR_TIMEOUT => 1000,
                                                )
                    );
                    self::$_conR =  new self($dbParams);
                }

                return self::$_conR;

                break;

            case 'W':

                if (self::$_conR === null) {

                    $dbParams = array ( 'host'    => "localhost",
                                        'user'    => "root",
                                        'pass'    => "123",
                                        'dbname'  => "northwind",
                                        'options' => array(
                                                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                                                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES hebrew",
                                                    PDO::ATTR_TIMEOUT => 1000,
                                                )
                    );
                    self::$_conR =  new self($dbParams);
                }

                return self::$_conR;

                break;


        }

    }

    public function __call($method, $params)
    {

        if (preg_match('/^where(\d$)/', $method, $matches)) {

            $group = (int)$matches[1];
            $this->Where($group, $params);

        }

    }

    public function select($sql, $debug = false)
    {

        $this->_sql   = $sql;
        $this->_debug = $debug;

        preg_match_all('/[0-9]{1,}|\'.+?\'|true|false/i', $this->_sql, $matches);

        $this->_params = $matches[0];

        $this->_sql    = preg_replace_callback('/[0-9]{1,}|\'.+?\'|true|false/i', function () {
            
            return "?";

        }, $this->_sql);

        if ($this->_debug === true) {

            Debug::log($this->_sql, $this->_params);

        } else {

            try {

                $this->_query = $this->_dbh->prepare($this->_sql);
                

                foreach ($this->_params as $key => &$field) {
                 
                    $this->_type = is_null($field)    ? PDO::PARAM_NULL : PDO::PARAM_STR;
                    $this->_type = is_bool($field)    ? PDO::PARAM_BOOL : PDO::PARAM_STR;
                    $this->_type = is_integer($field) ? PDO::PARAM_INT  : PDO::PARAM_STR;

                    $this->_query->bindParam($key+1, $field, $this->_type);

                }
                
                $this->_query->execute();

                return $this;
                
            } catch (Exception $e) {

                echo $e->getMessage();
                
            }

        }
       
    }


    /***************************************************/
    /**************************************************/
    /**************** FETCH METHODS ******************/


    /* ********** FETCH FOR WHILE LOOP *********** */
    /*=============================================*/
    public function Fetch()
    { 
        if ($this->_debug === false) {
    
            $this->_query->setFetchMode(PDO::FETCH_ASSOC);
            return $this->_query->fetch();
            
              

        }
    }

    public function OFetch()
    {
        if ($this->_debug === false) {

            $this->_query->setFetchMode(PDO::FETCH_OBJ);
            return  $this->_query->fetch();

        }
         
    }

    public function FetchClass($className)
    {
        if ($this->_debug === false) {

            $this->_query->setFetchMode(PDO::FETCH_CLASS, $className);
            return  $this->_query->fetch();

        }
         
    }

    public function FetchClassAfterConstr($className)
    {
        if ($this->_debug === false) {

            $this->_query->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $className);
            return  $this->_query->fetch();

        }
    }

    public function FetchIntoClass($newClassCall)
    {
        if ($this->_debug === false) {

            $this->_query->setFetchMode(PDO::FETCH_INTO, $newClassCall);
            return  $this->_query->fetch();

        }

    }


    /* ******* FETCH ALL WITHOUT WHILE LOOP ******* */
    /*==============================================*/
    public function FetchAll()
    {
        if ($this->_debug === false) {

            $this->_query->setFetchMode(PDO::FETCH_ASSOC);
            return  $this->_query->fetchAll();

        }
         
    }


    public function OFetchAll()
    {
        if ($this->_debug === false) {

            $this->_query->setFetchMode(PDO::FETCH_OBJ);
            return  $this->_query->fetchAll();

        }
      
    }


    public function FetchClassAll($className)
    {
        if ($this->_debug === false) {

            $this->_query->setFetchMode(PDO::FETCH_CLASS, $className);
            return  $this->_query->fetchAll();

        }
        
    }
                   
    public function FetchClassAllAfterConstr($className)
    {
        if ($this->_debug === false) {

            $this->_query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROP_LATE, $className);
            return  $this->_query->fetchAll();

        }
        
    }

    public function FetchAllIntoClass($newClassCall)
    {
        if ($this->_debug === false) {

            $this->_query->setFetchMode(PDO::FETCH_INTO, $newClassCall);
            return  $this->_query->fetchAll();
        }
        
    }

    /*****************************************************/
    /* *************** UPDATE METHOD ***************** */

    public function Update($table, array $sql)
    {

        $this->_fields    = array_keys($sql);
        $this->_params = array_values($sql);

        $this->_fields = array_map(function (&$key) {
            return '`' . $key . '`' . ' = ?';
        }, $this->_fields);

       // echo "<pre>" . print_r($this->_sql, true) . "</pre>";
       // echo "<pre>" . print_r($this->_fields, true) . "</pre>";

        $this->_sql = "UPDATE " . $table . " SET " . implode(", ", $this->_fields);
       // Debug::log($this->_sql, $this->_fields);
        
    }


    /*****************************************************/
    /* *************** INSERT METHOD ***************** */
    public function Insert($table, array $sql)
    {
        
    }

    /***********************************************************/
    /* *************** LAST INSERT ID METHOD ***************** */
    public function GetLastInsertId()
    {
        
    }


    /*****************************************************/
    /* *************** DELETE METHOD ***************** */
    public function Delete()
    {
        
    }


    public function Where($group, $params)
    {
        echo "<pre>" . print_r(func_get_args(), true) . "</pre>";
    }


    public static function heb2txt($str)
    {
        $match   = array(chr(171), chr(187), chr(182), chr(92), chr(47));
        $replace = array(chr(34), chr(34), chr(39), '', '');

           return str_replace($match, $replace, $str);
    }
}
