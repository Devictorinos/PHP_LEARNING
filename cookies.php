<?php

//setcookie("count", 9, time() + 5);

$count = (isset($_COOKIE['count'])) ? $_COOKIE['count'] : 0 ;
$count++;
setcookie("count", $count, time() + 5);

echo $count;
