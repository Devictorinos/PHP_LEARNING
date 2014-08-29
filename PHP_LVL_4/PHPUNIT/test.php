<?php


class Tests
{
    private $_name;

    public function  __construct($name)
    {
        $this->_name = $name;
    }

    public function showName()
    {
        if ( is_string($this->_name)) {
            echo $this->_name;
        } else {
            echo "Not a string";
        }
    }

}
