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
    private $_params       = array();
    private $_updateParams = array();
    private $_insertParams = array();
    private $_rowsCount;
    private $_type;
    private $_query;
    private $_debug;
    private $_where;


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
            
            if (count($params) === 3) {

                $this->where($group, $params[0], $params[1], $params[2]);
                
            } else {
                $this->where($group, $params[0], $params[1], "=");

            }
           
            return $this;
        }

        if (preg_match('/^whereBetween(\d$)/', $method, $matches)) {

            $group = (int)$matches[1];
            $this->whereBetween($group, $params[0], $params[1], $params[2]);
                      
            return $this;
        }


        if (preg_match('/^whereIn(\d$)/', $method, $matches)) {

            $group = (int)$matches[1];
            $this->whereIn($group, $params[0], $params[1]);
                      
            return $this;
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

            $this->runSQL($this->_params);

        }
       
    }

    private function runSQL($fields)
    {
        try {

            $this->_query = $this->_dbh->prepare($this->_sql);
                

            foreach ($fields as $key => &$field) {
                 
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


    /***************************************************/
    /**************************************************/
    /**************** FETCH METHODS ******************/


    /* ********** FETCH FOR WHILE LOOP *********** */
    /*=============================================*/
    public function fetch()
    {
        if ($this->_debug === false) {
    
            $this->_query->setFetchMode(PDO::FETCH_ASSOC);
            return $this->_query->fetch();
            
              

        }
    }

    public function oFetch()
    {
        if ($this->_debug === false) {

            $this->_query->setFetchMode(PDO::FETCH_OBJ);
            return  $this->_query->fetch();

        }
         
    }

    public function fetchClass($className)
    {
        if ($this->_debug === false) {

            $this->_query->setFetchMode(PDO::FETCH_CLASS, $className);
            return  $this->_query->fetch();

        }
         
    }

    public function fetchClassAfterConstr($className)
    {
        if ($this->_debug === false) {

            $this->_query->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $className);
            return  $this->_query->fetch();

        }
    }

    public function fetchIntoClass($newClassCall)
    {
        if ($this->_debug === false) {

            $this->_query->setFetchMode(PDO::FETCH_INTO, $newClassCall);
            return  $this->_query->fetch();

        }

    }


    /* ******* FETCH ALL WITHOUT WHILE LOOP ******* */
    /*==============================================*/
    public function fetchAll()
    {
        if ($this->_debug === false) {

            $this->_query->setFetchMode(PDO::FETCH_ASSOC);
            return  $this->_query->fetchAll();

        }
         
    }


    public function oFetchAll()
    {
        if ($this->_debug === false) {

            $this->_query->setFetchMode(PDO::FETCH_OBJ);
            return  $this->_query->fetchAll();

        }
      
    }


    public function fetchClassAll($className)
    {
        if ($this->_debug === false) {

            $this->_query->setFetchMode(PDO::FETCH_CLASS, $className);
            return  $this->_query->fetchAll();

        }
        
    }
                   
    public function fetchClassAllAfterConstr($className)
    {
        if ($this->_debug === false) {

            $this->_query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROP_LATE, $className);
            return  $this->_query->fetchAll();

        }
        
    }

    public function fetchAllIntoClass($newClassCall)
    {
        if ($this->_debug === false) {

            $this->_query->setFetchMode(PDO::FETCH_INTO, $newClassCall);
            return  $this->_query->fetchAll();
        }
        
    }

    /*****************************************************/
    /* *************** UPDATE METHOD ***************** */

    public function update($table, array $sql)
    {
        
        $this->_fields = array_keys($sql);
        $params        = array_values($sql);

        $this->_fields = array_map(function (&$key) {

            return '`' . $key . '`' . ' = ?';

        }, $this->_fields);

       
        $this->_updateParams = array_map(function (&$param) {

                return $param;

        }, $params);

        $this->_sql = "UPDATE " . $table . " SET " . implode(", ", $this->_fields);
    
        return $this;
    }

    /*****************************************************/
     /* *************** WHERE METHODS ***************** */
    public function where($group, $field, $value, $separator)
    {
            
        array_push($this->_updateParams, $value);
           
        $this->_where[$group][] = '`' . $field . '` ' . $separator . ' ?';
        // echo "<pre>" . print_r($this->_where, true) . "</pre>";
        return $this;
        
    }

    public function whereBetween($group, $field, $value, $value2)
    {
         
        array_push($this->_updateParams, $value, $value2);
           
        $this->_where[$group][] = '(`' . $field . '` BETWEEN ? AND ?)';
             
        return $this;
        
    }


    public function whereIn($group, $field, array $values)
    {
        $inVals = array_map(function ($key) {

            return "?";

        }, $values);

        array_walk($values, function ($item) {

            array_push($this->_updateParams, $item);
        });
          
        $this->_where[$group][] = '`' . $field . '` IN (' . implode(", ", $inVals) . ')';
             
        return $this;
        
    }

     /**************************************************************/
     /* *************** EXECUTING UPDATE METHOD ***************** */
    public function exec($debug = false)
    {
        

        $where   = '';
        $counter = 0;
        $whereSQL = array();


        array_walk($this->_where, function ($item, $key) use (&$whereSQL) {
            
            $whereSQL = array_merge($whereSQL, $item);

        });


        if (is_array($whereSQL)) {

            foreach ($whereSQL as $key => $value) {

                $counter ++;

                if ($counter !== count($whereSQL)) {
                  
                    $where .= $value . " AND ";
                } else {

                     $where .= $value;
                }
            }
        }
        
        $this->_sql = $this->_sql . " WHERE ". $where;

        if ($debug === true) {

            Debug::log($this->_sql, $this->_updateParams);

            unset($this->_where);
            unset($this->_updateParams);
            

        } else {

            if ($this->runSQL($this->_updateParams)) {

                unset($this->_where);
                unset($this->_updateParams);

                return $this->_query->rowCount();

            } else {

                return false;
            }

            
        }
        
    }


    /*****************************************************/
    /* *************** INSERT METHOD ***************** */
    public function insert($table, array $sql, $debug = false)
    {
        $this->_debug        = $debug;
        $fields              = array_keys($sql);
        $values              = array_values($sql);
        $this->_insertParams = array_values($sql);

        $fields = array_map(function ($key) {
            return "`" . $key . "`";
        }, $fields);


        $values = array_map(function ($key) {
            return "?";
        }, $values);
       


        $this->_sql = " INSERT INTO " . $table . " (" . implode(', ', $fields) . ") VALUES (" . implode(', ', $values) . ")";


        if ($this->_debug === true) {

            Debug::log($this->_sql, $this->_insertParams);
            // unset($this->_insertParams);

        } else {

            $this->runSQL($this->_insertParams);
            // unset($this->_insertParams);
            return $this->_query->rowCount();

            
        }

        
    }

    /***********************************************************/
    /* *************** LAST INSERT ID METHOD ***************** */
    public function getLastInsertId()
    {
        if ($this->_debug === false) {
            return (int)$this->_dbh->lastInsertId();
        } else {
            throw new Exception("Error Processing Request! Disable DEBUG first");
            
        }
    }


    /*****************************************************/
    /* *************** DELETE METHOD ***************** */
    public function delete()
    {
        
    }




    public static function heb2txt($str)
    {
        $match   = array(chr(171), chr(187), chr(182), chr(92), chr(47));
        $replace = array(chr(34), chr(34), chr(39), '', '');

           return str_replace($match, $replace, $str);
    }
}
