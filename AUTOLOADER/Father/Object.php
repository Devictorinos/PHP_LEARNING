<?php

namespace Father;

class Object
{
    private static $setObj = null;
    private $string;
    private $str;

    // public function __construct($string)
    // {

    //     $this->string = $this->ShowString($string);
    //     return $this->string;
    // }

    public function showString()
    {
        $class = get_called_class();
        echo "Method showString was called in {$class} Class <br>";
    }

    /*public function __toString()
    {
        return $this->str;
    }*/
}




// echo $obj->showString("hello");
