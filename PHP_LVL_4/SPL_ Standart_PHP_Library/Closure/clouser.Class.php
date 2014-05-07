<?php

$str = "hello ";
$closure = function () use (&$str) {
    echo $str;
};

$closure($str);

$str = "vic";

$closure($str);

$func = function ($name) {
    echo "Hello " . $name;
};

echo "<pre>" . print_r($func, true) . "</pre>";

$func("Victor");

/* =========================================== */

$arr = [1, 2, 3, 4, 5];

function foo($v)
{
    return $v * 2;
}

// method one with array map
$newArr = array_map("foo", $arr);

echo "<pre>" . print_r($newArr, true) . "</pre>";


//method two with create function
/*create_function('$v', 'return $v * 2;');
$newArr = array_map("create_function('$v', 'return $v * 2;')", $arr);*/

//method three with closure object
/*$newArr = array_map(function ($v) {

    return $v * 3;

}, $arr);*/


// advenced example

$add = function ($num) {

    return  function ($x) use ($num) {
        return $x + $num;
    };
};

$add_2 = $add(2);
echo $add_2(5);
echo "this <hr />";

$add_3 = $add(3);
echo $add_3(6);
echo "this <hr />";

$add_4 = $add(4);
echo $add_4(7);
echo "this <hr />";

$add_5 = $add(5);
echo $add_5(5);

echo "this <hr />";

class User
{
    private $_name;

    public function __construct($name)
    {
        $this->_name = $name;
    }

    public function sayHello($word)
    {
        return function () use ($word) {
            echo $word . " " . $this->_name;
        };
    }

}

$u = new user("Victor");

echo "<pre>" . print_r($u->sayHello("Hello"), true) . "</pre>";
$v = $u->sayHello("Hello");

echo $v();



