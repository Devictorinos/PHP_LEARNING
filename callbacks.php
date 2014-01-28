<?php

$name = "viktor";

function show(callable $var, $name)
{
      call_user_func($var, $name);
      echo "<br>";
      
}



 show(function ($name) {

     echo "hello $name";
 }, $name);



 show(function ($name) {

     echo "Happy New Year $name";
 }, $name);

 

 show(function ($name) {

     echo "$name love Charly";
 }, $name);




echo "<br />";


function name()
{
    echo "viktor";
}


function showName($var)
{
    $var();
}

showName('name');

if (is_callable('showName')) {
    echo 'yes';
}
