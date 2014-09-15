<?php

class Select extends Query
{

    protected $_dbh;
    private $_sql;
    private $_params = array();
    private $_where  = array();
    private $_fiedls = array();
    private $_type;

    public function __construct($dbh, $sql)
    {
        $this->_dbh = $dbh;
        $this->_sql = $sql;
    }


    public function prepareSQL()
    {

        preg_match_all('/[0-9]{1,}|\'.+?\'|NULL/i', $this->_sql, $matches);

        $this->_fiedls = $matches;

        $this->_sql = preg_replace_callback('/[0-9]{1,}|\'.+?\'|NULL|true|false/i', function () {
            
            return "?";

        }, $this->_sql);

    }

    private function runSQL()
    {

        try {

            $query = $this->_dbh->prepare($this->_sql);

            foreach ($this->_fiedls as $key => $field) {
            
                $this->_type = is_null($fied)    ? PDO::PARAM_NULL : PDO::PARAM_STR;
                $this->_type = is_bool($fied)    ? PDO::PARAM_BOOL : PDO::PARAM_STR;
                $this->_type = is_integer($fied) ? PDO::PARAM_INT  : PDO::PARAM_STR;

                $query->bindParam($key+1, $val, $type);

            }

            $query->execute();

            return $query;
            
        } catch (Exception $e) {

            echo $e->getMessage();
            
        }

    }

    public function fetchAll($debug = false)
    {
        return $this->runSQL()->fetchAll(PDO::FETCH_ASSOC);
    }

    public function fetchOne($debug = false)
    {
        return $this->runSQL()->fetch(PDO::FETCH_ASSOC);
    }

    public function fetchOBJ()
    {
        return $this->runSQL()->fetch(PDO::OBJ);
    }

    public function fetchOnyResult()
    {
        return $this->runSQL();
    }

    public function fetchWithConst($const)
    {
        return $this->runSQL()->fetch($const);
    }
}

