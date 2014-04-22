<?php

namespace animate;

include 'file1.php';

use foo;

class Animal
{
    
    public static function say()
    {
        return  \foo\Cat::say();
    }
}
