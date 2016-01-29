<?php

declare(strict_types=1);
//$_GET['nonExistent'] = 5;
//$_GET['nonExistent2'] = 15;
//$_POST['foo'] = 'BAZBAZ';
//$foo ='Foo';
//$baz ='Baz';
//$var  = $_GET['nonExistent']  ?? 'default1';//There is no error message of not seted variable
$var2 = $_GET['nonExistent2'] ?? $foo ?? $baz ?? $_POST['foo'] ?? $var ?? 'default2';//There is no error message of not seted variable
//echo $var;
echo $var2;