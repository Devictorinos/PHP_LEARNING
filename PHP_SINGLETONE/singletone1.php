<?php


namespace PHP_SINGLETONE;
//phpinfo();

abstract class Example
{

    public static $counter = null;
    protected $num;
    public function __construct()
    {

    }

    public static function in()
    {
        $class = get_called_class();
        if ($class::$counter === null) {

            $class::$counter =  new $class();
        }

        return $class::$counter;

    }

    public function doSome($string)
    {
        echo get_called_class(). " ".$string."<br>";
    }

    public function showNum($number)
    {
        $this->num = $number;

        return $this->num;

    }


}


class Example1 extends Example
{
    public static $counter = null;

}



class Example2 extends Example
{
    public static $counter = null;
    
}

$var = Example1::in();

$var->doSome('var1');


$var3 = Example1::in();

$var3->doSome('var3');


$var1 = Example2::in();

$var1->doSome('var2');
var_dump($a = $var1->showNum("6"));

echo $a;
