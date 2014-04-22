<?php

namespace PHP_LVL_3;

class User
{
    private $_name = "Viktor";
    private $_lname = "Lubchuk";

    public function __tostring()
    {
        return "hello " . $this->_name . " " . $this->_lname;
    }
}

$name = new User();

echo $name;
