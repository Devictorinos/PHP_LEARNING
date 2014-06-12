<?php

abstract class MyClass {

    const NAME = "Victor";
    public $a = 1;
    protected $_b = array('4', 65, 65);
    public static $c = 0;
    private $_guru = "null";

    public function sayGuru($guru, $word = "")
    {
        $c ++;
        return "<h1>" . $word . " " . $guru . "</h1>";
    }
}

echo "<pre>";
Reflection::export(new ReflectionClass('MyClass'));
