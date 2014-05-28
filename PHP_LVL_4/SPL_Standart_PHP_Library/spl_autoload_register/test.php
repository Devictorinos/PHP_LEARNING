<?php
/*spl_autoload_register(function ( $class) {

    $class = str_replace("\\", "/", $class);
    include  $class . ".php";
});*/

//spl_autoload_register(array("test/Test", "sayHello"));
require_once "autoloader.php";

Autoloader::dirName('test');

spl_autoload_register('Autoloader::loa');


//spl_autoload_call('Test1');
//$autoload = new Autoloader();

//$autoload->aut("test");

//var_dump(spl_autoload_extensions (".js"));

//================= WORKING ======================================
/*var_dump(DIRECTORY_SEPARATOR);

function my_autoload($class){
    include __DIR__ . "/test/" . $class . '.php';
}

spl_autoload_register('my_autoload');*/

//==================================================


require_once "autoloader.php";

Autoloader::dirName('test');

spl_autoload_register('Autoloader::loa');


$test = new Test();
$test->sayHello();


Autoloader::dirName('test2');

spl_autoload_register('Autoloader::loa');


$test2 = new Test2();
$test2->sayHello();


Autoloader::dirName('test3');

spl_autoload_register('Autoloader::loa');


$test3 = new Test3();
$test3->sayHello();

