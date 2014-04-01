<?php
    
namespace my;

class MyClass
{
    const HANDS = 2;

    public function method()
    {
        echo __METHOD__ . "<br>";
    }

    public function line()
    {
        echo __LINE__ . "<br>";
    }

    public function clas()
    {
        echo __CLASS__ . "<br>";
    }

    public function showConst()
    {
        echo self::HANDS;
    }
}


$test = new MyClass();

$test->method();
$test->line();
$test->clas();
$test->showConst();

