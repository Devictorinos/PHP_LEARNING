<?php


abstract class Query
{
    protected $_dbh;

    public function __construct($dbh)
    {
        $this->_dbh = $dbh;
    }

}
