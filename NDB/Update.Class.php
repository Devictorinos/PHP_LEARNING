<?php

class Update extends Query
{

    public $fiedls;
    public $where;
    public function __construct($dbh, $fields)
    {
       
        $this->fields = $fields;
       
    }
    

    public function where($where)
    {
        $this->where = $where;
        return $this;
    }

}