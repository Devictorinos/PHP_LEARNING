<?php

$visitCounter = 0;

if (isset($_COOKIE['visitCounter'])) {
    $visitCounter = $_COOKIE['visitCounter'];
}

$visitCounter ++;
$lastVisits = '';

if (isset($_COOKIE['lastVisits'])) {
    
    $lastVisits = date('d-m-Y H:i:s', $_COOKIE['lastVisits']);
}

if (@date('d-m-Y H:i:s', $_COOKIE['lastVisits']) != date('d-m-Y H:i:s')) {

     setcookie('visitCounter', $visitCounter, 0x7FFFFFFF);
     setcookie('lastVisits', time(), 0x7FFFFFFF);
}