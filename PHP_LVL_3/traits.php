<?php

namespace PHP_LVL_3;

trait Hello
{
    public $message;
    public function hello()
    {
        $this->message = "Hello";
        return $this;
    }
}

trait User
{
    public $name;
    public function user($name)
    {
        $this->name = $name;
        return $this;
    }
}


class Welcome
{
    use Hello, User;

    public function __tostring()
    {
        return $this->message . " " . $this->name;
    }
}

$hello = new Welcome();

echo $hello->hello()->user("Victor");

/* ================================================================ */

echo "<hr />";

/* ================================================================ */
trait Car
{
    public function carMark($mark)
    {
        return $mark;
    }
}

trait Color
{
    public function carColor($color)
    {
        return $color;
    }
}

trait ShowCar
{
    use Car, Color;

    public function showCar($mark, $color)
    {
        echo $this->carMark($mark) . " " . $this->carColor($color);
    }
}

class Cars
{
    use ShowCar;
}

$car = new Cars();

$car->showCar("BMW", "red");
echo " <hr />";

(new Cars())->showCar("BMW", "red");

echo "<hr />";

/* ================================================================ */


