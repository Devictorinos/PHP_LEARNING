<?php

 class Yos
{
    public function sayGuru($a, $b)
{

}
}



 abstract class MyClass extends Yos  {

    const NAME = "Victor";
    public $a = 1;
    protected $_b = array('4', 65, 65);
    public static $c = 0;
    private $_guru = "null";
    public static function sayHi()
    {
        echo "hi";
    }

    abstract public function soWhat(); 

    public function sayGuru($guru, $word = "")
    {
        $c ++;
        return "<h1>" . $word . " " . $guru . "</h1>";
    }
}
//$y = new Yos();

//$m = new MyClass;

/*if ($m instanceof $y) {
    die("yes");
}*/

echo "<pre>";
Reflection::export(new ReflectionClass('MyClass'));
$reflection = new ReflectionClass('MyClass');
echo '<hr / >';
echo $reflection->getFileName();
echo '<hr / >';

//var_dump($reflection->isInstance($y));

 if ($reflection->isInstance($reflection)) {
    echo "yes";
 } else {
    echo "no";
 } 
foreach ($reflection->getInterfaces() as $key => $param) {
    echo '<hr / >';
    echo "implements of -> " . $param->getName() . "<br/>";

    //echo "and interfaces name is -> " . $param->getInterfacesNames();
}



