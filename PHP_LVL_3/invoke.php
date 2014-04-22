<?php

namespace PHP_LVL_3;

class User
{
    private $_name = "Viktor";
    private $_lname = "Lubchuk";

    public function __invoke($name)
    {
        return $name;
    }
}

$name = new User();

echo $name("viktor");
