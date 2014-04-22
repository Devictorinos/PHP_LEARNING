<?php

const PATH = "autoload/";
use autoload as folder;

function __autoload($class)
{   $class = str_replace("\\", "/", $class);
    include  $class . ".Class.php";
}


$f = new folder\First;
$s = new folder\Second;
$t = new folder\Third;
